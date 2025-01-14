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
        Schema::create('quest_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solved_test_id')->constrained('solved_tests')->cascadeOnDelete();
            $table->foreignId('quest_test_id')->constrained('quests_tests')->cascadeOnDelete();
            $table->text('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quest_answers');
    }
};
