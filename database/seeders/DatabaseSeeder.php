<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CreateAdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CreateAdminSeeder::class,
        ]);

        $data = [
            'email' => 'hunter@safe.ru',
            'password' => Hash::make('12345678'),
            'role' => 'hunter',
            'status' => 'active',
        ];

        User::create($data);

        $data = [
            'email' => 'hr@safe.ru',
            'password' => Hash::make('12345678'),
            'role' => 'hr',
            'status' => 'active',
        ];

        User::create($data);
    }
}
