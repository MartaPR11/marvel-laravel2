@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600&family=Bebas+Neue&display=swap" rel="stylesheet">
    <h3>
        <a href="{{ route('home') }}" title="Inicio">Inicio</a> <span>| Personajes</span>
    </h3>
    <div class="row">

        @foreach ($rowset as $row)

            <article class="col m12 l6">
                <div class="card horizontal small">
                    <div class="card-image">
                        {{ Html::image('marvel2-laravel/public/img/'.$row->imagen, $row->nombre) }}
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h4><strong>{{ $row->nombre  }}</strong></h4>
                            <p><strong>Edad: </strong>{{ $row->edad  }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('personaje/'.$row->slug) }}">Más información</a>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

    </div>

@endsection
