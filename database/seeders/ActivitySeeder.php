<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('client_activities')->insert([
            'title' => 'Авто',
        ]);

        DB::table('client_activities')->insert([
            'title' => 'Город, власть',
        ]);

        DB::table('client_activities')->insert([
            'title' => 'Интернет',
        ]);

    }
}
