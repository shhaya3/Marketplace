<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Template;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TemplateFactory extends Factory
{
    protected $model = Template::class;

    public function definition(): array
    {
        $name = fake()->unique()->company();
        $slug = Str::slug($name);

        return [
            'category_id'       => Category::factory(),
            'name'              => $name,
            'slug'              => $slug,
            'short_description' => fake()->sentence(10),
            'long_description'  => fake()->paragraph(4),
            'thumbnail'         => 'thumbnails/placeholder.jpg',
            'preview_url'       => '/templates/' . $slug . '/preview',
            'status'            => 'active',
            'view_count'        => fake()->numberBetween(0, 250),
            'meta_title'        => $name . ' — Website Template',
            'meta_description'  => fake()->sentence(14),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['status' => 'inactive']);
    }
}
