<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        User::updateOrCreate(
            ['email' => 'user1@test.com'],
            [
                'name' => 'Peserta Satu',
                'password' => Hash::make('password'),
                'role' => 'user'
            ]
        );

        User::updateOrCreate(
            ['email' => 'user2@test.com'],
            [
                'name' => 'Peserta Dua',
                'password' => Hash::make('password'),
                'role' => 'user'
            ]
        );
    }
}
