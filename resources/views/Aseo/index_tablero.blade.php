@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Agregar el ID 'calendar' al div contenedor del calendario -->
        <div id="calendar"></div>
    </div>

    <!-- Script de jQuery para el desplazamiento automático -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                dateClick: function (info) {
                    document.getElementById('eventDate').value = info.dateStr;
                    document.getElementById('eventForm').style.display = 'block';
                },
                eventContent: function (arg) {
                    return {
                        html: `<div style="font-size: 16px;">${arg.event.title}</div>`,
                    };
                },
                eventDisplay: 'block',
                locale: 'es',
                height: 500,
            });

            // Eventos desde el controlador
            const eventsFromController = [
                @foreach ($events as $event)
                {
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
            const nuevaRuta = "{{ route('calendar-ruti.index_tablero') }}";
            // Cambia la ubicación de la página a la nueva ruta
            window.location.href = nuevaRuta;
        }

        // Intervalo de tiempo en milisegundos para cambiar la ruta (ejemplo: 5 segundos)
        const intervaloTiempo = 30000; // 5000 milisegundos = 5 segundos

        // Iniciar el intervalo para cambiar la ruta automáticamente
        setInterval(recargarConNuevaRuta, intervaloTiempo);

    </script>


@endsection
