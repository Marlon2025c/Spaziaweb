@extends('layouts.app')
@section('title', 'Spazia - Accuiel')
@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 50px;
        background-color: #121212;
        color: white;
    }
    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background: #1e1e1e;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
    }
    h1 {
        color: #f8b400;
    }
    p {
        font-size: 18px;
    }
    .download-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 15px 30px;
        background: #f8b400;
        color: #121212;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }
    .download-btn:hover {
        background: #ffcc00;
    }
</style>

<div class="container">
    <h1>SpaziaCraft Launcher</h1>
    <p>Rejoignez l'aventure de SpaziaCraft et téléchargez notre launcher dès maintenant !</p>
    <a href="{{ route('telecharger.launcher') }}" class="download-btn">Télécharger le Launcher</a>
</div>

@endsection