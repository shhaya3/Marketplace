<?php

namespace Database\Factories;

use App\Models\Template;
use App\Models\TemplateFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFeatureFactory extends Factory
{
    protected $model = TemplateFeature::class;

    public function definition(): array
    {
        return [
            'template_id' => Template::factory(),
            'feature'     => ucfirst(fake()->words(3, true)),
            'sort_order'  => fake()->numberBetween(1, 20),
        ];
    }
}
