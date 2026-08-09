@extends('layouts.app')
@section('title', 'Spazia - Modifier l\'article')
@section('content')
<style>
    .wk-edit-shell { background: #0d0d14; min-height: 80vh; padding: 4rem 5%; }
    .wk-edit-card {
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 18px;
        padding: 2.5rem;
        max-width: 900px;
        margin: 0 auto;
    }
    .wk-edit-title { color: #fff; font-weight: 800; font-size: 1.9rem; margin-bottom: 2rem; }
    .wk-edit-title span { background: linear-gradient(135deg, #f97316 0%, #fb923c 40%, #22c55e 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .wk-edit-card .form-label { color: rgba(255,255,255,.75); font-weight: 600; font-size: .9rem; text-transform: uppercase; letter-spacing: .06em; }
    .wk-edit-card .form-control {
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.12);
        color: #fff;
        border-radius: 10px;
        padding: .7rem 1rem;
    }
    .wk-edit-card .form-control:focus {
        background: rgba(255,255,255,.07);
        border-color: rgba(249,115,22,.5);
        box-shadow: 0 0 0 .2rem rgba(249,115,22,.15);
        color: #fff;
    }
    .btn-wk-primary {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff;
        border: none;
        padding: .7rem 1.8rem;
        border-radius: 10px;
        font-weight: 700;
        box-shadow: 0 0 30px rgba(249,115,22,.3);
        transition: transform .2s, box-shadow .2s;
    }
    .btn-wk-primary:hover { transform: translateY(-2px); box-shadow: 0 0 40px rgba(249,115,22,.5); color: #fff; }
</style>
<div class="wk-edit-shell">
    <div class="wk-edit-card">

    <h1 class="wk-edit-title">Modifier l'<span>article</span></h1>

    <form action="{{ route('wiki.update', $article->slug) }}" method="POST" enctype="multipart/form-data" style="height: 100%">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titre de l'article</label>
            <input type="text" name="title" id="title" class="form-control"
                   value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="summernote" class="form-label">Contenu</label>
            <textarea name="summernote" id="summernote" style="background-color:white">{{ old('summernote', $article->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-wk-primary">Mettre à jour</button>
    </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

            
<script>
$(document).ready(function() {
  $('#summernote').summernote({
    tabsize: 2,
    height: 500, // hauteur de l’éditeur
    fontSizes: ['8', '9', '10', '11', '12','13', '14','15','16','17', '18', '24','32', '36', '48' , '64', '82', '150'],
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['fontsize', ['fontsize']], // bouton pour tailles
      ['fontname', ['fontname']], // bouton pour polices
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['codeview', 'help']]
    ]
  });
});
</script>
<script>
  window.addEventListener('beforeunload', function() {
    if ($('#summernote').length) {
        $('#summernote').summernote('destroy');
    }
});
</script>
@endsection
