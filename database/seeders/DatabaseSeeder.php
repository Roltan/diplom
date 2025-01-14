<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(TopicSeeder::class);

        $this->call(BlankQuestSeeder::class);
        $this->call(ChoiceQuestSeeder::class);
        $this->call(FillQuestSeeder::class);
        $this->call(RelationQuestSeeder::class);

        $this->call(TestSeeder::class);
        $this->call(QuestsTestSeeder::class);
    }
}
