<?php

namespace Database\Factories;

use App\Models\Template;
use App\Models\TemplatePage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TemplatePageFactory extends Factory
{
    protected $model = TemplatePage::class;

    public function definition(): array
    {
        $name = ucwords(fake()->unique()->words(2, true));

        return [
            'template_id' => Template::factory(),
            'name'        => $name,
            'slug'        => Str::slug($name),
            'sort_order'  => fake()->numberBetween(1, 20),
        ];
    }
}
