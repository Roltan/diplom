<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FillQuest;

class FillQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 100;
        $progressBar = $this->command->getOutput()->createProgressBar($total);

        for ($i = 1; $i <= $total; $i++) {
            FillQuest::factory()->create();
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->info("\nCreated fill quests");
    }
}
