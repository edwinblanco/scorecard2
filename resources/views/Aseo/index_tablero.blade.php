@extends('layouts.base')

@section('content')

    <div class="container-fluid">
        <div class="row shadow p-3 mb-5 bg-body rounded">
            <div class="col">
                <div class="custom-calendar">
                    <h2 class="text-center mb-4" id="currentMonth"></h2>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th class="text-center">Día</th>
                                        <th>Encargad@</th>
                                    </tr>
                                </thead>
                                <tbody id="firstWeek">
                                    <!-- Esta sección se llenará con los días y eventos desde JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table class="table table-striped table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th class="text-center">Día</th>
                                        <th>Encargad@</th>
                                    </tr>
                                </thead>
                                <tbody id="secondWeek">
                                    <!-- Esta sección se llenará con los días y eventos desde JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table class="table table-striped table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th class="text-center">Día</th>
                                        <th>Encargad@</th>
                                    </tr>
                                </thead>
                                <tbody id="thirdWeek">
                                    <!-- Esta sección se llenará con los días y eventos desde JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table class="table table-striped table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th class="text-center">Día</th>
                                        <th>Encargad@</th>
                                    </tr>
                                </thead>
                                <tbody id="fourthWeek">
                                    <!-- Esta sección se llenará con los días y eventos desde JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Array con los nombres abreviados de los días de la semana en español
        let diasAbreviados = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];

        // Obtener el primer día y el último día del mes actual
        let today = new Date();
        let firstDayOfMonth = new Date(today.getUTCFullYear(), today.getUTCMonth(), 1);
        let lastDayOfMonth = new Date(today.getUTCFullYear(), today.getUTCMonth() + 1, 0);

        // Nombres de los meses en español
        let meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

        // Obtener el nombre del mes actual en español
        let currentMonthName = meses[today.getUTCMonth()];

        // Mostrar el nombre del mes en el encabezado
        document.getElementById('currentMonth').textContent = currentMonthName.charAt(0).toUpperCase() + currentMonthName.slice(1);

        // Obtener el elemento del cuerpo de las tablas donde llenaremos los días y eventos
        let firstWeek = document.getElementById('firstWeek');
        let secondWeek = document.getElementById('secondWeek');
        let thirdWeek = document.getElementById('thirdWeek');
        let fourthWeek = document.getElementById('fourthWeek');

        // Obtener los eventos desde PHP
        let events = {!! json_encode($events) !!};

        // Iterar por los días del mes y mostrar solo los días con eventos
        for (let day = firstDayOfMonth.getUTCDate(); day <= lastDayOfMonth.getUTCDate(); day++) {
            let currentDate = new Date(today.getUTCFullYear(), today.getUTCMonth(), day);
            let eventsForDay = events.filter(event => {
                let eventDate = new Date(event.fecha);
                return eventDate.getUTCFullYear() === currentDate.getUTCFullYear() &&
                    eventDate.getUTCMonth() === currentDate.getUTCMonth() &&
                    eventDate.getUTCDate() === currentDate.getUTCDate();
            });

            let currentDayOfWeek = diasAbreviados[currentDate.getUTCDay()];

            if (day <= 8) {
                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="text-center">${day} - ${currentDayOfWeek}</td>
                    <td>
                        <!-- Mostrar todos los eventos asociados a este día -->
                        ${eventsForDay.map(event => `<div>${event.nombre}</div>`).join('')}
                    </td>
                `;
                firstWeek.appendChild(newRow);
            } else if (day <= 16) {
                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="text-center">${day} - ${currentDayOfWeek}</td>
                    <td>
                        <!-- Mostrar todos los eventos asociados a este día -->
                        ${eventsForDay.map(event => `<div>${event.nombre}</div>`).join('')}
                    </td>
                `;
                secondWeek.appendChild(newRow);
            } else if (day <= 24) {
                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="text-center">${day} - ${currentDayOfWeek}</td>
                    <td>
                        <!-- Mostrar todos los eventos asociados a este día -->
                        ${eventsForDay.map(event => `<div>${event.nombre}</div>`).join('')}
                    </td>
                `;
                thirdWeek.appendChild(newRow);
            } else {
                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="text-center">${day} - ${currentDayOfWeek}</td>
                    <td>
                        <!-- Mostrar todos los eventos asociados a este día -->
                        ${eventsForDay.map(event => `<div>${event.nombre}</div>`).join('')}
                    </td>
                `;
                fourthWeek.appendChild(newRow);
            }
        }
    </script>

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
