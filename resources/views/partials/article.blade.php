<h1>{{ $article->title }}</h1>
@if($article->image)
    <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
@endif
<div>{!! $article->content !!}</div>
<a href="{{ route('wiki') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>
