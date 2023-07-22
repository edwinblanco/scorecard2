@extends('adminlte::page')

@section('title', 'DPJD')

@section('content_header')
    <div class="container-fluid mx-0 my-0 mb-2 p-0">
        <div class="row m-0 p-0">
            <div class="col banner-container p-0">
                <!-- Banner utilizando la clase "img-fluid" para hacer la imagen responsive y "w-100" para ocupar todo el ancho -->
                <img src="@if ($ban == 1)
                            {{ asset('banners/Banner Productividad.png') }}
                        @elseif ($ban == 2)
                            {{ asset('banners/Aseo Baño.png') }}
                        @elseif ($ban == 3)
                            {{ asset('banners/tren.png') }}
                        @endif"
                    alt="Banner" class="img-fluid img-fluid-a w-100"
                    style="height: 120px;">
                <!-- Texto dentro del banner -->
                <!--<h1 class="banner-text">LISTA DE PRODUCTIVIDAD</h1>-->
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <h1 class="text-center m-2">Editar registro</h1>
        <form action="/trenadmin/{{$tren->id}}" method="POST" class="shadow p-3 mb-5 bg-body rounded">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Población</label>
                <input type="text" class="form-control" id="pobla" name="pobla" value="{{$tren->poblacion}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputcajas1" class="form-label">Frecuencia</label>
                <input type="text" class="form-control" id="frecu" name="frecu" value="{{$tren->frecuencia}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleuni1" class="form-label">Días de cargue</label>
                <input type="text" class="form-control" id="dias" name="dias" value="{{$tren->diasCargue}}" required>
            </div>
            <button type="submit" class="btn button-custom">Editar</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@stop

