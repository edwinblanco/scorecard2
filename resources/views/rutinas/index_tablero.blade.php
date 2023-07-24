@extends('layouts.base')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2 class="m-1">Horario mañana</h2>
                <div class="calendar-container" id="calendar"></div>
            </div>
            <div class="col">
                <h2 class="m-1">Horario tarde</h2>
                <div class="calendar-container" id="calendar2"></div>
            </div>
        </div>
    </div>

    <!-- Script de jQuery para el desplazamiento automático -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


        document.addEventListener('DOMContentLoaded', function() {
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
                        dayHeaderFormat: {
                            weekday: 'long'
                        }
                    }
                },
                selectable: true,
                dateClick: function(info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    document.getElementById('eventForm').style.display = 'block';
                },
                eventContent: function(arg) {
                    // Personalizar el contenido del evento para mostrar solo el título
                    return {
                        html: `<div style="font-size: 16px;">${arg.event.title}</div>`
                    };
                },
                locale: 'es',
                dateClick: function(info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    // Mostrar el modal al hacer clic en un día
                    let eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    eventModal.show();
                },
                contentHeight: 'auto',
                buttonText: {
                    prev: '<', // Cambia el texto del botón "anterior" a un icono o cualquier texto deseado.
                    next: '>', // Cambia el texto del botón "siguiente" a un icono o cualquier texto deseado.
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día'
                },
            });

            // Eventos desde el controlador
            const eventsFromController = [
                @foreach ($events as $event)
                    @if ($event->horario === 'am')
                        {
                            title: '{{ $event->nombre }}',
                            start: '{{ $event->fecha }}',
                            allDay: true, // Indica que es un evento de día completo
                            backgroundColor: obtenerColor(
                                '{{ $event->horario }}'), // Color dinámico basado en el valor de horario
                            borderColor: obtenerColor(
                                '{{ $event->horario }}'), // Borde del evento con el mismo color
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

        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl2 = document.getElementById('calendar2');

            let calendar2 = new FullCalendar.Calendar(calendarEl2, {
                initialView: 'dayGridWeek', // Vista semanal con días enteros
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek'
                },
                views: {
                    dayGrid: {
                        // Configurar vista semanal para mostrar solo días enteros
                        dayHeaderFormat: {
                            weekday: 'long'
                        }
                    }
                },
                selectable: true,
                dateClick: function(info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    document.getElementById('eventForm').style.display = 'block';
                },
                eventContent: function(arg) {
                    // Personalizar el contenido del evento para mostrar solo el título
                    return {
                        html: `<div style="font-size: 16px;">${arg.event.title}</div>`
                    };
                },
                locale: 'es',
                dateClick: function(info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    // Mostrar el modal al hacer clic en un día
                    let eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    eventModal.show();
                },
                contentHeight: 'auto',
                buttonText: {
                    prev: '<', // Cambia el texto del botón "anterior" a un icono o cualquier texto deseado.
                    next: '>', // Cambia el texto del botón "siguiente" a un icono o cualquier texto deseado.
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día'
                },
            });

            // Eventos desde el controlador
            const eventsFromController = [
                @foreach ($events as $event)
                    @if ($event->horario === 'pm')
                        {
                            title: '{{ $event->nombre }} - {{ $event->horario }}',
                            start: '{{ $event->fecha }}',
                            allDay: true, // Indica que es un evento de día completo
                            backgroundColor: obtenerColor(
                                '{{ $event->horario }}'), // Color dinámico basado en el valor de horario
                            borderColor: obtenerColor(
                                '{{ $event->horario }}'), // Borde del evento con el mismo color
                        },
                    @endif
                @endforeach
            ];

            // Agregar los eventos desde el controlador al calendario
            calendar2.addEventSource(eventsFromController);

            calendar2.render();
        });
    </script>


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
            const nuevaRuta = "{{ route('productividad') }}";
            // Cambia la ubicación de la página a la nueva ruta
            window.location.href = nuevaRuta;
        }

        // Intervalo de tiempo en milisegundos para cambiar la ruta (ejemplo: 5 segundos)
        const intervaloTiempo = 30000; // 5000 milisegundos = 5 segundos

        // Iniciar el intervalo para cambiar la ruta automáticamente
        setInterval(recargarConNuevaRuta, intervaloTiempo);

    </script>

@endsection
