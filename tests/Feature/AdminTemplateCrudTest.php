<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Template;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTemplateCrudTest extends TestCase
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

    private function validData(Category $category, array $overrides = []): array
    {
        return array_merge([
            'category_id'       => $category->id,
            'name'              => 'City Hospital',
            'slug'              => 'city-hospital',
            'short_description' => 'A clean website for hospitals.',
            'status'            => 'active',
            'meta_title'        => 'City Hospital Template',
            'meta_description'  => 'Hospital website template.',
        ], $overrides);
    }

    // ---------- access ----------

    public function test_guests_are_redirected_from_template_admin(): void
    {
        $this->get(route('admin.templates.index'))->assertRedirect(route('login'));
        $this->post(route('admin.templates.store'), [])->assertRedirect(route('login'));
    }

    public function test_non_admin_users_cannot_manage_templates(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $template = Template::factory()->create();

        $this->actingAs($user)->get(route('admin.templates.create'))->assertForbidden();
        $this->actingAs($user)->delete(route('admin.templates.destroy', $template))->assertForbidden();

        $this->assertDatabaseHas('templates', ['id' => $template->id]);
    }

    // ---------- create ----------

    public function test_create_form_loads(): void
    {
        Category::factory()->create();

        $this->actingAs($this->admin())->get(route('admin.templates.create'))->assertOk();
    }

    public function test_admin_can_create_a_template(): void
    {
        $category = Category::factory()->create();

        $this->actingAs($this->admin())
            ->post(route('admin.templates.store'), $this->validData($category))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('templates', [
            'name'        => 'City Hospital',
            'slug'        => 'city-hospital',
            'category_id' => $category->id,
            'status'      => 'active',
        ]);
    }

    public function test_required_fields_are_enforced_on_create(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.templates.store'), [])
            ->assertSessionHasErrors(['category_id', 'name', 'slug', 'short_description', 'status']);

        $this->assertDatabaseCount('templates', 0);
    }

    public function test_invalid_status_is_rejected(): void
    {
        $category = Category::factory()->create();

        $this->actingAs($this->admin())
            ->post(route('admin.templates.store'), $this->validData($category, ['status' => 'banana']))
            ->assertSessionHasErrors('status');
    }

    public function test_draft_status_is_accepted(): void
    {
        $category = Category::factory()->create();

        $this->actingAs($this->admin())
            ->post(route('admin.templates.store'), $this->validData($category, ['status' => 'draft']))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('templates', ['slug' => 'city-hospital', 'status' => 'draft']);
    }

    public function test_category_must_exist(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.templates.store'), [
                'category_id' => 9999,
                'name' => 'Ghost', 'slug' => 'ghost',
                'short_description' => 'x', 'status' => 'active',
            ])
            ->assertSessionHasErrors('category_id');
    }

    public function test_duplicate_slug_is_rejected_on_create(): void
    {
        $category = Category::factory()->create();
        Template::factory()->create(['slug' => 'city-hospital', 'category_id' => $category->id]);

        $this->actingAs($this->admin())
            ->post(route('admin.templates.store'), $this->validData($category))
            ->assertSessionHasErrors('slug');

        $this->assertDatabaseCount('templates', 1);
    }

    public function test_name_and_description_length_limits(): void
    {
        $category = Category::factory()->create();

        $this->actingAs($this->admin())
            ->post(route('admin.templates.store'), $this->validData($category, [
                'name'              => str_repeat('a', 151),
                'short_description' => str_repeat('b', 301),
            ]))
            ->assertSessionHasErrors(['name', 'short_description']);
    }

    // ---------- edit ----------

    public function test_edit_form_loads(): void
    {
        $template = Template::factory()->create();

        $this->actingAs($this->admin())
            ->get(route('admin.templates.edit', $template))
            ->assertOk();
    }

    public function test_admin_can_update_a_template(): void
    {
        $template = Template::factory()->create();
        $newCategory = Category::factory()->create();

        $this->actingAs($this->admin())
            ->put(route('admin.templates.update', $template), $this->validData($newCategory, [
                'name'   => 'Updated Hospital',
                'slug'   => 'updated-hospital',
                'status' => 'inactive',
            ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('templates', [
            'id'          => $template->id,
            'name'        => 'Updated Hospital',
            'slug'        => 'updated-hospital',
            'status'      => 'inactive',
            'category_id' => $newCategory->id,
        ]);
    }

    public function test_template_can_keep_its_own_slug_on_update(): void
    {
        $template = Template::factory()->create(['slug' => 'my-slug']);

        $this->actingAs($this->admin())
            ->put(route('admin.templates.update', $template), $this->validData(Category::find($template->category_id), [
                'name' => 'Renamed',
                'slug' => 'my-slug',
            ]))
            ->assertSessionHasNoErrors();

        $this->assertSame('Renamed', $template->fresh()->name);
    }

    public function test_update_cannot_take_another_templates_slug(): void
    {
        Template::factory()->create(['slug' => 'taken']);
        $template = Template::factory()->create(['slug' => 'mine']);

        $this->actingAs($this->admin())
            ->put(route('admin.templates.update', $template), $this->validData(Category::find($template->category_id), ['slug' => 'taken']))
            ->assertSessionHasErrors('slug');

        $this->assertSame('mine', $template->fresh()->slug);
    }

    public function test_update_with_missing_name_is_rejected(): void
    {
        $template = Template::factory()->create(['name' => 'Keep Me']);

        $this->actingAs($this->admin())
            ->put(route('admin.templates.update', $template), $this->validData(Category::find($template->category_id), ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->assertSame('Keep Me', $template->fresh()->name);
    }

    // ---------- delete ----------

    public function test_admin_can_delete_a_template(): void
    {
        $template = Template::factory()->create();

        $this->actingAs($this->admin())
            ->delete(route('admin.templates.destroy', $template))
            ->assertRedirect();

        $this->assertDatabaseMissing('templates', ['id' => $template->id]);
    }

    public function test_deleting_a_template_keeps_its_category(): void
    {
        $template = Template::factory()->create();
        $categoryId = $template->category_id;

        $this->actingAs($this->admin())->delete(route('admin.templates.destroy', $template));

        $this->assertDatabaseHas('categories', ['id' => $categoryId]);
    }
}
