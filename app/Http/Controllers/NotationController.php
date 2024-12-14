<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotationController extends Controller
{
    public function index()
    {
        return view('notation');
    }
}
