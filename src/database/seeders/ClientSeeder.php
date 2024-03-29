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

        DB::table('legals')->insert([
            'client_id' => '1',
            '1c_kontragent_key' => '13213113',
            'legal_entity' => '13123',
            'legal_address' => '123213',
            'address' => 'asdad',
            'ogrn' => 'asdasd',
            'inn' => '2131',
            'opf' => '231231',
            'leader_name' => '123123',
            'accouter_name' => '123',
            'bank' => 'Сбер',
            'bic' => 'фыв',
            'inn_bank' => '123',
            'kpp' => '123',
            'r_count' => '222',
            'k_count' => '123333',
            'comment' => '333',
        ]);
    }
}
