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
                            {{ asset('banners/trenadmin.png') }}
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
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn button-custom my-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar nuevo registro
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/trenadmin" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Población</label>
                                <input type="text" class="form-control" id="pobla" name="pobla" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputcajas1" class="form-label">Frecuencia</label>
                                <input type="text" class="form-control" id="frecu" name="frecu" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleuni1" class="form-label">Días de cargue</label>
                                <input type="text" class="form-control" id="dias" name="dias" required>
                            </div>
                            <button type="submit" class="btn button-custom">Guardar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <h3>Fecha actual: {{$fecha->fecha}}</h3>
        <form action="/trenadmin_fecha/{{$fecha->id}}" method="POST" class="mb-1">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <button type="submit" class="btn button-custom">Actualizar feccha</button>
        </form>

        <table id="productividad" class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded">
            <thead>
                <tr>
                    <th scope="col">Población</th>
                    <th scope="col">Frecuencia</th>
                    <th scope="col">Días de cargue</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tren as $obj)
                    <tr>
                        <td scope="row">{{ $obj->poblacion }}</td>
                        <td>{{ $obj->frecuencia}}</td>
                        <td>{{ $obj->diasCargue }}</td>
                        <td>
                            <form action="/trenadmin/{{ $obj->id }}" class="form-del" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/trenadminedit/{{ $obj->id }}" class="btn button-custom">Editar</a>
                                <button type="submit" class="btn btn-danger mb-1">Eliminar</button>
                                @if ($obj->mostrar)
                                    <a href="/trenadmineditmostrar/{{ $obj->id }}/0" class="btn btn-info">No mostrar</a>
                                @else
                                    <a href="/trenadmineditmostrar/{{ $obj->id }}/1" class="btn btn-warning">Mostrar</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
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

    <script src="//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#productividad').DataTable({
                "language": {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                "lengthMenu": [
                    [5, 10, 100, -1],
                    [5, 10, 100, "Todos"]
                ]
            });
        });
    </script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '!Registro eliminado!',
                '!Registro eliminado con exito!',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-del').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡El registro se eliminará definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        })
    </script>
@stop
