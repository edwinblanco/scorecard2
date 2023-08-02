@extends('adminlte::page')

@section('title', 'DPJD')

@section('content_header')

    <div class="container-fluid mx-0 my-0 mb-2 p-0">
        <div class="row m-0 p-0">
            <div class="col banner-container p-0">
                <!-- Banner utilizando la clase "img-fluid" para hacer la imagen responsive y "w-100" para ocupar todo el ancho -->
                <img src="@if ($ban == 1)
                            {{ asset('banners/produ.png') }}
                        @elseif ($ban == 2)
                            {{ asset('banners/Aseo Baño.png') }}
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
        <button type="button" class="btn button-custom m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                        <form action="/productividad_adm" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Auxiliar</label>
                                <input type="text" class="form-control" id="aux" name="aux" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputcajas1" class="form-label">Cajas</label>
                                <input type="number" class="form-control" id="cajas" name="cajas" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleuni1" class="form-label">Unidades</label>
                                <input type="number" class="form-control" id="unidades" name="unidades" required>
                            </div>
                            <button type="submit" class="btn button-custom">Guardar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            Cargar archivo .xlsx <i class="bi bi-filetype-xlsx"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivo .xlsx</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-1">Al cargar el archivo Excel se eliminaran los registros anteriores y se cargarán los nuevos registros.</p>
                    <form action="{{ route('productividad.import') }}" method="post" enctype="multipart/form-data" class="row g-3">
                        @csrf

                        <div class="col-auto">
                            <label for="excel_file" class="visually-hidden">Archivo Excel</label>
                            <input type="file" name="excel_file" id="excel_file" class="form-control">
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn button-custom">Cargar Excel</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <!-- Mostrar errores de validación -->
        @if($errors->any())
            <div class="alert alert-danger auto-dismiss">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success auto-dismiss">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger auto-dismiss">
                {{ session('error') }}
            </div>
        @endif

        <table id="productividad" class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded">
            <thead>
                <tr>
                    <th scope="col">Auxiliar</th>
                    <th scope="col">Cajas</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_productividad as $obj)
                    <tr>
                        <td scope="row">{{ $obj->auxiliar }}</td>
                        <td>{{ $obj->cajas }}</td>
                        <td>{{ $obj->unidades }}</td>
                        <td>
                            <form action="/productividad_adm/{{ $obj->id }}" class="form-del" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/productividad_adm/{{ $obj->id }}" class="btn button-custom a-del">Editar</a>
                                <button type="submit" class="btn btn-danger mb-1">Eliminar</button>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>

        body{
            margin: 0;
            padding: 0;
        }

        .button-custom{
            background-color: #021859;
            color: white;
        }

        .button-custom:hover{
            border: #021859 solid 1px;
        }

        .banner-container {
            position: relative;

            /* Permite posicionar elementos internos de forma absoluta */
            text-align: center;
            /* Centra el texto horizontalmente */
        }

        .banner-text {
            position: absolute;
            /* Permite posicionar el texto de forma absoluta dentro del contenedor */
            bottom: 35%;
            /* Distancia desde la parte inferior del contenedor */
            left: 55%;
            /* Centra el texto horizontalmente */
            transform: translateX(-10%);
            /* Centra el texto exactamente en el medio */
            color: white;
            /* Color del texto */
            font-size: 40px;
            /* Tamaño del texto */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Sombra para mejorar la legibilidad del texto en la imagen */
        }

        #contain {
            height: 400px;
            overflow-y: scroll;
        }

        #table_scroll {
            width: 100%;
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>
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
    <!--<script>
        $('.a-del').click(function(e) {
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
    </script>-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const autoDismissAlerts = document.querySelectorAll('.auto-dismiss');

            autoDismissAlerts.forEach(alert => {
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 5000); // 5000 milisegundos = 5 segundos, puedes ajustar este valor a tu preferencia
            });
        });
    </script>
@stop

