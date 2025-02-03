<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Contracts\View\View;
use App\Models\CommandAdminWiki;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        return view('home');
    }
    public function support()
    {
        return view(view: 'support');
    }
    public function admin_wiki(): View
    {
        $adminCommands = CommandAdminWiki::select('command', 'quick_command', 'description', 'group')->get(); // Récupère toutes les lignes de la table
        return view('wiki/admin_wiki', compact('adminCommands'));
    }
}
