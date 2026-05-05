<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'role'     => 'admin',
            'password' => Hash::make('admin1234'),
        ]);

        User::factory()->create([
            'name'     => 'imam',
            'email'    => 'imam@gmail.com',
            'role'     => 'member',
            'password' => Hash::make('imam1234'),
        ]);
    }
}
