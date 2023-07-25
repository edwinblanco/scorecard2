@extends('layouts.base')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded mt-2">
            <thead>
                <tr>
                    <th scope="col" class="auxiliar">Novedad</th>
                </tr>
            </thead>
        </table>
        <div id="contain">
            <table border="0" id="table_scroll" class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded mt-2">
                <tbody>
                    @foreach ($novedades as $obj)
                        <tr>
                            <td scope="row">{{ $obj->novedad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
