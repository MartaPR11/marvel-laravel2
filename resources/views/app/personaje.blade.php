@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600&family=Bebas+Neue&display=swap" rel="stylesheet">
    <h3>
        <a href="{{ route('home') }}" title="Inicio">Inicio</a> <span>| </span>
        <a href="{{ route('personajes') }}" title="personajes">personajes</a> <span>| </span>
        <span>{{ $row->nombre }}</span>
    </h3>
    <div class="row">

        <article class="col s12">
            <div class="card horizontal large personaje">
                <div class="card-image">
                    {{ Html::image('marvel2-laravel/public/img/'.$row->imagen, $row->nombre) }}
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h4><strong>{{ $row->nombre  }}</strong></h4>
                        <p><strong>Edad: </strong>{{ $row->edad  }}</p>
                        <p><strong>Primera pelicula:  </strong>{{ $row->primeraPelicula  }}</p>
                        <p><strong>Descripción:  </strong>{!! $row->descripcion !!}</p>
                        <br>
                    </div>
                </div>
            </div>
        </article>
    </div>
@endsection
