<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class RadioController extends Controller
{
    public function show()
    {
        return response()->stream(function () {
        $stream = fopen('http://spazia.fr:8000/radio.mp3', 'r');
        fpassthru($stream);
        fclose($stream);
        }, 200, [
            'Content-Type' => 'audio/mpeg',
        ]);
    }

    public function nowPlaying()
    {
        $url = 'http://192.168.1.12/api/nowplaying/spaziaradio';

        try {
            $response = Http::withoutVerifying()->get($url);
            return response()->json($response->json());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible de récupérer les données'], 500);
        }
    }
}
