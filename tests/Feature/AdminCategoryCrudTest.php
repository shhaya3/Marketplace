<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Template;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCategoryCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    // ---------- access ----------

    public function test_guests_are_redirected_from_category_admin(): void
    {
        $this->get(route('admin.categories.index'))->assertRedirect(route('login'));
        $this->post(route('admin.categories.store'), [])->assertRedirect(route('login'));
    }

    public function test_non_admin_users_cannot_manage_categories(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $category = Category::factory()->create();

        $this->actingAs($user)->get(route('admin.categories.create'))->assertForbidden();
        $this->actingAs($user)->post(route('admin.categories.store'), ['name' => 'X'])->assertForbidden();
        $this->actingAs($user)->delete(route('admin.categories.destroy', $category))->assertForbidden();

        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }

    // ---------- create ----------

    public function test_create_form_loads(): void
    {
        $this->actingAs($this->admin())->get(route('admin.categories.create'))->assertOk();
    }

    public function test_admin_can_create_a_category(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.categories.store'), [
                'name'       => 'Fitness Studio',
                'icon'       => '🏋️',
                'sort_order' => 5,
                'is_active'  => 1,
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('categories', [
            'name'       => 'Fitness Studio',
            'slug'       => 'fitness-studio',
            'sort_order' => 5,
            'is_active'  => 1,
        ]);
    }

    public function test_slug_is_generated_from_name_when_blank(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.categories.store'), ['name' => 'Real Estate Agents', 'slug' => '']);

        $this->assertDatabaseHas('categories', ['slug' => 'real-estate-agents']);
    }

    public function test_unchecked_active_box_saves_category_as_inactive(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.categories.store'), ['name' => 'Hidden Category']);

        $this->assertDatabaseHas('categories', ['name' => 'Hidden Category', 'is_active' => 0]);
    }

    public function test_name_is_required(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.categories.store'), ['name' => ''])
            ->assertSessionHasErrors('name');

        $this->assertDatabaseCount('categories', 0);
    }

    public function test_negative_sort_order_is_rejected(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.categories.store'), ['name' => 'Bad Order', 'sort_order' => -3])
            ->assertSessionHasErrors('sort_order');
    }

    public function test_duplicate_slug_is_rejected(): void
    {
        Category::factory()->create(['name' => 'Gyms', 'slug' => 'gyms']);

        $this->actingAs($this->admin())
            ->post(route('admin.categories.store'), ['name' => 'Gyms Again', 'slug' => 'gyms'])
            ->assertSessionHasErrors('slug');

        $this->assertDatabaseCount('categories', 1);
    }

    // ---------- edit ----------

    public function test_edit_form_loads(): void
    {
        $category = Category::factory()->create();

        $this->actingAs($this->admin())
            ->get(route('admin.categories.edit', $category))
            ->assertOk();
    }

    public function test_admin_can_update_a_category(): void
    {
        $category = Category::factory()->create(['name' => 'Old Name', 'slug' => 'old-name']);

        $this->actingAs($this->admin())
            ->put(route('admin.categories.update', $category), [
                'name'      => 'New Name',
                'slug'      => 'new-name',
                'is_active' => 1,
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'New Name', 'slug' => 'new-name']);
    }

    public function test_category_can_keep_its_own_slug_on_update(): void
    {
        $category = Category::factory()->create(['name' => 'Schools', 'slug' => 'schools']);

        $this->actingAs($this->admin())
            ->put(route('admin.categories.update', $category), ['name' => 'Schools & Colleges', 'slug' => 'schools'])
            ->assertSessionHasNoErrors();

        $this->assertSame('Schools & Colleges', $category->fresh()->name);
    }

    public function test_update_cannot_take_another_categorys_slug(): void
    {
        Category::factory()->create(['slug' => 'taken']);
        $category = Category::factory()->create(['slug' => 'mine']);

        $this->actingAs($this->admin())
            ->put(route('admin.categories.update', $category), ['name' => 'Mine', 'slug' => 'taken'])
            ->assertSessionHasErrors('slug');

        $this->assertSame('mine', $category->fresh()->slug);
    }

    public function test_update_without_name_is_rejected(): void
    {
        $category = Category::factory()->create(['name' => 'Keep Me']);

        $this->actingAs($this->admin())
            ->put(route('admin.categories.update', $category), ['name' => ''])
            ->assertSessionHasErrors('name');

        $this->assertSame('Keep Me', $category->fresh()->name);
    }

    // ---------- delete ----------

    public function test_admin_can_delete_an_empty_category(): void
    {
        $category = Category::factory()->create();

        $this->actingAs($this->admin())
            ->delete(route('admin.categories.destroy', $category))
            ->assertRedirect();

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_category_with_templates_cannot_be_deleted(): void
    {
        $category = Category::factory()->create();
        Template::factory()->create(['category_id' => $category->id]);

        $this->actingAs($this->admin())
            ->delete(route('admin.categories.destroy', $category))
            ->assertRedirect();

        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }
}
