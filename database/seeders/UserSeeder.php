<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'center_code' => '1234',
            'name' => 'eman',
            'email' => 'eman@gmail.com',
            'password' => Hash::make('password'),
            'grade' => 1,
        ]);

    }
}
