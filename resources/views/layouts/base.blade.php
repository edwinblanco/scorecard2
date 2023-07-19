<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DPJD | ScoreCard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <style>
        .banner-container {
            position: relative;

            /* Permite posicionar elementos internos de forma absoluta */
            text-align: center;
            /* Centra el texto horizontalmente */
        }

        .banner-text {
            position: absolute;
            /* Permite posicionar el texto de forma absoluta dentro del contenedor */
            bottom: 35%;
            /* Distancia desde la parte inferior del contenedor */
            left: 55%;
            /* Centra el texto horizontalmente */
            transform: translateX(-10%);
            /* Centra el texto exactamente en el medio */
            color: white;
            /* Color del texto */
            font-size: 40px;
            /* Tamaño del texto */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Sombra para mejorar la legibilidad del texto en la imagen */
        }

        #contain {
            height: 400px;
            overflow-y: scroll;
        }

        #table_scroll {
            width: 100%;
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>

</head>

<body>

    <div class="container mt-4 mb-2">
        <div class="row">
            <div class="col banner-container">
                <!-- Banner utilizando la clase "img-fluid" para hacer la imagen responsive -->
                <img
                src="@if ($ban = 1)
                {{ asset('banners/Banner Productividad.png') }}
                @elseif ($ban = 2)
                {{ asset('banners/Aseo Baño.png') }}
                @endif"
                alt="Banner" class="img-fluid img-fluid-a">
                <!-- Texto dentro del banner -->
                <!--<h1 class="banner-text">LISTA DE PRODUCTIVIDAD</h1>-->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('content')

</body>

</html>
