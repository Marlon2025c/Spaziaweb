<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\ParametresClassement;
use Illuminate\Http\Request;

class Notation extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        $parametres = ParametresClassement::orderBy('id', 'desc')->first();

        return view('notations/notation_classement', ['villes' => $villes, 'parametres' => $parametres]);
    }
}
