<h1>Derniers articles</h1>
@foreach($articles as $art)
    <h2><a href="{{ route('wiki.show',$art->slug) }}" class="ajax-link">{{ $art->title }}</a></h2>
    <p>{{ Str::limit(strip_tags($art->content),150) }}</p>
@endforeach
{{ $articles->links() }}
