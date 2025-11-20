<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailUser::create([
            'nama' => 'Admin User',
            'photo' => 'default.jpg',
            'email' => 'admin@mail.com',
            'role' => 'admin',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Admin No.1',
        ]);
        DetailUser::create([
            'nama' => 'Regular User',
            'photo' => 'default.jpg',
            'email' => 'user@mail.com',
            'role' => 'user',
            'no_hp' => '089876543210',
            'alamat' => 'Jl. User No.2',
        ]);
    }
}
