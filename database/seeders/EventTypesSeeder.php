<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('event_types')->insert([
            'active' => 'true',
            'title' => 'Звонок',
        ]);

        DB::table('event_types')->insert([
            'active' => 'true',
            'title' => 'Холодный визит',
        ]);

        DB::table('event_types')->insert([
            'active' => 'false',
            'title' => 'Какой-то тип',
        ]);
    }
}
