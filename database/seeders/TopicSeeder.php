<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 50;
        $progressBar = $this->command->getOutput()->createProgressBar($total);

        for ($i = 1; $i <= $total; $i++) {
            Topic::factory()->create();
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->info("\nCreated topics");
    }
}
