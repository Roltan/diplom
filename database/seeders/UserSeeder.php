<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => Hash::make('admin'),
                'is_admin' => true
            ],
            [
                'name' => 'tester',
                'email' => 'test@test.ru',
                'password' => Hash::make('test1234'),
                'is_admin' => false
            ],
            [
                'name' => 'teacher',
                'email' => 'teacher@teacher.ru',
                'password' => Hash::make('teacher1'),
                'is_admin' => false
            ],
            [
                'name' => 'student',
                'email' => 'student@student.ru',
                'password' => Hash::make('student1'),
                'is_admin' => false
            ],
        ]);
    }
}
