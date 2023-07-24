
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
<div class="container mt-5">
    <h3 class="m-1">Grupo "{{ $grupo->nombre }}"</h3>

    <!-- Button trigger modal -->
    <button type="button" class="btn button-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar persona
    </button>

    @if ($grupo->tipo == "almacenamiento")
    <div class="row">
        <div class="col">
            <div class="mt-4">
                <h6>Coordinador</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'coordinador') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Jefe</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'jefe') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Aux almacenamiento</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'aux_almace') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>MontaCargas 1</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'monta1') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>MontaCargas 2</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'monta2') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @elseif ($grupo->tipo == "facturacion")
    <div class="row">
        <div class="col">
            <div class="mt-4">
                <h6>Base</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'base') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>TAT BGA</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'tatbga') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>TAT CUCUTA</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'tatcuc') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>COORD RIN</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'coordrin') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @elseif ($grupo->tipo == "trasporte")
    <div class="row">
        <div class="col">
            <div class="mt-4">
                <h6>Don Pastor</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'donpastor') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Carro empresa 1</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'carro1') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Aux carro 1</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'auxcarro1') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Carro empresa 2</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'carro2') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Aux carro 2</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'auxcarro2') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @elseif ($grupo->tipo == "tat")
    <div class="row">
        <div class="col">
            <div class="mt-4">
                <h6>Líder</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'liderr') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Separador</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'separador') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @elseif ($grupo->tipo == "monitoreo")
    <div class="row">
        <div class="col">
            <div class="mt-4">
                <h6>Monitoreo</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'monitoreo') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <div class="mt-4">
                <h6>Líderes</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'lider') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Sensibles</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'sensibles') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Unidades</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'unidades') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Cajas</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'cajas') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mt-4">
                <h6>Capitan cargue</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'cap_cargue') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Aux cargue</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'aux_cargue') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Aux rin</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'aux_rin') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="mt-4">
                <h6>Surtido</h6>
                <ul class="list-group">
                    @foreach ($personas->where('tipo', 'surtido') as $persona)
                        <li class="list-group-item">{{ $persona->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('personas.store', $grupo) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <select id="tipo" name="tipo" class="form-select" required>
                            @if ($grupo->tipo == 'horarioam')
                                <option value="lider">Líder</option>
                                <option value="sensibles">Sensibles</option>
                                <option value="unidades">Unidades</option>
                                <option value="cajas">Cajas</option>
                                <option value="cap_cargue">Capitan cargue</option>
                                <option value="aux_cargue">Aux cargue</option>
                                <option value="aux_rin">Aux rin</option>
                                <option value="surtido">Surtido</option>
                            @elseif ($grupo->tipo == 'horariopm')
                                <option value="lider">Líder</option>
                                <option value="sensibles">Sensibles</option>
                                <option value="unidades">Unidades</option>
                                <option value="cajas">Cajas</option>
                                <option value="cap_cargue">Capitan cargue</option>
                                <option value="aux_cargue">Aux cargue</option>
                                <option value="aux_rin">Aux rin</option>
                            @elseif ($grupo->tipo == 'almacenamiento')
                                <option value="coordinador">Coordinador</option>
                                <option value="jefe">Jefe</option>
                                <option value="aux_almace">Aux almacenamiento</option>
                                <option value="monta1">MontaCargas 1</option>
                                <option value="monta2">MontaCargas 2</option>
                            @elseif ($grupo->tipo == 'facturacion')
                                <option value="base">Base</option>
                                <option value="tatbga">TAT BGA</option>
                                <option value="tatcuc">TAT CUCUTA</option>
                                <option value="coordrin">COORD RIN</option>
                            @elseif ($grupo->tipo == 'trasporte')
                                <option value="donpastor">Don Pastor</option>
                                <option value="carro1">Carro empresa 1</option>
                                <option value="auxcarro1">Aux carro 1</option>
                                <option value="carro2">Carro empresa 2</option>
                                <option value="auxcarro2">Aux carro 2</option>
                            @elseif ($grupo->tipo == 'tat')
                                <option value="liderr">Líder</option>
                                <option value="separador">Separador</option>
                            @elseif ($grupo->tipo == 'monitoreo')
                                <option value="monitoreo">Monitoreo</option>
                            @endif
                        </select>
                    </div>

                    <button type="submit" class="btn button-custom">Agregar Persona</button>
                </form>
            </div>
        </div>
        </div>
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


