<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PotentialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('client_potentials')->insert([
            'title' => 'Большой',
        ]);

        DB::table('client_potentials')->insert([
            'title' => 'Средний',
        ]);

        DB::table('client_potentials')->insert([
            'title' => 'Мелкий',
        ]);

    }
}
