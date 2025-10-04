@if (isset($article))
    {{-- Article --}}
    <h1>{{ $article->title }}</h1>
    @if ($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
    @endif
    <div>{!! $article->content !!}</div>
    <a href="{{ route('wiki.edit', $article->slug) }}">Modifier</a>
@endif
