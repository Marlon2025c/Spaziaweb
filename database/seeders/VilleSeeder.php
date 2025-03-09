<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    public function run()
    {
        Ville::create([
            'nom' => 'Ville A',
            'economie' => 45,
            'gestion' => 38,
            'metier' => 42,
            'unseco' => 35,
            'architecture' => 48,
            'pollution' => 'Faible',
        ]);

        Ville::create([
            'nom' => 'Ville B',
            'economie' => 30,
            'gestion' => 25,
            'metier' => 28,
            'unseco' => 20,
            'architecture' => 35,
            'pollution' => 'Moyenne',
        ]);

        // Ajoutez d'autres villes ici
    }
}
