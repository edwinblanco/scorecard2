@extends('layouts.base')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded mt-2">
            <thead>
                <tr>
                    <th scope="col" class="auxiliar">Ranking</th>
                    <th scope="col" class="auxiliar">Auxiliar</th>
                    <th scope="col" class="cajas">Cajas</th>
                    <th scope="col" class="unidades">Unidades</th>
                </tr>
            </thead>
        </table>
        <div id="contain">
            <table border="0" id="table_scroll" class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded mt-2">
                <tbody>
                    @foreach ($lista_productividad as $index => $obj)
                        <tr>
                            <td scope="row">{{ $index + 1 }}</td>
                            <td>{{ $obj->auxiliar }}</td>
                            <td>{{ $obj->cajas }}</td>
                            <td>{{ $obj->unidades }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--<script>
        $(document).ready(function() {
            $('#productividad2').DataTable({
                "language": {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },

            });
        });
    </script>-->

    <script>
        window.onload = function () {
            // Obtener las celdas de la segunda tabla
            const cells = document.querySelectorAll('#table_scroll tbody tr:first-child td');

            // Obtener los encabezados de la primera tabla
            const headers = document.querySelectorAll('.table thead th');

            // Asignar el ancho de las celdas de la segunda tabla a los encabezados de la primera tabla
            headers.forEach((header, index) => {
                header.style.width = `${cells[index].clientWidth}px`;
            });
        };
    </script>

    <!-- Script de jQuery para el desplazamiento automático -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            pageScroll();
            $("#contain").mouseover(function() {
                clearTimeout(my_time);
            }).mouseout(function() {
                pageScroll();
            });

            getWidthHeader('table_fixed', 'table_scroll');

        });

        var my_time;

        function pageScroll() {
            var objDiv = document.getElementById("contain");
            objDiv.scrollTop = objDiv.scrollTop + 1;
            if ((objDiv.scrollTop + 400) == objDiv.scrollHeight) {
                objDiv.scrollTop = 0;
            }
            my_time = setTimeout('pageScroll()', 50);
        }

        function getWidthHeader(id_header, id_scroll) {
            var colCount = 0;
            $('#' + id_scroll + ' tr:nth-child(1) td').each(function() {
                if ($(this).attr('colspan')) {
                    colCount += +$(this).attr('colspan');
                } else {
                    colCount++;
                }
            });

            for (var i = 1; i <= colCount; i++) {
                var th_width = $('#' + id_scroll + ' > tbody > tr:first-child > td:nth-child(' + i + ')').width();
                $('#' + id_header + ' > thead th:nth-child(' + i + ')').css('width', th_width + 'px');
            }
        }

        // Función para recargar la página cada 5 minutos (300000milisegundos)
        setInterval(function() {
            location.reload();
        }, 300000); // 300000 milisegundos = 5 minutos

    </script>

    <script>

        // Función para recargar la página con una nueva ruta
        function recargarConNuevaRuta() {
            // Obtén una ruta aleatoria del arreglo
            const nuevaRuta = "{{ route('top3tat') }}";
            // Cambia la ubicación de la página a la nueva ruta
            window.location.href = nuevaRuta;
        }

        // Intervalo de tiempo en milisegundos para cambiar la ruta (ejemplo: 5 segundos)
        const intervaloTiempo = 30000; // 5000 milisegundos = 5 segundos

        // Iniciar el intervalo para cambiar la ruta automáticamente
        setInterval(recargarConNuevaRuta, intervaloTiempo);

    </script>

@endsection
