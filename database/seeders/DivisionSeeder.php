<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('divisions')->insert([
            'name' => 'Основной отдел Русского радио',
            'department_id' => '1',
        ]);

        DB::table('divisions')->insert([
            'name' => 'Дополнительный отдел Русского радио',
            'department_id' => '1',
        ]);

        DB::table('divisions')->insert([
            'name' => 'Основной отдел Мария Fm',
            'department_id' => '2',
        ]);
    }
}
