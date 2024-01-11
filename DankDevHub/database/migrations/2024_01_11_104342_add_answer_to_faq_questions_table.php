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
        Schema::table('f_a_q_questions', function (Blueprint $table) {
        $table->text('answer')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('f_a_q_questions', function (Blueprint $table) {
        $table->dropColumn('answer');
    });
    }
};