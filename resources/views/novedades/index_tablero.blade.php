@extends('layouts.base')

@section('content')

    <style>
        .carousel-item img {
            object-fit: contain; /* La imagen se ajustará dentro del contenedor manteniendo su relación de aspecto */
            height: 100vh; /* Establece la altura de la imagen para que ocupe todo el alto de la pantalla */
            width: 100%; /* Asegura que la imagen ocupe todo el ancho disponible */
            display: block; /* Elimina espacios adicionales alrededor de la imagen */
            margin: 0 auto; /* Centra la imagen horizontalmente */
        }
    </style>
    <div class="container">

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach ($novedades as $key => $obj)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="10000">

                        @if (!$obj->imagen_url)
                        <h6 class="text-center m-2" style="font-size: 30px;">{{$obj->novedad}}</h6>
                        @else
                            <h6 class="text-center m-2">{{$obj->novedad}}</h6>
                        @endif
                        @if ($obj->imagen_url)
                            <img class="img-fluid" src="{{ asset($obj->imagen_url) }}" alt="Imagen de la novedad" style="height: 400px">
                        @endif
                    </div>
                @endforeach

            </div>
          </div>

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
        const intervaloTiempo = 120000; // 5000 milisegundos = 5 segundos

        // Iniciar el intervalo para cambiar la ruta automáticamente
        setInterval(recargarConNuevaRuta, intervaloTiempo);

    </script>

@endsection
