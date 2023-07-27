<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([

            'title' => 'Assistance VISA',
            'description' => 'admin@gmail.com',
            'image' => 'assistance_visa.jfif',
            'user_id' => 1,

        ]);
        Service::create([

            'title' => 'Réservation et ventes de billet d\'avion',
            'description' => 'admin@gmail.com',
            'image' => 'reservation_billet.jfif',
            'user_id' => 1,

        ]);
        Service::create([

            'title' => 'Inscription aux bourses étrangères',
            'description' => 'admin@gmail.com',
            'image' => 'bourses.jfif',
            'user_id' => 1,

        ]);
        Service::create([

            'title' => 'Agriculture',
            'description' => 'admin@gmail.com',
            'image' => 'agriculture.jfif',
            'user_id' => 1,

        ]);
        Service::create([

            'title' => 'Import - Export',
            'description' => 'admin@gmail.com',
            'image' => 'import_export.jfif',
            'user_id' => 1,

        ]);
        Service::create([

            'title' => 'Formations',
            'description' => 'admin@gmail.com',
            'image' => 'formation.jfif',
            'user_id' => 1,

        ]);
    }
}
