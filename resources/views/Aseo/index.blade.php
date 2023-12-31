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
                            {{ asset('banners/bano.png') }}
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

        <div id="calendar"></div>

        <!-- Modal para el formulario -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Asignar persona a día</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('calendar.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="date" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" name="date" id="eventDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <button type="submit" class="btn button-custom">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal para editar evento -->
        <div class="modal" id="editEventModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar persona encargada</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario para actualizar el evento -->
                        <form id="editEventForm" method="post" action="">
                            @csrf
                            @method('PUT')
                            <label for="editEventTitle">Persona encargada:</label>
                            <input type="text" id="editEventTitle" name="persona" class="form-control" placeholder="Título del evento" required>
                            <label for="editEventDate">Fecha:</label>
                            <input type="date" id="editEventDate" name="fecha" class="form-control" required>
                            <!-- Campo oculto para almacenar el ID del evento -->
                            <input type="hidden" id="editEventId" name="event_id" value="">
                            <button type="submit" class="btn button-custom my-2">Actualizar</button>
                            <a id="eliminarEvento" href="" class="btn btn-danger my-2">Eliminar</a>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                selectable: true,
                eventContent: function (arg) {
                    return {
                        html: `<div style="font-size: 20px;">${arg.event.title}</div>`,
                    };
                },
                locale: 'es',
                dateClick: function (info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    // Mostrar el modal al hacer clic en un día
                    let eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    eventModal.show();
                },
                eventClick: function(info) {
                    // Obtener la información del evento seleccionado
                    let eventId = info.event.id;
                    let eventTitle = info.event.title;
                    let eventDate = info.event.start;

                    console.log(eventDate);

                    // Formatear la fecha del evento en el formato 'YYYY-MM-DD'
                    let formattedDate = eventDate.toISOString().slice(0, 10);

                    console.log(formattedDate);

                    // Rellenar el formulario con la información del evento
                    document.getElementById('editEventTitle').value = eventTitle;
                    document.getElementById('editEventId').value = eventId;
                    document.getElementById('editEventDate').value = formattedDate;

                    // Actualizar el atributo 'action' del formulario con la URL para actualizar el evento
                    let form = document.getElementById('editEventForm');
                    form.action = '/actualizar_evento/' + eventId;

                    let eliminar = document.getElementById('eliminarEvento');
                    eliminar.href = '/eliminar_evento/'+eventId;

                    // Mostrar el modal para editar el evento
                    let editEventModal = new bootstrap.Modal(document.getElementById('editEventModal'));
                    editEventModal.show();
                },
            });

            // Eventos desde el controlador
            const eventsFromController = [
                @foreach ($events as $event)
                {
                    id: '{{ $event->id }}',
                    title: '{{ $event->nombre }}',
                    start: '{{ $event->fecha }}',
                    display: 'block', // Hacer que el evento ocupe más espacio vertical
                    backgroundColor: '#021859', // Cambiar el color de fondo del evento
                    borderColor: '#021859',
                },
                @endforeach
            ];

            // Agregar los eventos desde el controlador al calendario
            calendar.addEventSource(eventsFromController);

            calendar.render();
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
