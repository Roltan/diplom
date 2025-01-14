<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestsTest;
use App\Models\Test;

class QuestsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = Test::all();
        $totalQuests = $tests->count() * 10; // Общее количество вопросов (10 на каждый тест)

        // Создаем прогресс-бар
        $progressBar = $this->command->getOutput()->createProgressBar($totalQuests);
        $progressBar->start(); // Запускаем прогресс-бар

        $j = 1;

        foreach ($tests as $test) {
            for ($i = 1; $i <= 10; $i++) { // Создаем 10 вопросов для каждого теста
                QuestsTest::factory()->create([
                    'test_id' => $test->id,
                ]);

                $progressBar->advance(); // Обновляем прогресс-бар
                $j++;
            }
        }

        $progressBar->finish(); // Завершаем прогресс-бар
        $this->command->info("\nCreated QuestTest");
    }
}
