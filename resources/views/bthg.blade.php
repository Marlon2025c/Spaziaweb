@extends('layouts.app')
@section('title', 'Spazia - Accueil')
@section('content')

<div class="main-panels content-section hidden" id="articlewiki">
    <style>
        .note-editor .note-editable {
            background-color: white !important;
            color: black !important;
        }
    </style>

    <div class="container">
        <h1>Créer un article</h1>

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oups !</strong> Il y a eu des problèmes avec votre saisie :<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Affichage du message de succès si présent --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('wiki.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre de l'article</label>
                <input type="text" name="title" id="title" class="form-control" 
                       value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="summernote" id="summernote" style="background-color:white">{{ old('summernote') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['codeview', 'help']]
        ]
    });
</script>
<style>
    .sctiontextwiki{
        position: relative;
        width: 100%;
        height: 100vh;
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

<section class="sctiontextwiki">
    <p class="customtextwiki"></p>
</section>
<script>
    let paragraph = document.querySelector('.customtextwiki');
    let customtextwiki = 'Spazia'.repeat(300);
    paragraph.textContent = customtextwiki;
    paragraph.innerHTML = paragraph.textContent.replace(/\S/g,"<span>$&</span>")
</script>
@endsection
