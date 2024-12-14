<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function example()
    {
        return response()->json(['message' => 'API response']);
    }
}
