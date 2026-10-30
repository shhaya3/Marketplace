<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_home_page_loads(): void
    {
        $this->withoutVite();
        Category::factory()->count(3)->create();

        $this->get('/')->assertOk();
    }
}
