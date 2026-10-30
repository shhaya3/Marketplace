<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Template;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationSearchStatusTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite(); // pages use @vite, no built assets needed in tests
    }

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    // ───────────── Pagination ─────────────

    public function test_templates_page_shows_12_per_page(): void
    {
        $cat = Category::factory()->create();
        Template::factory()->count(30)->create(['category_id' => $cat->id]);

        $p1 = $this->get(route('templates.index'))->assertOk()->viewData('templates');
        $this->assertCount(12, $p1->items());
        $this->assertSame(30, $p1->total());

        $p3 = $this->get(route('templates.index', ['page' => 3]))->assertOk()->viewData('templates');
        $this->assertCount(6, $p3->items());
    }

    public function test_pagination_keeps_the_category_filter(): void
    {
        $a = Category::factory()->create();
        $b = Category::factory()->create();
        Template::factory()->count(15)->create(['category_id' => $a->id]);
        Template::factory()->count(5)->create(['category_id' => $b->id]);

        $page2 = $this->get(route('templates.index', ['category' => $a->slug, 'page' => 2]))
            ->assertOk()->viewData('templates');

        $this->assertSame(15, $page2->total());
        $this->assertCount(3, $page2->items());
    }

    public function test_inactive_templates_are_not_listed(): void
    {
        $cat = Category::factory()->create();
        Template::factory()->count(3)->create(['category_id' => $cat->id]);
        Template::factory()->count(2)->inactive()->create(['category_id' => $cat->id]);

        $templates = $this->get(route('templates.index'))->assertOk()->viewData('templates');
        $this->assertSame(3, $templates->total());
    }

    public function test_page_beyond_the_last_does_not_error(): void
    {
        $cat = Category::factory()->create();
        Template::factory()->count(5)->create(['category_id' => $cat->id]);

        $templates = $this->get(route('templates.index', ['page' => 999]))
            ->assertOk()->viewData('templates');
        $this->assertCount(0, $templates->items());
    }

    public function test_api_pagination_and_per_page_cap(): void
    {
        $cat = Category::factory()->create();
        Template::factory()->count(60)->create(['category_id' => $cat->id]);

        $this->getJson('/api/templates?per_page=5&page=2')
            ->assertOk()
            ->assertJsonCount(5, 'data')
            ->assertJsonPath('meta.current_page', 2)
            ->assertJsonPath('meta.per_page', 5);

        $this->getJson('/api/templates?per_page=500')
            ->assertOk()
            ->assertJsonPath('meta.per_page', 50);
    }

    // ───────────── Search ─────────────

    public function test_search_matches_name_and_description(): void
    {
        $cat = Category::factory()->create();
        Template::factory()->create(['category_id' => $cat->id, 'name' => 'Alpha Hospital', 'slug' => 'alpha-hospital', 'short_description' => 'Care site']);
        Template::factory()->create(['category_id' => $cat->id, 'name' => 'Beta School', 'slug' => 'beta-school', 'short_description' => 'Dentist clinic pages']);

        $byName = $this->get(route('templates.index', ['search' => 'Alpha']))->viewData('templates');
        $this->assertSame(1, $byName->total());

        $byDesc = $this->get(route('templates.index', ['search' => 'Dentist']))->viewData('templates');
        $this->assertSame(1, $byDesc->total());
    }

    public function test_search_with_no_match_returns_nothing(): void
    {
        $cat = Category::factory()->create();
        Template::factory()->count(3)->create(['category_id' => $cat->id]);

        $templates = $this->get(route('templates.index', ['search' => 'zzzzzzzz']))->viewData('templates');
        $this->assertSame(0, $templates->total());
    }

    public function test_search_respects_the_category_filter(): void
    {
        $a = Category::factory()->create();
        $b = Category::factory()->create();
        Template::factory()->create(['category_id' => $a->id, 'name' => 'Moon Clinic', 'slug' => 'moon-clinic']);
        Template::factory()->create(['category_id' => $b->id, 'name' => 'Moon School', 'slug' => 'moon-school']);

        $templates = $this->get(route('templates.index', ['search' => 'Moon', 'category' => $a->slug]))
            ->viewData('templates');
        $this->assertSame(1, $templates->total());
    }

    public function test_search_input_is_escaped_in_the_page(): void
    {
        $this->get(route('templates.index', ['search' => '<b>x</b>']))
            ->assertOk()
            ->assertSee('&lt;b&gt;x&lt;/b&gt;', false);
    }

    public function test_api_search(): void
    {
        $cat = Category::factory()->create();
        Template::factory()->create(['category_id' => $cat->id, 'name' => 'Alpha Hospital', 'slug' => 'alpha-hospital']);
        Template::factory()->count(4)->create(['category_id' => $cat->id]);

        $this->getJson('/api/templates?search=Alpha')
            ->assertOk()
            ->assertJsonCount(1, 'data');
    }

    // ───────────── Status change ─────────────

    public function test_guests_are_redirected_from_admin_enquiries(): void
    {
        $this->get(route('admin.enquiries.index'))->assertRedirect(route('login'));
    }

    public function test_non_admin_users_are_forbidden(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $this->actingAs($user)->get(route('admin.enquiries.index'))->assertForbidden();
    }

    public function test_enquiries_are_grouped_by_status(): void
    {
        Enquiry::factory()->count(2)->create(['status' => 'unread']);
        Enquiry::factory()->create(['status' => 'read']);
        Enquiry::factory()->create(['status' => 'resolved']);

        $response = $this->actingAs($this->admin())->get(route('admin.enquiries.index'))->assertOk();

        $this->assertCount(2, $response->viewData('unread'));
        $this->assertCount(1, $response->viewData('read'));
        $this->assertCount(1, $response->viewData('resolved'));
    }

    public function test_opening_an_enquiry_does_not_change_its_status(): void
    {
        $unread = Enquiry::factory()->create(['status' => 'unread']);
        $resolved = Enquiry::factory()->create(['status' => 'resolved']);

        $this->actingAs($this->admin())
            ->get(route('admin.enquiries.show', $unread))->assertOk();
        $this->actingAs($this->admin())
            ->get(route('admin.enquiries.show', $resolved))->assertOk();

        $this->assertSame('unread', $unread->fresh()->status);
        $this->assertSame('resolved', $resolved->fresh()->status);
    }

    public function test_admin_can_change_status_to_resolved(): void
    {
        $enquiry = Enquiry::factory()->create(['status' => 'unread']);

        $this->actingAs($this->admin())
            ->patch(route('admin.enquiries.update', $enquiry), ['status' => 'resolved'])
            ->assertRedirect();

        $this->assertSame('resolved', $enquiry->fresh()->status);
    }

    public function test_invalid_status_is_rejected(): void
    {
        $enquiry = Enquiry::factory()->create(['status' => 'unread']);

        $this->actingAs($this->admin())
            ->patch(route('admin.enquiries.update', $enquiry), ['status' => 'banana'])
            ->assertSessionHasErrors('status');

        $this->assertSame('unread', $enquiry->fresh()->status);
    }

    public function test_dashboard_chart_reflects_a_status_change(): void
    {
        $admin = $this->admin();
        $enquiry = Enquiry::factory()->create(['status' => 'unread']);

        $before = $this->actingAs($admin)->get('/admin')->assertOk()->viewData('charts');
        $this->assertSame([1, 0, 0], $before['status']['values']);

        $this->actingAs($admin)->patch(route('admin.enquiries.update', $enquiry), ['status' => 'resolved']);

        $after = $this->actingAs($admin)->get('/admin')->viewData('charts');
        $this->assertSame([0, 0, 1], $after['status']['values']);
    }
}
