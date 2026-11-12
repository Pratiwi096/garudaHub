<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['Admin Garuda', 'admin@garuda.com', 'admin'],
            ['Tiwi', 'tiwi@garuda.com', 'client'],
            ['Siti', 'siti@garuda.com', 'client'],
            ['Rosa', 'rosa@garuda.com', 'client'],
            ['Dewi', 'dewi@garuda.com', 'developer'],
            ['Gabriel', 'gabriel@garuda.com', 'developer'],
            ['Adin', 'adin@garuda.com', 'developer'],
            ['Adit', 'adit@garuda.com', 'developer'],
        ];

        foreach ($users as [$name, $email, $role]) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => 'password',
                'role' => $role,
            ]);
        }
    }
}
