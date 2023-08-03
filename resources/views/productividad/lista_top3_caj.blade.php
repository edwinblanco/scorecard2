@extends('layouts.base')

@section('content')
    <div class="container">
        <h1 class="my-2 text-center">TOP 3 CAJAS</h1>

        <div class="row">

            @foreach ($lista_productividad as $index => $obj)

            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded mx-auto" style="width: 18rem;">
                    @if ($obj->imagen_url && file_exists(public_path($obj->imagen_url)))
                        <img src="{{ asset($obj->imagen_url) }}" class="card-img-top" alt="...">
                    @else
                        <img src="{{ asset('images/sinfoto.jpg') }}" class="card-img-top" alt="Imagen por defecto">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center"><b>{{ $obj->top }}</b> - {{ $obj->auxiliar }}</h5>
                        <p class="card-text"><b>Cajas: </b>{{ $obj->cajas }}</p>
                        <p class="card-text"><b>Unidades: </b>{{ $obj->unidades }}</p>
                    </div>
                </div>
            </div>

            @endforeach

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

    <!-- Script de jQuery para el desplazamiento automático -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            const nuevaRuta = "{{ route('tren-tablero') }}";
            // Cambia la ubicación de la página a la nueva ruta
            window.location.href = nuevaRuta;
        }

        // Intervalo de tiempo en milisegundos para cambiar la ruta (ejemplo: 5 segundos)
        const intervaloTiempo = 30000; // 5000 milisegundos = 5 segundos

        // Iniciar el intervalo para cambiar la ruta automáticamente
        setInterval(recargarConNuevaRuta, intervaloTiempo);

    </script>

    <!--<script>
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
    </script>-->
@endsection
