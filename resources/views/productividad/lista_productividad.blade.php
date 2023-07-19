@extends('layouts.base')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded mt-2">
                <thead>
                    <tr>
                        <th scope="col">Auxiliar</th>
                        <th scope="col">Cajas</th>
                        <th scope="col">Unidades</th>
                    </tr>
                </thead>
            </table>
        <div id="contain">
            <table border="0" id="table_scroll"
                class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded mt-2">
                <tbody>
                    @foreach ($lista_productividad as $obj)
                        <tr>
                            <td scope="row">{{ $obj->auxiliar }}</td>
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
    </script>
@endsection
