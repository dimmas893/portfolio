<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'dimmas',
            'email' => 'dimmas@gmail.com',
            'password' => Hash::make('password')
        ]);
        Profil::create([
            'nama' => 'Ananda Dimmas Budiarto',
            'profesi' => 'Fullstack Web Developer',
            'profesi_detail' => 'me fullstack developer in 2019',
            'github' => 'https://github.com/dimmas893'
        ]);
    }
}
