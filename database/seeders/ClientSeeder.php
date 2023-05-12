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
            "email" => "client6@gmail.com",
            "name" => "asd22",
            "phone" => "89046456789",
            "phone_add" => "89046456789",
            "site" => "site.com",
            "vk" => "vk.com",
            "birth_day" => "21.2.1999",
            "division_id" => '1',
            "address" => "asdasd",
            "address_add" => "asdasdasd",
            "comment" => "ads",
            "active" => false,
            "federal" => false,
            "top" => true,
            "prioritet" => false,
            "activity_id" => '1',
            "potencial_id" => '2',
            'user_id' => '1',
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
