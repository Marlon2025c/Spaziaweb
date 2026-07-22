<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\JwtHelper;

class LauncherController extends Controller
{
    // ─────────────────────────────────────────────────────────────────────
    // GET /api/version/latest
    // Retourne le tag de la dernière release (public, avant auth)
    // ─────────────────────────────────────────────────────────────────────
    public function getLatestVersion()
    {
        $response = Http::withToken(env('GITHUB_TOKEN'))
            ->withHeaders(['Accept' => 'application/vnd.github.v3+json'])
            ->get('https://api.github.com/repos/' . env('GITHUB_OWNER') . '/' . env('GITHUB_REPO') . '/releases/latest');

        if ($response->failed()) {
            return response()->json(['error' => 'Impossible de contacter GitHub'], 502);
        }

        return response()->json([
            'version' => $response->json('tag_name'),
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────
    // GET /api/update/download
    // Proxy le téléchargement de l'asset setup depuis GitHub privé
    // ─────────────────────────────────────────────────────────────────────
    public function downloadUpdate()
    {
        $filename = env('LAUNCHER_FILENAME', 'mainsetup.exe');

        // Récupère la liste des assets de la dernière release
        $release = Http::withToken(env('GITHUB_TOKEN'))
            ->withHeaders(['Accept' => 'application/vnd.github.v3+json'])
            ->get('https://api.github.com/repos/' . env('GITHUB_OWNER') . '/' . env('GITHUB_REPO') . '/releases/latest');

        if ($release->failed()) {
            return response()->json(['error' => 'Release introuvable'], 502);
        }

        $assetUrl = null;
        foreach ($release->json('assets') as $asset) {
            if ($asset['name'] === $filename) {
                $assetUrl = $asset['url'];
                break;
            }
        }

        if (!$assetUrl) {
            return response()->json(['error' => "Asset $filename introuvable"], 404);
        }

        // Stream directement depuis GitHub vers le client (pas de chargement en mémoire)
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => implode("\r\n", [
                    'Authorization: token ' . env('GITHUB_TOKEN'),
                    'Accept: application/octet-stream',
                    'User-Agent: SpaziaCraft-Server',
                ]),
            ],
            'ssl' => ['verify_peer' => true],
        ]);

        $stream = fopen($assetUrl, 'rb', false, $context);
        if (!$stream) {
            return response()->json(['error' => 'Stream GitHub impossible'], 502);
        }

        // Récupère la taille de l'asset pour le Content-Length
        $size = $release->json('assets')[array_search($assetUrl, array_column($release->json('assets'), 'url'))]['size'] ?? 0;

        return response()->stream(function () use ($stream) {
            while (!feof($stream)) {
                echo fread($stream, 8192);
                flush();
            }
            fclose($stream);
        }, 200, [
            'Content-Type'        => 'application/octet-stream',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Content-Length'      => $size,
            'X-Accel-Buffering'   => 'no',
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────
    // POST /api/auth/microsoft
    // Échange un token Minecraft contre un JWT SpaziaCraft (24h)
    // ─────────────────────────────────────────────────────────────────────
    public function authMicrosoft(Request $request)
    {
        $minecraftToken = $request->input('minecraft_token');

        if (!$minecraftToken) {
            return response()->json(['error' => 'Token manquant'], 400);
        }

        // Vérifie le token auprès de Mojang
        $mojang = Http::withToken($minecraftToken)
            ->get('https://api.minecraftservices.com/minecraft/profile');

        if ($mojang->failed()) {
            return response()->json(['error' => 'Token Minecraft invalide'], 401);
        }

        $profile = $mojang->json();

        if (!isset($profile['id'], $profile['name'])) {
            return response()->json(['error' => 'Profil Minecraft introuvable'], 401);
        }

        // Génère un JWT SpaziaCraft sans base de données (24h)
        $expiresIn = 86400;
        $token = JwtHelper::generate([
            'uuid'   => $profile['id'],
            'pseudo' => $profile['name'],
            'iat'    => time(),
            'exp'    => time() + $expiresIn,
        ]);

        return response()->json([
            'token'      => $token,
            'expires_in' => $expiresIn,
            'pseudo'     => $profile['name'],
            'uuid'       => $profile['id'],
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────
    // GET /api/releases
    // Retourne les releases GitHub (token GitHub reste côté serveur)
    // ─────────────────────────────────────────────────────────────────────
    public function getReleases()
    {
        $response = Http::withToken(env('GITHUB_TOKEN'))
            ->withHeaders(['Accept' => 'application/vnd.github.v3+json'])
            ->get('https://api.github.com/repos/' . env('GITHUB_OWNER') . '/' . env('GITHUB_REPO') . '/releases');

        if ($response->failed()) {
            return response()->json(['error' => 'Impossible de contacter GitHub'], 502);
        }

        return response()->json($response->json());
    }
    // ─────────────────────────────────────────────────────────────────────
    // GET /api/mods
    // Retourne la liste des mods depuis GitHub raw
    // ─────────────────────────────────────────────────────────────────────
    public function getMods()
    {
        $response = Http::withToken(env('GITHUB_TOKEN'))
            ->get('https://raw.githubusercontent.com/' . env('GITHUB_OWNER') . '/' . env('GITHUB_REPO') . '/main/mods/liste_mods.json');

        if ($response->failed()) {
            return response()->json(['error' => 'Impossible de contacter GitHub'], 502);
        }

        return response()->json($response->json());
    }
}
