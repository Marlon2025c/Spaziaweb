<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class Contract extends Controller
{
    public function index()
    {

        return view('Contract/qui_sommes_nous');
    }
}
