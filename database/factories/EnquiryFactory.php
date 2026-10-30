<?php

namespace Database\Factories;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnquiryFactory extends Factory
{
    protected $model = Enquiry::class;

    public function definition(): array
    {
        $created = fake()->dateTimeBetween('-14 days', 'now');

        return [
            'full_name'         => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'phone'             => fake()->numerify('98########'),
            'business_name'     => fake()->company(),
            'business_category' => fake()->randomElement([
                'hospital', 'school', 'restaurant', 'hotel', 'real-estate', 'ca',
                'lawyer', 'manufacturer', 'temple', 'coaching', 'ecommerce',
            ]),
            'message'           => fake()->paragraph(2),
            'status'            => fake()->randomElement(['unread', 'unread', 'read', 'resolved']),
            'created_at'        => $created,
            'updated_at'        => $created,
        ];
    }

    public function unread(): static
    {
        return $this->state(fn () => ['status' => 'unread']);
    }

    public function resolved(): static
    {
        return $this->state(fn () => ['status' => 'resolved']);
    }
}
