<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

          // Create user
          \App\Models\User::factory()->create([
            'name' => 'ADMINISTRADOR SENA',
            'email' => '123456789',
            'password' => bcrypt('123456789'),

        ]);

        // Create user 2
        \App\Models\User::factory()->create([
            'name' => 'INSTRUCTOR ',
            'email' => '0123456789',
            'password' => bcrypt('0123456789'),
        ]);
        // Create user3
        \App\Models\User::factory()->create([
            'name' => 'COORDINADOR',
            'email' => '1234567890',
            'password' => bcrypt('1234567890'),

        ]);

        $this->call(RoleSeeder::class);
    }
}
