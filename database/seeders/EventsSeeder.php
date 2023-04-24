<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
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


        DB::table('events')->insert([
            'fulfilled_date' => '2023-04-01',
            'title' => 'Сделать звонок туда то',
            'appointment_date' => '2023-04-25',
            'type_id' => 1,
            'client_id' => 1,
        ]);

        DB::table('events')->insert([
            'fulfilled_date' => '2023-04-01',
            'title' => 'Сделать звонок куда-то туда',
            'appointment_date' => '2023-04-25',
            'type_id' => 1,
            'client_id' => 1,
        ]);
    }
}
