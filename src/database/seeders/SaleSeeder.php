<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('smis')->insert([
            'title' => 'Какое-то сми',
        ]);
        DB::table('smis')->insert([
            'title' => 'Какое-то сми 2',
        ]);
        DB::table('smis')->insert([
            'title' => 'Какое-то сми 3',
        ]);

        DB::table('sales_types')->insert([
            'title' => 'Какойто тип1',
        ]);
        DB::table('sales_types')->insert([
            'title' => 'Какойто тип2',
        ]);

        DB::table('sales')->insert([
            // 'title' => 'Какаят-то продажа',
            'placement_date' => date("Y-m-d H:i:s"),
            'payed_date' => '2023-04-20 19:52:18',
            'start' => '2023-04-22 19:52:18',
            'end' => '2023-05-20 19:52:18',
            'id_1c' => 2,
            'sale_items' => json_encode([
                [
                    'title' => 'За эфир такой-то',
                    'summ' => 2200
                ],
                [
                    'title' => 'За эфир какой-то',
                    'summ' => 1200
                ]
            ]),
            'client_id' => 1,
            // 'agent_id' => 1,
            'type_id' => 1,
            'smi_id' => 1,
            'user_id' => 1
        ]);
    }
}
