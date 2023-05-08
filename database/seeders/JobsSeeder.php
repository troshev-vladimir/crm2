<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('client_jobs')->insert([
            'title' => 'Бухгалтер',
        ]);

        DB::table('client_jobs')->insert([
            'title' => 'Владелец',
        ]);

        DB::table('client_jobs')->insert([
            'title' => 'Директор',
        ]);

    }
}
