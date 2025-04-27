<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama'     => 'Rifki',
            'email'    => 'admin@gmail.com',
            'jabatan'  => 'Admin',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'nama'     => 'Elvan',
            'email'    => 'elvan@gmail.com',
            'jabatan'  => 'Admin',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'nama'     => 'Andri',
            'email'    => 'andri@gmail.com',
            'jabatan'  => 'Pustakawan',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'nama'     => 'Yana',
            'email'    => 'yana@gmail.com',
            'jabatan'  => 'Gugus Mutu',
            'password' => Hash::make('123123123'),
        ]);
    }
}
