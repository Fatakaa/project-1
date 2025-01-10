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

        $user = User::factory()->create([
            'name' => 'Americano Manuka',
            'email' => 'americano@student.com',
            'password' => '12345'
        ]);
        $role = 'mahasiswa_user';
        $user->assignRole($role);
    }
}
