<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 10000;
        $types = [BlankQuest::class, ChoiceQuest::class, FillQuest::class, RelationQuest::class];

        foreach ($types as $model) {
            $this->command->info("\nSeeding $model");
            $progressBar = $this->command->getOutput()->createProgressBar($total);

            for ($i = 1; $i <= $total; $i++) {
                $model::factory()->create();
                $progressBar->advance();
            }
            $progressBar->finish();
            $this->command->info("\nSeeding $model successfully");
        }
    }
}
