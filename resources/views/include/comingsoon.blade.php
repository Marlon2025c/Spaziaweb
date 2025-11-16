@extends('layouts.app')
@section('title', 'Spazia - 404')
@section('content')
<link rel="stylesheet" href="{{ asset('css/comingsoon.css') }}">

<div class="body404">
  <div class="noise"></div>
  <div class="scanline"></div>

  <div class="terminal">
    <h1>Error <span class="errorcode">404</span></h1>
    <p class="output">La page que vous recherchez a peut-être été supprimée, renommée ou est temporairement indisponible.</p>
    <p class="output">Veuillez essayer de  <a href="{{ url('/') }}">retourner à la page d’accueil</a>.</p>
    <p class="output">Bonne chance.</p>
  </div>
</div>

@endsection
