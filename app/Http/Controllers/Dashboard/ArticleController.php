<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller; // important !
use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|file|mimes:jpg,jpeg,png,gif|max:50000',
            'tag' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'lien_pubhtml5' => 'required|url',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public'); // stocké dans storage/app/public/logos

        Article::create([
            'logo' => $logoPath,
            'tag' => $request->tag,
            'title' => $request->title,
            'lien_pubhtml5' => $request->lien_pubhtml5,
            'date' => Carbon::now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'Article ajouté avec succès.');
    }
}
