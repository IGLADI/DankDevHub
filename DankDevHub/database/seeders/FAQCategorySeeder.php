<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FAQCategory;

class FAQCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQCategory::create(['name' => 'General']);
        FAQCategory::create(['name' => 'Account']);
        FAQCategory::create(['name' => 'Rules']);
        FAQCategory::create(['name' => 'Other']);
    }
}
