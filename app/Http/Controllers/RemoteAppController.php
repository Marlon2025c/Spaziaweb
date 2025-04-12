<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class RemoteAppController extends Controller
{
    public function startApp()
    {
        $response = Http::post('http://192.168.1.77:5000/start', [
            'app' => 'C:\Users\Marlon\Desktop\Serveur\Saison5\EcoServer.exe'
        ]);
    
        return $response->json(); // parfait
    }
    

    public function stopApp()
    {
        $response = Http::post('http://192.168.1.77:5000/stop', [
            'app' => 'C:\Users\Marlon\Desktop\Serveur\Saison5\EcoServer.exe'
        ]);

        return $response->json();
    }
}
