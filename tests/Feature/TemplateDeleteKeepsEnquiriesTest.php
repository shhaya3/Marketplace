<?php

namespace Tests\Feature;

use App\Models\Enquiry;
use App\Models\Template;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TemplateDeleteKeepsEnquiriesTest extends TestCase
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

    public function test_deleting_a_template_keeps_its_enquiries(): void
    {
        $template  = Template::factory()->create();
        $enquiries = Enquiry::factory()->count(3)->create();

        DB::table('enquiries')
            ->whereIn('id', $enquiries->pluck('id'))
            ->update(['template_id' => $template->id]);

        $this->actingAs($this->admin())
            ->delete(route('admin.templates.destroy', $template))
            ->assertRedirect();

        $this->assertDatabaseMissing('templates', ['id' => $template->id]);
        $this->assertDatabaseCount('enquiries', 3);

        foreach ($enquiries as $enquiry) {
            $this->assertDatabaseHas('enquiries', [
                'id'          => $enquiry->id,
                'template_id' => null,
            ]);
        }
    }

    public function test_enquiry_details_survive_template_deletion(): void
    {
        $template = Template::factory()->create();
        $enquiry  = Enquiry::factory()->create(['full_name' => 'Asha Verma', 'status' => 'resolved']);

        DB::table('enquiries')->where('id', $enquiry->id)->update(['template_id' => $template->id]);

        $this->actingAs($this->admin())->delete(route('admin.templates.destroy', $template));

        $fresh = $enquiry->fresh();
        $this->assertSame('Asha Verma', $fresh->full_name);
        $this->assertSame('resolved', $fresh->status);
    }
}
