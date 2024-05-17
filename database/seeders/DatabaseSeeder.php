<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        user::create([
            'name'      => 'Admin Pusat',
            'email'     => 'admin@mail.com',
            'password'  => bcrypt('secret123'),
            'role'      => 'admin'
        ]);
        user::create([
            'name'      => 'Reseller Pusat',
            'email'     => 'reseller@mail.com',
            'password'  => bcrypt('secret123'),
            'role'      => 'customer'
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
