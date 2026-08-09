<?php

namespace App\Http\Controllers;

use App\Models\WikiArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WikiController extends Controller
{

    // Back-office : sauvegarde
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summernote' => 'required',
        ]);

        $slug = Str::slug($request->title);

        WikiArticle::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->summernote,
        ]);
        return redirect()->route('wiki')->with('success', 'Article créé avec succès !');
    }

    public function wiki(?string $slug = null)
    {
        if ($slug) {
            $article = WikiArticle::where('slug', $slug)->first();

            // 👉 Si l’article n’existe pas, on affiche un message "prochainement"
            if (!$article) {
                if (request()->ajax()) {
                    return view('wiki._content', [
                        'message' => '🕓 Cet article est prochainement disponible...'
                    ]);
                }

                return view('spaziawiki', [
                    'message' => '🕓 Cet article est prochainement disponible...',
                    'slug' => $slug
                ]);
            }

            if (request()->ajax()) {
                return view('wiki._content', compact('article'));
            }

            return view('spaziawiki', compact('article', 'slug'));
        } else {
            return redirect()->route('wiki.show', 'reglement-en-jeu');
        }
    }


    public function edit(string $slug)
    {
        $article = WikiArticle::where('slug', $slug)->firstOrFail();

        return view('wiki.edit', compact('article'));
    }

    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summernote' => 'required',
        ]);

        $article = WikiArticle::where('slug', $slug)->firstOrFail();

        // si tu veux régénérer le slug à chaque modif du titre
        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->summernote,
        ]);

        return redirect()->route('wiki.show', $article->slug.'?refresh=1')
                 ->with('success', 'Article mis à jour !');
    }

}
