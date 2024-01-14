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
            'answer' => 'You can delete your account by going to your profile page and clicking the "Delete Account" button at the bottom of the page and confirming the deletion.',
            'f_a_q_category_id' => 2,
            'is_faq' => true,
        ]);
    }
}
