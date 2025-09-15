<?php

namespace App\Http\Controllers;

use App\Models\WikiArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
class WikiController extends Controller
{

    // Back-office : sauvegarde
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summernote' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $slug = Str::slug($request->title);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('wiki', 'public');
        }

        WikiArticle::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->summernote,
            'image' => $path
        ]);
    }

    public function ajaxShow($slug)
    {
        $article = WikiArticle::where('slug', $slug)->firstOrFail();
        return response()->json([
            'title' => $article->title,
            'content' => $article->content,
            'image' => $article->image
        ]);
    }

    public function wiki(?string $slug = null)
    {
        if ($slug) {
            $article = WikiArticle::where('slug', $slug)->firstOrFail();

            // si AJAX → ne renvoie que le bloc HTML
            if (request()->ajax()) {
                return response()->view('partials.article', ['article' => $article]);
            }

            // sinon vue complète
            return view('spaziawiki', [
                'article' => $article,
                'slug'    => $slug,
            ]);
        } else {
            $articles = WikiArticle::orderBy('id', 'desc')->paginate(10);

            if (request()->ajax()) {
                return response()->view('partials.article-list', ['articles' => $articles]);
            }

            return view('spaziawiki', [
                'articles' => $articles,
                'slug'     => null,
            ]);
        }
    }

}
