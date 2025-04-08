<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class RemoteAppController extends Controller
{
    public function startApp()
    {
        $response = Http::post('http://192.168.1.192:5000/start', [
            'app' => 'C:\Users\basti\OneDrive\Bureau\Spazia\Serveur DEV\Serveur eco dev\EcoServer.exe'
        ]);

        return $response->json();
    }

    public function stopApp()
    {
        $response = Http::post('http://192.168.1.192:5000/stop', [
            'app' => 'C:\Users\basti\OneDrive\Bureau\Spazia\Serveur DEV\Serveur eco dev\EcoServer.exe'
        ]);

        return $response->json();
    }
}
