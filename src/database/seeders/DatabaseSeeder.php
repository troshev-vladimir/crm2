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
            ActivitySeeder::class,
            JobsSeeder::class,
            PotentialSeeder::class,
            ClientSeeder::class,
            EventsSeeder::class,
            SaleSeeder::class
        ]);
    }
}