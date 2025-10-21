<style>
    .sctiontextwiki{
        position: relative;
        width: 100%;
        height: 5%;
        background: #001300;
        overflow: hidden;
        cursor: default;
        animation: animateBg 10s linear infinite;
    }
    @keyframes animateBg
    {
      0% 
      {
        filter: hue-rotate(0deg);
    
      }
      100%
      {
        filter: hue-rotate(300deg);
      }
    }
    .customtextwiki{
        display: flex;
        flex-wrap: wrap;
    }
    .customtextwiki span{
        position: relative;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: 00ff0a11;
        transition: 2s
    }
    .customtextwiki span:hover{
        transition: 0s;
        font-size: 4em;
        color: #00ff0a;
        z-index: 100;
        text-shadow: 0 0 10px #00ff0a,
        0 0 50px #00ff0a,
        0 0 150px #00ff0a;
    }
</style>

@if (isset($article))
    {{-- Article --}}
    @if ($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
    @endif
    <div>{!! $article->content !!}</div>
    @if (Auth::check())
        @if (Auth()->user()->hasRole([3, 4, 5, 6, 7, 8])) 
            <a href="{{ route('wiki.edit', $article->slug) }}">Modifier</a>
        @endif
    @endif
@endif
@if (isset($message))
    <div class="alert alert-info text-center mt-5">
        {{ $message }}
    </div>
@endif
<script>
    let paragraph = document.querySelector('.customtextwiki');
    let customtextwiki = 'Spazia'.repeat(106);
    paragraph.textContent = customtextwiki;
    paragraph.innerHTML = paragraph.textContent.replace(/\S/g,"<span>$&</span>")
</script>