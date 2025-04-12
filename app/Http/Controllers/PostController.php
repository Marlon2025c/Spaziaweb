<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\CommandAdminWiki;

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
        return view('include/comingsoon', compact('adminCommands'));
    }
    public function luancherspcraft()
    {
        return view('launcher_spaziacraft');
    }

    public function download()
    {
        $filePath = public_path('downloads/SpaziaCraft_Launcher.exe'); // Assure-toi que le fichier est bien dans public/downloads
        return response()->download($filePath, 'SpaziaCraft_Launcher.exe');
    }
    public function dashboard(): View
    {
        $adminCommands = CommandAdminWiki::select('command', 'quick_command', 'description', 'group')->get(); // Récupère toutes les lignes de la table
        return view("admin/admin_dashboard", compact('adminCommands'));
    }
}
