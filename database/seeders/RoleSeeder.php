<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::table('roles')->insert([
            'name' => 'User',
            'description' => 'Пользователь',
        ]);
        
        DB::table('roles')->insert([
            'name' => 'Manager',
            'description' => 'Manager',
        ]);
        
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'Admin',
        ]);
    }
}
