<h1>Derniers articles</h1>
@foreach($articles as $article)
    <h3>{{ $article->title }}</h3>
    <a href="{{ route('wiki.show', $article->slug) }}">Voir</a>
@endforeach

{{ $articles->links() }}
