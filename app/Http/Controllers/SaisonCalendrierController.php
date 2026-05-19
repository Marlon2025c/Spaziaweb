<?php

namespace App\Http\Controllers;

use App\Models\SaisonCalendrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaisonCalendrierController extends Controller
{
    public function index()
    {
        $semaines = SaisonCalendrier::orderBy('numero_semaine')->get();
        return view('saison_calendrier', compact('semaines'));
    }

    public function adminIndex()
    {
        $semaines = SaisonCalendrier::orderBy('numero_semaine')->get();
        return view('admin/saison_calendrier_admin', compact('semaines'));
    }

    public function adminStore(Request $request)
    {
        $data = $request->validate([
            'numero_semaine'  => 'required|integer|min:1',
            'titre'           => 'required|string|max:100',
            'description'     => 'nullable|string',
            'date_revelation' => 'required|date',
            'type_contenu'    => 'required|in:texte,photo,video,lien',
            'contenu_texte'   => 'nullable|string',
            'contenu_url'     => 'nullable|url|max:500',
            'contenu_image'   => 'nullable|image|max:4096',
            'actif'           => 'nullable|boolean',
        ]);

        if ($request->hasFile('contenu_image')) {
            $data['contenu_image'] = $request->file('contenu_image')->store('calendrier', 'public');
        }
        $data['actif'] = $request->has('actif');

        SaisonCalendrier::create($data);

        return redirect()->route('admin.calendrier')->with('success', 'Semaine ajoutée !');
    }

    public function adminUpdate(Request $request, SaisonCalendrier $semaine)
    {
        $data = $request->validate([
            'numero_semaine'  => 'required|integer|min:1',
            'titre'           => 'required|string|max:100',
            'description'     => 'nullable|string',
            'date_revelation' => 'required|date',
            'type_contenu'    => 'required|in:texte,photo,video,lien',
            'contenu_texte'   => 'nullable|string',
            'contenu_url'     => 'nullable|url|max:500',
            'contenu_image'   => 'nullable|image|max:4096',
            'actif'           => 'nullable|boolean',
        ]);

        if ($request->hasFile('contenu_image')) {
            if ($semaine->contenu_image) {
                Storage::disk('public')->delete($semaine->contenu_image);
            }
            $data['contenu_image'] = $request->file('contenu_image')->store('calendrier', 'public');
        }
        $data['actif'] = $request->has('actif');

        $semaine->update($data);

        return redirect()->route('admin.calendrier')->with('success', 'Semaine mise à jour !');
    }

    public function adminDestroy(SaisonCalendrier $semaine)
    {
        if ($semaine->contenu_image) {
            Storage::disk('public')->delete($semaine->contenu_image);
        }
        $semaine->delete();

        return redirect()->route('admin.calendrier')->with('success', 'Semaine supprimée.');
    }
}
