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
        Schema::create('quests_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
            $table->UnsignedBigInteger('quest_id');
            $table->string('type_quest');
            $table->timestamps();

            $table->foreign('quest_id', 'fk_blank_quest')->references('id')->on('blank_quests')->cascadeOnDelete();
            $table->foreign('quest_id', 'fk_choice_quest')->references('id')->on('choice_quests')->cascadeOnDelete();
            $table->foreign('quest_id', 'fk_fill_quest')->references('id')->on('fill_quests')->cascadeOnDelete();
            $table->foreign('quest_id', 'fk_relation_quest')->references('id')->on('relation_quests')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quests_tests');
    }
};
