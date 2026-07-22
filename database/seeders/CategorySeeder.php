<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
        ['name' => 'Hospital',             'slug' => 'hospital',      'icon' => '🏥', 'sort_order' => 1],
        ['name' => 'School',               'slug' => 'school',        'icon' => '🏫', 'sort_order' => 2],
        ['name' => 'Restaurant',           'slug' => 'restaurant',    'icon' => '🍽️', 'sort_order' => 3],
        ['name' => 'Hotel',                'slug' => 'hotel',         'icon' => '🏨', 'sort_order' => 4],
        ['name' => 'Real Estate',          'slug' => 'real-estate',   'icon' => '🏠', 'sort_order' => 5],
        ['name' => 'Chartered Accountant', 'slug' => 'ca',            'icon' => '📊', 'sort_order' => 6],
        ['name' => 'Lawyer',               'slug' => 'lawyer',        'icon' => '⚖️', 'sort_order' => 7],
        ['name' => 'Manufacturer',         'slug' => 'manufacturer',  'icon' => '🏭', 'sort_order' => 8],
        ['name' => 'Temple',               'slug' => 'temple',        'icon' => '🛕', 'sort_order' => 9],
        ['name' => 'Coaching Institute',   'slug' => 'coaching',      'icon' => '📚', 'sort_order' => 10],
        ['name' => 'Ecommerce',            'slug' => 'ecommerce',     'icon' => '🛒', 'sort_order' => 11],
    ];

    foreach ($categories as $category) {
        \App\Models\Category::firstOrCreate(
            ['slug' => $category['slug']],
            array_merge($category, ['is_active' => true])
        );
    }
    }
}
