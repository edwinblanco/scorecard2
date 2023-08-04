@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <div id="carouselExampleInterval" class="carousel slide shadow-lg p-3 mb-5 bg-body rounded" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="8000">
                    @if ($grupo_alma)
                    <h3 class="m-1">Grupo {{ $grupo_alma->nombre }}</h3>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <h6>Coordinador</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_alma->personas as $persona)
                                        @if ($persona->tipo == 'coordinador')
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Jefe</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_alma->personas as $persona)
                                        @if ($persona->tipo == 'jefe')
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Aux almacenamiento</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_alma->personas as $persona)
                                        @if ($persona->tipo == 'aux_almace')
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>MontaCargas 1</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_alma->personas as $persona)
                                        @if ($persona->tipo == 'monta1')
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>MontaCargas 2</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_alma->personas as $persona)
                                        @if ($persona->tipo == 'monta2')
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <h3>Grupo Almacenamiento no creado</h3>
                    @endif
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    @if ($grupo_fact)
                    <h3 class="m-1">Grupo {{ $grupo_fact->nombre }}</h3>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <h6>Base</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_fact->personas as $persona)
                                        @if ($persona->tipo == "base")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>TAT BGA</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_fact->personas as $persona)
                                        @if ($persona->tipo == "tatbga")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>TAT CUCUTA</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_fact->personas as $persona)
                                        @if ($persona->tipo == "tatcuc")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>COORD RIN</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_fact->personas as $persona)
                                        @if ($persona->tipo == "coordrin")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <h3>Grupo Facturación no creado"</h3>
                    @endif
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    @if ($grupo_tras)
                    <h3 class="m-1">Grupo {{ $grupo_tras->nombre }}</h3>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <h6>Don Pastor</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_tras->personas as $persona)
                                        @if ($persona->tipo == "donpastor")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Carro empresa 1</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_tras->personas as $persona)
                                        @if ($persona->tipo == "carro1")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Aux carro 1</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_tras->personas as $persona)
                                        @if ($persona->tipo == "auxcarro1")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Carro empresa 2</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_tras->personas as $persona)
                                        @if ($persona->tipo == "carro2")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Aux carro 2</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_tras->personas as $persona)
                                        @if ($persona->tipo == "auxcarro2")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <h3>Grupo Trasporte no creado</h3>
                    @endif
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    @if ($grupo_tat)
                    <h3 class="m-1">Grupo {{ $grupo_tat->nombre }}</h3>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <h6>Líder</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_tat->personas as $persona)
                                        @if ($persona->tipo == "liderr")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Separador</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_tat->personas as $persona)
                                        @if ($persona->tipo == "separador")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <h3>Grupo TAT no creado</h3>
                    @endif
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    @if ($grupo_mon)
                    <h3 class="m-1">Grupo {{ $grupo_mon->nombre }}</h3>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <h6>Monitoreo</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_mon->personas as $persona)
                                        @if ($persona->tipo == "monitoreo")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <h3>Grupo Monitoreo no creado"</h3>
                    @endif
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    @if ($grupo_am)
                    <h3 class="m-1">Grupo {{ $grupo_am->nombre }}</h3>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <h6>Líderes</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "lider")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Sensibles</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "sensibles")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Unidades</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "unidades")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Cajas</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "cajas")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
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
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "cap_cargue")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Aux cargue</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "aux_cargue")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Aux rin</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "aux_rin")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Surtido</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_am->personas as $persona)
                                        @if ($persona->tipo == "surtido")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <h3>Grupo AM no creado</h3>
                    @endif
                </div>
                <div class="carousel-item" data-bs-interval="8000">
                    @if ($grupo_pm)
                    <h3 class="m-1">Grupo {{ $grupo_pm->nombre }}</h3>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <h6>Líderes</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_pm->personas as $persona)
                                        @if ($persona->tipo == "lider")
                                            <li class="list-group-item">{{ $persona->nombre }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Sensibles</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_pm->personas as $persona)
                                        @if ($persona->tipo == "sensibles")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Unidades</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_pm->personas as $persona)
                                        @if ($persona->tipo == "unidades")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Cajas</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_pm->personas as $persona)
                                        @if ($persona->tipo == "cajas")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
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
                                    @foreach ($grupo_pm->personas as $persona)
                                        @if ($persona->tipo == "cap_cargue")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Aux cargue</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_pm->personas as $persona)
                                        @if ($persona->tipo == "aux_cargue")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-4">
                                <h6>Aux rin</h6>
                                <ul class="list-group">
                                    @foreach ($grupo_pm->personas as $persona)
                                        @if ($persona->tipo == "aux_rin")
                                        <li class="list-group-item">{{ $persona->nombre }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                    @else
                    <h3>Grupo PM no creado</h3>
                    @endif
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Script de jQuery para el desplazamiento automático -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Función para recargar la página con una nueva ruta
        function recargarConNuevaRuta() {
            // Obtén una ruta aleatoria del arreglo
            const nuevaRuta = "{{ route('novedades') }}";
            // Cambia la ubicación de la página a la nueva ruta
            window.location.href = nuevaRuta;
        }

        // Intervalo de tiempo en milisegundos para cambiar la ruta
        const intervaloTiempo = 120000;

        // Iniciar el intervalo para cambiar la ruta automáticamente
        setInterval(recargarConNuevaRuta, intervaloTiempo);
    </script>

@endsection
