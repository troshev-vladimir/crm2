<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DepartmentSeeder::class,
            DivisionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
        ]);
    }
}