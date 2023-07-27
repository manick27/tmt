<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'first_name' => 'Manick',
            'last_name' => 'Nguewouo Mbakop',
            'phone' => '690868185',
            'country' => 'Cameroon',
            'email' => 'nguewouom@gmail.com',
            'is_admin' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('azerty12'),

        ]);
    }
}
