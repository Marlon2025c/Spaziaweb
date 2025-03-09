<?php

namespace Database\Seeders;

use App\Models\ParametresClassement;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ParametresClassementSeeder extends Seeder
{
    public function run()
    {
        ParametresClassement::create([
            'montant_donne' => 1000,
            'date_semaine' => Carbon::parse('2024-03-03'),
            'argent_par_joueur' => 50,
            'membre_max' => 20,
            'lois_max' => 10,
        ]);

        // Vous pouvez ajouter d'autres paramètres ici si nécessaire
    }
}
