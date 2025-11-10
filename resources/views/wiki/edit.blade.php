@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Modifier l'article</h1>

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

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
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
