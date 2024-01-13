<?php

namespace Database\Seeders;

use App\Models\FAQQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQQuestion::create([
            'question' => 'How do I delete my account?',
            'answer' => 'There is a big red button in the nav bar that says "Delete Account", click it and then confirm your choice.',
            'f_a_q_category_id' => 2,
            'is_faq' => true,
        ]);
    }
}
