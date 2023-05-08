<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->insert([
            'division_id' => '1',
            'user_id' => '1',
            'activity_id' => '1',
            'potencial_id' => '1',
            'email' => 'client@gmail.com',
            'name' => 'client Russian radio',
            'phone' => '89046456789',
            'phone_add' => '89046456789',
            'site' => 'site.com',
            'vk' => 'vk.com',
            'birth_day' => '1681219268',
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('clients')->insert([
            'division_id' => '1',
            'user_id' => '1',
            'activity_id' => '2',
            'potencial_id' => '2',
            'email' => 'client@gmail.com',
            'name' => 'client Russian radio',
            'phone' => '89046456789',
            'phone_add' => '89046456789',
            'site' => 'site.com',
            'vk' => 'vk.com',
            'birth_day' => '1681219268',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
