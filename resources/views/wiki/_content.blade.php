<style>
    .wk-article-title {
        color: #fff;
        font-weight: 800;
        font-size: 1.8rem;
        margin-bottom: 1.25rem;
    }

    .wk-edit-link {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        margin-top: 1.5rem;
        padding: .5rem 1.1rem;
        background: rgba(255,255,255,.07);
        color: rgba(255,255,255,.85);
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 10px;
        font-size: .85rem;
        font-weight: 600;
        text-decoration: none;
        transition: background .2s, border-color .2s;
    }

    .wk-edit-link:hover {
        background: rgba(249,115,22,.15);
        border-color: rgba(249,115,22,.35);
        color: #fb923c;
    }

    .wk-message {
        text-align: center;
        color: rgba(255,255,255,.7);
        padding: 3rem 1rem;
        font-size: 1.05rem;
    }
</style>

@if (isset($article))
    {{-- Article --}}
    @if ($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
    @endif
    <div>{!! $article->content !!}</div>
    @if (Auth::check())
        @if (Auth::user()->isStaff())
            <a href="{{ route('wiki.edit', $article->slug) }}" class="wk-edit-link">✏️ Modifier</a>
        @endif
    @endif
@elseif (isset($message))
    <div class="wk-message">
        {{ $message }}
    </div>
@endif
