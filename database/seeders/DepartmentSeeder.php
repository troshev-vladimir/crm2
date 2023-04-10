<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'name' => 'Русское радио',
            'city' => 'Киров',
        ]);

        DB::table('departments')->insert([
            'name' => 'Мария FM',
            'city' => 'Киров',
        ]);

        DB::table('departments')->insert([
            'name' => 'Maximum',
            'city' => 'Калиниград',
        ]);

        DB::table('departments')->insert([
            'name' => 'Формула роста',
            'city' => 'Киров',
        ]);

        DB::table('departments')->insert([
            'name' => 'Новое радио',
            'city' => 'Киров',
        ]);
    }
}
