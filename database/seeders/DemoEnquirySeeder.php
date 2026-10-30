<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Illuminate\Database\Seeder;

class DemoEnquirySeeder extends Seeder
{
    public function run(): void
    {
        Enquiry::factory()->count(30)->create();
    }
}
