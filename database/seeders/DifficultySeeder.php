<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('difficulties')->insert([
            [
                'title' => 'Сложный',
                'min_value' => '0',
                'max_value' => '50'
            ],
            [
                'title' => 'Средний',
                'min_value' => '51',
                'max_value' => '70'
            ],
            [
                'title' => 'Лёгкий',
                'min_value' => '71',
                'max_value' => '100'
            ],
        ]);
    }
}
