<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Palindroma\Core\Models\Admin;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin Account',
            'email' => 'admin@palindroma.ge',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');
    }
}
