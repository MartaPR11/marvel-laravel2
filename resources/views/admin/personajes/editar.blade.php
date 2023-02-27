@extends('layouts.admin')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600&family=Bebas+Neue&display=swap" rel="stylesheet">
    <h3>
        <a href="{{ route("admin") }}" title="Inicio">Inicio</a> <span>| </span>
        <a href="{{ url("admin/personajes") }}" title="personajes">Personajes</a> <span>| </span>
        @if ($row->id)
            <span>Editar {{ $row->nombre }}</span>
        @else
            <span>Nuevo personaje</span>
        @endif
    </h3>
    <div class="row">
        @php $accion = ($row->id) ? "actualizar/".$row->id : "guardar" @endphp
        <form class="col s12" method="POST" enctype="multipart/form-data" action="{{ url("admin/personajes/".$accion) }}">
            @csrf
            <div class="col m12 l6">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" value="{{ $row->nombre }}">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="edad" type="text" name="edad" value="{{ $row->edad }}">
                        <label for="edad">Edad</label>
                    </div>
                </div>
            </div>
            <div class="col m12 l6 center-align">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagen</span>
                        <input type="file" name="imagen">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                @if ($row->imagen)
                    {{ Html::image('marvel2-laravel/public/img/'.$row->imagen, $row->nombre, ['class' => 'responsive-img']) }}
                @endif
            </div>
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="primeraPelicula" class="materialize-textarea" name="primeraPelicula">{{ $row->primeraPelicula }}</textarea>
                        <label for="primeraPelicula">Primera pelicula</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="descripcion" class="materialize-textarea" name="descripcion">{{ $row->descripcion }}</textarea>
                        <label for="descripcion">Descripcion</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <a href="{{ url("admin/personajes/") }}" title="Volver">
                        <button class="btn waves-effect waves-light" type="button">Volver
                            <i class="material-icons right">replay</i>
                        </button>
                    </a>
                    <button class="btn waves-effect waves-light" type="submit" name="guardar">Guardar
                        <i class="material-icons right">save</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
