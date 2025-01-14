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
        Schema::create('fill_quests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('topics')->cascadeOnDelete();
            $table->boolean('vis')->default(false);
            $table->text('quest');
            $table->text('options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fill_quests');
    }
};
