<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('senha123'),
        ]);
        $admin->assignRole('admin');

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@mail.com',
            'password' => bcrypt('senha123'),
        ]);
        $operator->assignRole('operator');

        $common = User::create([
            'name' => 'Common',
            'email' => 'common@mail.com',
            'password' => bcrypt('senha123'),
        ]);
        $common->assignRole('common');
    }
}
