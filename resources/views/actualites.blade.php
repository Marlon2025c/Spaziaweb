@extends('layouts.app')
@section('title', 'Spazia - Actualités')
@section('content')
<style>
            body {
            background-color: #101015
        }
                .shine {
            position: relative;
            display: inline-block;
            overflow: hidden;
        }

        .shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 200%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .4) 50%, rgba(255, 255, 255, 0) 100%);
            transform: skewX(-25deg);
            z-index: 2;
            pointer-events: none;
            /* Empêche toute interaction */
            opacity: 0;
            transition: none;
            /* Désactive les transitions qui garderaient l'effet */
        }

        .shine:hover::before {
            opacity: 1;
            animation: shine 0.75s ease-in-out;
        }

        @keyframes shine {
            from {
                left: -150%;
            }

            to {
                left: 150%;
            }
        }

        /* Réinitialiser après l'animation */
        .shine:hover::before {
            animation: shine 0.75s ease-in-out forwards;
        }

        .shine:not(:hover)::before {
            animation: none;
            opacity: 0;
        }
</style>
<br><br><br><br><br><br><br>
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        @foreach ($articles as $article)
            <div class="col">
                <div class="card h-100 card-darkmode" style="width: 30rem%;">
                    <div class="shine" style="background-color: #f0f0f0;">
                        <img src="{{ asset('storage/' . $article->logo) }}" class="card-img-top" style="height: 210px; width: 100%; object-fit: cover; border-radius: 4px;" alt="...">
                    </div>
                    <div class="card-body">
                        <span class="text-uppercase tag-darkmode d-inline-block mb-2 bg-success lh-1 rounded-1">
                            <b>{{ $article->tag }}</b>
                        </span>
                        <h5 class="text-uppercase"><b>{{ $article->title }}</b></h5>
                        <p class="text-muted mb-1">
                            {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}
                        </p>
                        <p class="text-muted">
                            <a href="{{ $article->lien_pubhtml5 }}" target="_blank">Voir l'article complet</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



<br><br><br><br><br><br>
 @endsection