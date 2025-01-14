<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 1000;
        $progressBar = $this->command->getOutput()->createProgressBar($total);

        for ($i = 1; $i <= $total; $i++) {
            Test::factory()->create();
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->info("\nCreated tests");
    }
}
