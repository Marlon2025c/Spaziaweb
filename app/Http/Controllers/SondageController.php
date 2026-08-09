<?php

namespace App\Http\Controllers;

use App\Models\Sondage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class SondageController extends Controller
{
    private function canManage(): bool
    {
        return Auth::check() && Auth::user()->hasRole([7, 8]);
    }

    private function withCounts(Sondage $sondage)
    {
        $sondage->load(['options' => function ($q) {
            $q->withCount('votes');
        }]);

        return $sondage;
    }

    public function index()
    {
        $sondage = Schema::hasTable('sondages')
            ? Sondage::where('statut', 'ouvert')->latest()->first()
            : null;

        $monVote = null;
        if ($sondage) {
            $sondage = $this->withCounts($sondage);
            $monVote = $sondage->votes()->where('user_id', Auth::id())->value('sondage_option_id');
        }

        return view('votes.index', compact('sondage', 'monVote'));
    }

    public function vote(Request $request, Sondage $sondage)
    {
        if ($sondage->statut !== 'ouvert') {
            return response()->json(['error' => 'Ce sondage est fermé.'], 422);
        }

        $request->validate([
            'option_id' => 'required|exists:sondage_options,id',
        ]);

        $option = $sondage->options()->findOrFail($request->option_id);

        $sondage->votes()->updateOrCreate(
            ['user_id' => Auth::id()],
            ['sondage_option_id' => $option->id]
        );

        return response()->json(['success' => true]);
    }

    public function resultats(Sondage $sondage)
    {
        $sondage = $this->withCounts($sondage);
        $total = $sondage->options->sum('votes_count');

        return response()->json([
            'statut' => $sondage->statut,
            'total' => $total,
            'options' => $sondage->options->map(fn ($o) => [
                'id' => $o->id,
                'label' => $o->label,
                'count' => $o->votes_count,
                'pct' => $total > 0 ? round($o->votes_count / $total * 100) : 0,
            ]),
        ]);
    }

    public function admin()
    {
        if (!$this->canManage()) {
            abort(403, "Accès réservé aux Fondateurs et Responsables.");
        }

        $sondageOuvert = Schema::hasTable('sondages')
            ? Sondage::where('statut', 'ouvert')->latest()->first()
            : null;

        $brouillons = Schema::hasTable('sondages')
            ? Sondage::where('statut', 'brouillon')->oldest()->get()
            : collect();

        $historique = Schema::hasTable('sondages')
            ? Sondage::where('statut', 'ferme')->latest()->get()
            : collect();

        return view('votes.admin', compact('sondageOuvert', 'brouillons', 'historique'));
    }

    public function resultatsDetail(Sondage $sondage)
    {
        if (!$this->canManage()) {
            abort(403);
        }

        $sondage = $this->withCounts($sondage);
        $total = $sondage->options->sum('votes_count');

        $votes = $sondage->votes()->with('user:id,name,avatar', 'option:id,label')->get();

        return response()->json([
            'statut' => $sondage->statut,
            'total' => $total,
            'options' => $sondage->options->map(fn ($o) => [
                'id' => $o->id,
                'label' => $o->label,
                'count' => $o->votes_count,
                'pct' => $total > 0 ? round($o->votes_count / $total * 100) : 0,
            ]),
            'votants' => $votes->map(fn ($v) => [
                'nom' => $v->user->name ?? 'Inconnu',
                'avatar' => $v->user->avatar ?? null,
                'choix' => $v->option->label ?? '—',
            ]),
        ]);
    }

    public function store(Request $request)
    {
        if (!$this->canManage()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255',
        ]);

        $sondage = Sondage::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'statut' => 'brouillon',
            'created_by' => Auth::id(),
        ]);

        foreach ($request->options as $i => $label) {
            $sondage->options()->create(['label' => $label, 'ordre' => $i]);
        }

        return response()->json(['success' => true, 'id' => $sondage->id]);
    }

    public function activer(Sondage $sondage)
    {
        if (!$this->canManage()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        if ($sondage->statut !== 'brouillon') {
            return response()->json(['error' => 'Ce sondage n\'est pas un brouillon.'], 422);
        }

        if (Sondage::where('statut', 'ouvert')->exists()) {
            return response()->json(['error' => 'Un sondage est déjà ouvert. Ferme-le avant d\'en activer un autre.'], 422);
        }

        $sondage->update(['statut' => 'ouvert']);

        return response()->json(['success' => true]);
    }

    public function close(Sondage $sondage)
    {
        if (!$this->canManage()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $sondage->update(['statut' => 'ferme']);

        return response()->json(['success' => true]);
    }

    public function destroy(Sondage $sondage)
    {
        if (!$this->canManage()) {
            return response()->json(['error' => 'Accès réservé aux Fondateurs et Responsables.'], 403);
        }

        $sondage->delete();

        return response()->json(['success' => true]);
    }
}