<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EcoServerController extends Controller
{
    private function canManageServer(): bool
    {
        return Auth::check() && Auth::user()->hasRole([7, 8]);
    }

    private function agent()
    {
        return Http::withHeaders([
                'X-Agent-Token' => env('ECO_AGENT_TOKEN'),
            ])
            ->timeout(10)
            ->baseUrl(rtrim(env('ECO_AGENT_URL', ''), '/'));
    }

    public function status()
    {
        if (!$this->canManageServer()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $response = $this->agent()->get('/status');

        if ($response->failed()) {
            return response()->json(['error' => 'Agent injoignable'], 502);
        }

        return response()->json($response->json());
    }

    public function logs(Request $request)
    {
        if (!$this->canManageServer()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $response = $this->agent()->get('/logs', [
            'tail' => $request->integer('tail', 200),
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Agent injoignable'], 502);
        }

        return response()->json($response->json());
    }

    public function action(Request $request)
    {
        if (!$this->canManageServer()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $request->validate([
            'action'        => 'required|in:start,stop,restart',
            'delay_seconds' => 'nullable|integer|min:0|max:600',
        ]);

        $action = $request->input('action');
        $delay  = $action === 'start' ? 0 : (int) $request->input('delay_seconds', 10);
        $user   = Auth::user()->name;

        if (in_array($action, ['stop', 'restart'], true) && $delay > 0) {
            $message = $action === 'stop'
                ? "Arret du serveur dans {$delay} secondes."
                : "Redemarrage du serveur dans {$delay} secondes.";

            // Passe par la console du process (le plus fiable, l'agent possède le pipe stdin)
            $this->agent()->post('/command', ['cmd' => 'BroadcastAnnouncement ' . $message]);
        }

        $response = $this->agent()->post("/{$action}", ['delay_seconds' => $delay]);

        Log::info("[EcoServer] {$user} a déclenché : {$action}" . ($delay ? " (délai {$delay}s)" : ' (immédiat)'));

        if ($response->failed()) {
            return response()->json(['error' => 'Agent injoignable ou action refusée'], 502);
        }

        return response()->json(['success' => true] + $response->json());
    }

    public function command(Request $request)
    {
        if (!$this->canManageServer()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $request->validate([
            'cmd' => 'required|string|max:500',
        ]);

        $user = Auth::user()->name;
        Log::info("[EcoServer] {$user} a envoyé la commande console : {$request->input('cmd')}");

        $response = $this->agent()->post('/command', ['cmd' => $request->input('cmd')]);

        if ($response->failed()) {
            return response()->json(['error' => 'Agent injoignable'], 502);
        }

        return response()->json(['success' => true] + $response->json());
    }
}
