
@extends('adminlte::page')

@section('title', 'DPJD')

@section('content_header')
    <div class="container-fluid mx-0 my-0 mb-2 p-0">
        <div class="row m-0 p-0">
            <div class="col banner-container p-0">
                <!-- Banner utilizando la clase "img-fluid" para hacer la imagen responsive y "w-100" para ocupar todo el ancho -->
                <img src="@if ($ban == 1)
                            {{ asset('banners/Banner Productividad.png') }}
                        @elseif ($ban == 5)
                            {{ asset('banners/Personal.png') }}
                        @endif"
                    alt="Banner" class="img-fluid img-fluid-a w-100"
                    style="height: 100px;">
                <!-- Texto dentro del banner -->
                <!--<h1 class="banner-text">LISTA DE PRODUCTIVIDAD</h1>-->
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="container mt-5">
    <h1>Grupos</h1>
    @if (!$grupo_am)
        <a class="btn btn-info my-2" href="/grupos-create/horarioam">Crear grupo AM</a>
    @endif

    @if (!$grupo_pm)
        <a class="btn btn-info my-2" href="/grupos-create/horariopm">Crear grupo PM</a>
    @endif

    @if (!$grupo_alma)
        <a class="btn btn-info my-2" href="/grupos-create/almacenamiento">Crear grupo Almacenamiento</a>
    @endif

    @if (!$grupo_fact)
        <a class="btn btn-info my-2" href="/grupos-create/facturacion">Crear grupo Facturación</a>
    @endif

    @if (!$grupo_tras)
        <a class="btn btn-info my-2" href="/grupos-create/trasporte">Crear grupo Trasporte</a>
    @endif

    @if (!$grupo_tat)
        <a class="btn btn-info my-2" href="/grupos-create/tat">Crear grupo TAT</a>
    @endif

    @if (!$grupo_mon)
        <a class="btn btn-info my-2" href="/grupos-create/monitoreo">Crear grupo Monitoreo</a>
    @endif


    <div class="row">
        @foreach ($grupos as $grupo)
                <div class="col">
                    <a class="btn button-custom" href="{{ route('grupos.show', $grupo) }}">Ver Grupo "{{ $grupo->nombre }}"</a>
                </div>
        @endforeach
    </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
@stop



