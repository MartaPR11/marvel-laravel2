@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600&family=Bebas+Neue&display=swap" rel="stylesheet">
    <h3>
        <a href="{{ route('home') }}" title="Inicio">Inicio</a> <span>| Acerca de</span>
    </h3>
    <div class="row">
        <i class="large material-icons">info_outline</i>
        <p>
            Esta página muestra personajes relacionadas con el universo de marvel studios.
        </p>
        <p>
            Está desarrollada en PHP con Programación orientada a Objetos, siguiendo el patrón Modelo Vista Controlador y
            utiliza MySQL para la persistencia de datos.
        </p>
    </div>

@endsection
