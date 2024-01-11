<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('f_a_q_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->foreignId('f_a_q_category_id')->constrained('f_a_q_categories')->onDelete('cascade');
            $table->timestamps();
            $table->boolean('is_faq')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_a_q_questions');
    }
};
