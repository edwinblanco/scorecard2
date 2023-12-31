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
                        @elseif ($ban == 4)
                            {{ asset('banners/Rutinas.png') }}
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

        <h2 class="m-1">Horario mañana</h2>
        <div id="calendar"></div>
        <hr class="border">
        <h2 class="m-1">Horario tarde</h2>
        <div id="calendar2"></div>

        <!-- Modal para el formulario -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Asignar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('calendar-ruti.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="date" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" name="date" id="eventDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="pasillo" class="form-label">Pasillo:</label>
                                <input type="number" class="form-control" name="pasillo" required>
                            </div>
                            <div class="mb-3">
                                <label for="horario" class="form-label">Horario:</label>
                                <select class="form-select" aria-label="Default select example" id="horario" name="horario">
                                    <option value="am">AM</option>
                                    <option value="pm">PM</option>
                                  </select>
                            </div>

                            <button type="submit" class="btn button-custom">Guardar</button>
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

    <script src="//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.8/index.global.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.min.js"></script>

    <script>
    function obtenerColor(horario) {
            // Definimos una lógica condicional para asignar colores según 'am' o 'pm'
            if (horario === 'am') {
                return '#021859'; // Por ejemplo, rojo para 'am'
            } else if (horario === 'pm') {
                return '#FF0000'; // Por ejemplo, verde para 'pm'
            } else {
                return '#000000'; // Color predeterminado para otros casos
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridWeek', // Vista semanal con días enteros
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek'
                },
                views: {
                    dayGrid: {
                        // Configurar vista semanal para mostrar solo días enteros
                        dayHeaderFormat: { weekday: 'long' }
                    }
                },
                selectable: true,
                dateClick: function (info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    document.getElementById('eventForm').style.display = 'block';
                },
                eventContent: function (arg) {
                    // Personalizar el contenido del evento para mostrar solo el título
                    return {
                        html: `<div style="font-size: 16px;">${arg.event.title}</div>`
                    };
                },
                locale: 'es',
                dateClick: function (info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    // Mostrar el modal al hacer clic en un día
                    let eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    eventModal.show();
                },
                contentHeight: 'auto'
            });

            // Eventos desde el controlador
            const eventsFromController = [
                @foreach ($events as $event)
                    @if ($event->horario === 'am')
                        {
                            title: '{{ $event->nombre }}',
                            start: '{{ $event->fecha }}',
                            allDay: true, // Indica que es un evento de día completo
                            backgroundColor: obtenerColor('{{ $event->horario }}'), // Color dinámico basado en el valor de horario
                            borderColor: obtenerColor('{{ $event->horario }}'), // Borde del evento con el mismo color
                        },
                    @endif
                @endforeach
            ];

            // Agregar los eventos desde el controlador al calendario
            calendar.addEventSource(eventsFromController);

            calendar.render();
        });
    </script>

    <script>

        function obtenerColor(horario) {
            // Definimos una lógica condicional para asignar colores según 'am' o 'pm'
            if (horario === 'am') {
                return '#021859'; // Por ejemplo, rojo para 'am'
            } else if (horario === 'pm') {
                return '#FF0000'; // Por ejemplo, verde para 'pm'
            } else {
                return '#000000'; // Color predeterminado para otros casos
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar2');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridWeek', // Vista semanal con días enteros
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek'
                },
                views: {
                    dayGrid: {
                        // Configurar vista semanal para mostrar solo días enteros
                        dayHeaderFormat: { weekday: 'long' }
                    }
                },
                selectable: true,
                dateClick: function (info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    document.getElementById('eventForm').style.display = 'block';
                },
                eventContent: function (arg) {
                    // Personalizar el contenido del evento para mostrar solo el título
                    return {
                        html: `<div style="font-size: 16px;">${arg.event.title}</div>`
                    };
                },
                locale: 'es',
                dateClick: function (info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    // Mostrar el modal al hacer clic en un día
                    let eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    eventModal.show();
                },
                contentHeight: 'auto'
            });

            // Eventos desde el controlador
            const eventsFromController = [
                @foreach ($events as $event)
                    @if ($event->horario === 'pm')
                            {
                                title: '{{ $event->nombre }} - {{ $event->horario }}',
                                start: '{{ $event->fecha }}',
                                allDay: true, // Indica que es un evento de día completo
                                backgroundColor: obtenerColor('{{ $event->horario }}'), // Color dinámico basado en el valor de horario
                                borderColor: obtenerColor('{{ $event->horario }}'), // Borde del evento con el mismo color
                            },
                @endif
                @endforeach
            ];

            // Agregar los eventos desde el controlador al calendario
            calendar.addEventSource(eventsFromController);

            calendar.render();
        });
    </script>

@stop
