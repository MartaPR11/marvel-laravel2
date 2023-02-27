@extends('layouts.admin')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600&family=Bebas+Neue&display=swap" rel="stylesheet">
    <h3>
        <a href="{{ route("admin") }}" title="Inicio">Inicio</a> <span>| Personajes</span>
    </h3>
    <!--Paginación-->
    <div class="row paginado">
        {{ $rowset->links() }}
    </div>
    <div class="row">
        <!--Nuevo-->
        <article class="col s12 l6">
            <div class="card horizontal admin">
                <div class="card-stacked">
                    <div class="card-content">
                        <i class="grey-text material-icons medium">image</i>
                        <h4 class="grey-text">
                            nuevo personaje
                        </h4><br><br>
                    </div>
                    <div class="card-action">
                        <a href="{{ url("admin/personajes/crear") }}" title="Añadir nuevo personaje">
                            <i class="material-icons">add_circle</i>
                        </a>
                    </div>
                </div>
            </div>
        </article>
        @foreach ($rowset as $row)
            <article class="col s12 l6">
                <div class="card horizontal  sticky-action admin">
                    <div class="card-stacked">
                        @if ($row->imagen)
                            <div class="card-image">
                                {{ Html::image('marvel2-laravel/public/img/'.$row->imagen, $row->nombre) }}
                            </div>
                        @endif
                        <div class="card-content">
                            @if (!$row->imagen)
                                <i class="grey-text material-icons medium">image</i>
                            @endif
                            <h4>
                                {{ $row->nombre }}
                            </h4>
                            <strong>URL amigable:</strong> {{ $row->slug }}<br>
                        </div>
                        <div class="card-action">
                            <a href="{{ url("admin/personajes/editar/".$row->id) }}" title="Editar">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="{{ url("admin/personajes/activar/".$row->id) }}" title="{{ Vistas::titulo($row->activo) }}">
                                <i class="{{ Vistas::color($row->activo) }} material-icons">{{ Vistas::icono($row->activo) }}</i>
                            </a>
                            @php
                                $title = ($row->home == 1) ? "Quitar de la home" : "Mostrar en la home";
                                $color = ($row->home == 1) ? "green-text" : "red-text";
                            @endphp
                            <a href="{{ url("admin/personajes/home/".$row->id) }}" title="{{ $title }}">
                                <i class="{{ $color }} material-icons">home</i>
                            </a>
                            <a href="#" class="activator" title="Borrar">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </div>
                    <!--Confirmación de borrar-->
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Borrar personaje<i class="material-icons right">close</i></span>
                        <p>
                            ¿Está seguro de que quiere borrar la personaje<strong>{{ $row->nombre }}</strong>?<br>
                            Esta acción no se puede deshacer.
                        </p>
                        <a href="{{ url("admin/personajes/borrar/".$row->id) }}" title="Borrar">
                            <button class="btn waves-effect waves-light" type="button">Borrar
                                <i class="material-icons right">delete</i>
                            </button>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
