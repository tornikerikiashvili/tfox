<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            \Palindroma\Core\Database\Seeders\DatabaseSeeder::class,
        ]);
        $seedFakeData = $this->command->confirm("Do you want to seed fake data?", false);

        if ($seedFakeData) {
            $this->call([
                FakeDataSeeder::class,
            ]);
        }
    }
}
