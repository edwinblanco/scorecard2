@extends('layouts.base')

@section('content')

    <div class="continer-fluid">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach ($events as $key => $obj)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="{{$obj->imagen_url}}" class="d-block w-100" alt="...">
                    </div>
                @endforeach

              <div class="carousel-item active" data-bs-interval="10000">

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>


    {{-- Contenido --}}
    {{--<div class="container-fluid">

        @php
            use Carbon\Carbon;
            setlocale(LC_TIME, 'es_ES.UTF-8');
            $startOfWeek = Carbon::now()->startOfWeek();
            $endOfWeek = Carbon::now()->endOfWeek();
        @endphp

        <h3 class="text-center">{{ ucfirst($startOfWeek->isoFormat('D [de] MMMM')) }} - {{ ucfirst($endOfWeek->isoFormat('D [de] MMMM')) }}</h3>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="15000">
                <h4 class="text-center m-1">Horario mañana</h4>

                <table class="table table-striped table-bordered border-primary">
                    <thead>
                        <tr>
                            @for ($date = $startOfWeek; $date <= $endOfWeek; $date->addDay())
                                <th scope="col">{{ ucfirst($date->isoFormat('D [de] MMMM')) }}<br>{{ ucfirst($date->isoFormat('dddd')) }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                $currentDay = Carbon::now()->startOfWeek();
                            @endphp
                            @while ($currentDay <= $endOfWeek)
                                <td>
                                    @foreach ($events as $event)
                                        @php
                                            $eventDate = Carbon::parse($event->fecha);
                                            $currentWeek = Carbon::now()->isoFormat('W');
                                            $eventWeek = $eventDate->isoFormat('W');
                                        @endphp
                                        @if ($currentWeek === $eventWeek && $currentDay->isoFormat('Y-m-d') === $eventDate->isoFormat('Y-m-d') && $event->horario === "am")
                                            Ps: {{ $event->pasillo }} / {{ $event->nombre }}
                                            <br>
                                            <div class="border"></div>
                                        @endif
                                    @endforeach
                                </td>
                                @php
                                    $currentDay = $currentDay->addDay();
                                @endphp
                            @endwhile
                        </tr>
                    </tbody>
                </table>
              </div>
              <div class="carousel-item" data-bs-interval="15000">
                @php
                    $startOfWeek2 = Carbon::now()->startOfWeek();
                    $endOfWeek2 = Carbon::now()->endOfWeek();
                @endphp
                <h3 class="text-center m-1">Horario tarde</h3>

                <table class="table table-striped table-bordered border-primary">
                    <thead>
                        <tr>
                            @for ($date2 = $startOfWeek2; $date2 <= $endOfWeek2; $date2->addDay())
                                <th scope="col">{{ ucfirst($date2->isoFormat('D [de] MMMM')) }}<br>{{ ucfirst($date2->isoFormat('dddd')) }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                $currentDay = Carbon::now()->startOfWeek();
                            @endphp
                            @while ($currentDay <= $endOfWeek)
                                <td>
                                    @foreach ($events as $event)
                                        @php
                                            $eventDate = Carbon::parse($event->fecha);
                                            $currentWeek = Carbon::now()->isoFormat('W');
                                            $eventWeek = $eventDate->isoFormat('W');
                                        @endphp
                                        @if ($currentWeek === $eventWeek && $currentDay->isoFormat('Y-m-d') === $eventDate->isoFormat('Y-m-d') && $event->horario === "pm")
                                            Ps: {{ $event->pasillo }} / {{ $event->nombre }}
                                            <br>
                                        @endif
                                    @endforeach
                                </td>
                                @php
                                    $currentDay = $currentDay->addDay();
                                @endphp
                            @endwhile
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

    </div>--}}

    <!-- Script de jQuery para el desplazamiento automático -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.min.js"></script>

    <script>
        // Función para recargar la página cada 5 minutos (300000milisegundos)
        setInterval(function() {
            location.reload();
        }, 300000); // 300000 milisegundos = 5 minutos
    </script>

    <script>

        // Función para recargar la página con una nueva ruta
        function recargarConNuevaRuta() {
            // Obtén una ruta aleatoria del arreglo
            const nuevaRuta = "{{ route('grupos.index_tablero') }}";
            // Cambia la ubicación de la página a la nueva ruta
            window.location.href = nuevaRuta;
        }

        // Intervalo de tiempo en milisegundos para cambiar la ruta (ejemplo: 5 segundos)
        const intervaloTiempo = 90000; // 5000 milisegundos = 5 segundos

        // Iniciar el intervalo para cambiar la ruta automáticamente
        setInterval(recargarConNuevaRuta, intervaloTiempo);

    </script>

@endsection
