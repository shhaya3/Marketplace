<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'category_slug' => 'hospital',
                'name'          => 'CarePoint Hospital',
                'slug'          => 'carepoint-hospital',
                'short_description' => 'Complete hospital site with appointment booking, department directory, and doctor profiles.',
                'status'        => 'active',
                'meta_title'    => 'CarePoint Hospital Website Template',
                'meta_description' => 'Professional hospital website template with appointments, departments, and doctor listings.',
            ],
            [
                'category_slug' => 'school',
                'name'          => 'Sunrise Public School',
                'slug'          => 'sunrise-public-school',
                'short_description' => 'School site with admission forms, academic calendar, faculty profiles, and event gallery.',
                'status'        => 'active',
                'meta_title'    => 'Sunrise Public School Website Template',
                'meta_description' => 'Professional school website template with admissions, academics, and faculty pages.',
            ],
            [
                'category_slug' => 'restaurant',
                'name'          => 'Spice Garden',
                'slug'          => 'spice-garden-restaurant',
                'short_description' => 'Warm restaurant site with digital menu, table reservation system, and photo gallery.',
                'status'        => 'active',
                'meta_title'    => 'Spice Garden Restaurant Website Template',
                'meta_description' => 'Restaurant website template with menu, reservations, and gallery.',
            ],
            [
                'category_slug' => 'hotel',
                'name'          => 'Grand Stay Hotel',
                'slug'          => 'grand-stay-hotel',
                'short_description' => 'Luxury hotel site with room showcase, amenities, online booking flow, and guest reviews.',
                'status'        => 'active',
                'meta_title'    => 'Grand Stay Hotel Website Template',
                'meta_description' => 'Hotel website template with room booking, amenities, and guest reviews.',
            ],
            [
                'category_slug' => 'real-estate',
                'name'          => 'ProProperty',
                'slug'          => 'proproperty-real-estate',
                'short_description' => 'Property listings site with advanced search filters, agent profiles, and enquiry forms.',
                'status'        => 'active',
                'meta_title'    => 'ProProperty Real Estate Website Template',
                'meta_description' => 'Real estate website template with property listings, search, and agent profiles.',
            ],
            [
                'category_slug' => 'ca',
                'name'          => 'TrustLedger CA',
                'slug'          => 'trustledger-ca-firm',
                'short_description' => 'Professional accounting firm site with services, team bios, and appointment booking.',
                'status'        => 'active',
                'meta_title'    => 'TrustLedger CA Firm Website Template',
                'meta_description' => 'Chartered accountant website template with services, team, and appointments.',
            ],
            [
                'category_slug' => 'lawyer',
                'name'          => 'Lexis Law Firm',
                'slug'          => 'lexis-law-firm',
                'short_description' => 'Law firm site with practice areas, attorney profiles, case studies, and consultation form.',
                'status'        => 'active',
                'meta_title'    => 'Lexis Law Firm Website Template',
                'meta_description' => 'Law firm website template with practice areas, attorneys, and case studies.',
            ],
            [
                'category_slug' => 'manufacturer',
                'name'          => 'IndusTech',
                'slug'          => 'industech-manufacturer',
                'short_description' => 'B2B manufacturer site with product catalogue, certifications, capabilities, and enquiry form.',
                'status'        => 'active',
                'meta_title'    => 'IndusTech Manufacturer Website Template',
                'meta_description' => 'Manufacturer website template with products, certifications, and B2B enquiry.',
            ],
            [
                'category_slug' => 'temple',
                'name'          => 'Shree Mandir',
                'slug'          => 'shree-mandir-temple',
                'short_description' => 'Temple site with event calendar, daily schedule, online donation, and photo gallery.',
                'status'        => 'active',
                'meta_title'    => 'Shree Mandir Temple Website Template',
                'meta_description' => 'Temple website template with events, schedule, donations, and gallery.',
            ],
            [
                'category_slug' => 'coaching',
                'name'          => 'EduReach Institute',
                'slug'          => 'edureach-coaching-institute',
                'short_description' => 'Coaching site with course listing, results board, fee structure, and online enrolment form.',
                'status'        => 'active',
                'meta_title'    => 'EduReach Coaching Institute Website Template',
                'meta_description' => 'Coaching institute website template with courses, results, and enrolment.',
            ],
            [
                'category_slug' => 'ecommerce',
                'name'          => 'ShopEase',
                'slug'          => 'shopease-ecommerce',
                'short_description' => 'Full ecommerce site with product catalogue, cart, checkout, and order tracking pages.',
                'status'        => 'active',
                'meta_title'    => 'ShopEase Ecommerce Website Template',
                'meta_description' => 'Ecommerce website template with shop, cart, checkout, and order tracking.',
            ],
        ];

        foreach ($templates as $data) {
            $category = \App\Models\Category::where('slug', $data['category_slug'])->first();

            if ($category) {
                \App\Models\Template::firstOrCreate(
                    ['slug' => $data['slug']],
                    [
                        'category_id'       => $category->id,
                        'name'              => $data['name'],
                        'short_description' => $data['short_description'],
                        'status'            => $data['status'],
                        'meta_title'        => $data['meta_title'],
                        'meta_description'  => $data['meta_description'],
                        'view_count'        => rand(10, 200),
                    ]
                );
            }
        }
    }
}