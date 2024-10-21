<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        return view('home', [
            'ville' => Ville::all()
        ]);
    }
}
