<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'email' => 'admin@safe.ru',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'status' => 'active',
        ];

        if (!User::where('email', 'admin@safe.ru')->exists()) {
            User::create($data);
        }
    }
}
