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
            'numero_semaine'   => 'required|integer|min:1',
            'titre'            => 'required|string|max:100',
            'description'      => 'nullable|string',
            'date_revelation'  => 'required|date',
            'type_contenu'     => 'required|in:texte,photo,video,lien',
            'contenu_texte'    => 'nullable|string',
            'contenu_url'      => 'nullable|url|max:500',
            'contenu_images'   => 'nullable|array|max:10',
            'contenu_images.*' => 'image|max:4096',
        ]);

        unset($data['contenu_images']);

        if ($request->hasFile('contenu_images')) {
            $paths = [];
            foreach ($request->file('contenu_images') as $file) {
                $paths[] = $file->store('calendrier', 'public');
            }
            $data['contenu_images'] = $paths;
        }

        $data['actif'] = $request->has('actif');

        SaisonCalendrier::create($data);

        return redirect()->route('admin.calendrier')->with('success', 'Semaine ajoutée !');
    }

    public function adminUpdate(Request $request, SaisonCalendrier $semaine)
    {
        $data = $request->validate([
            'numero_semaine'   => 'required|integer|min:1',
            'titre'            => 'required|string|max:100',
            'description'      => 'nullable|string',
            'date_revelation'  => 'required|date',
            'type_contenu'     => 'required|in:texte,photo,video,lien',
            'contenu_texte'    => 'nullable|string',
            'contenu_url'      => 'nullable|url|max:500',
            'contenu_images'   => 'nullable|array|max:10',
            'contenu_images.*' => 'image|max:4096',
        ]);

        unset($data['contenu_images']);

        if ($request->hasFile('contenu_images')) {
            // Supprimer les anciennes images
            if ($semaine->contenu_images) {
                foreach ($semaine->contenu_images as $img) {
                    Storage::disk('public')->delete($img);
                }
            }
            if ($semaine->contenu_image) {
                Storage::disk('public')->delete($semaine->contenu_image);
            }

            $paths = [];
            foreach ($request->file('contenu_images') as $file) {
                $paths[] = $file->store('calendrier', 'public');
            }
            $data['contenu_images'] = $paths;
            $data['contenu_image']  = null;
        }

        $data['actif'] = $request->has('actif');

        $semaine->update($data);

        return redirect()->route('admin.calendrier')->with('success', 'Semaine mise à jour !');
    }

    public function adminDestroy(SaisonCalendrier $semaine)
    {
        if ($semaine->contenu_images) {
            foreach ($semaine->contenu_images as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        if ($semaine->contenu_image) {
            Storage::disk('public')->delete($semaine->contenu_image);
        }
        $semaine->delete();

        return redirect()->route('admin.calendrier')->with('success', 'Semaine supprimée.');
    }
}
