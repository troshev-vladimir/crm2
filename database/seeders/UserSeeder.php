<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'login' => 'AdminName',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'login' => 'User Name',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('user_role')->insert([
            'user_id' => '1',
            'role_id' => '1',
        ]);

        DB::table('user_role')->insert([
            'user_id' => '1',
            'role_id' => '2',
        ]);

        DB::table('user_role')->insert([
            'user_id' => '1',
            'role_id' => '3',
        ]);

        DB::table('department_user')->insert([
            'user_id' => '1',
            'department_id' => '1',
        ]);

        DB::table('department_user')->insert([
            'user_id' => '2',
            'department_id' => '2',
        ]);

        DB::table('department_user')->insert([
            'user_id' => '1',
            'department_id' => '2',
        ]);
    }
}