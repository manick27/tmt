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
            'description' => "Nous donnons vie à vos projets de voyage en vous offrant un service d'assistance visa sur mesure, qui vous permet de vous concentrer sur votre voyage sans souci ni stress, en vous guidant pas à pas dans le processus de demande de visa et en vous aidant à obtenir rapidement et facilement votre visa pour votre destination de choix.",
            'image' => 'assistance_visa.jfif',
            'user_id' => 1,
            'service_uid' => uniqid(),

        ]);
        Service::create([

            'title' => 'Réservation et ventes de billet d\'avion',
            'description' => "Envolez-vous vers de nouveaux horizons avec notre service de réservation de billets d'avion, qui vous offre une expérience de voyage fluide et sans effort, avec des options de vol sur mesure pour répondre à vos besoins individuels, et des tarifs compétitifs qui vous permettent de réaliser vos rêves de voyage sans vous ruiner.",
            'image' => 'reservation_billet.jfif',
            'user_id' => 1,
            'service_uid' => uniqid(),

        ]);
        Service::create([

            'title' => 'Inscription aux bourses étrangères',
            'description' => "Nous ouvrons les portes de l'éducation à l'international en vous offrant un service
            d'inscription aux bourses à l'étranger complet et personnalisé, qui vous accompagne dans
            toutes les étapes du processus, en vous aidant à trouver les bourses les plus adaptées à vos
            aspirations académiques et professionnelles, et en vous offrant un soutien continu pour que
            vous puissiez réaliser votre projet d'études à l'étranger.",
            'image' => 'bourses.jfif',
            'user_id' => 1,
            'service_uid' => uniqid(),

        ]);
        Service::create([

            'title' => 'Agriculture',
            'description' => "Nous sommes fiers de notre expertise en matière de production, en offrant des solutions
            complètes et sur mesure pour répondre aux besoins de nos clients, en utilisant des méthodes
            de production de pointe pour garantir des produits de haute qualité, tout en respectant les
            normes de durabilité et de responsabilité sociale.",
            'image' => 'agriculture.jfif',
            'user_id' => 1,
            'service_uid' => uniqid(),

        ]);
        Service::create([

            'title' => 'Import - Export',
            'description' => "Voyez grand et internationalisez votre entreprise avec notre service d'import-export sur
            mesure, qui vous offre un accès facile aux marchés mondiaux, en s'occupant de toutes les
            formalités douanières et logistiques pour vous permettre de vous concentrer sur votre
            croissance et votre réussite commerciale, en vous offrant des solutions flexibles et
            compétitives pour répondre à vos besoins spécifiques.",
            'image' => 'import_export.jfif',
            'user_id' => 1,
            'service_uid' => uniqid(),

        ]);
        Service::create([

            'title' => 'Formations',
            'description' => "Transformez votre potentiel en réalité avec notre service de formation professionnelle de
            pointe, qui vous offre des opportunités de développement personnel et de croissance
            professionnelle illimitées, en s'appuyant sur des méthodes d'enseignement innovantes et
            pratiques pour vous aider à atteindre vos objectifs professionnels les plus ambitieux, tout en
            vous offrant un accompagnement personnalisé pour vous aider à exceller dans votre
            domaine d'expertise.",
            'image' => 'formation.jfif',
            'user_id' => 1,
            'service_uid' => uniqid(),

        ]);
    }
}
