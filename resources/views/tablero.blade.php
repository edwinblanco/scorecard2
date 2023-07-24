
<!-- resources/views/pagina_principal.blade.php -->


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <!-- Aquí se cargará la primera vista usando JavaScript -->
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <!-- Aquí se cargará la segunda vista usando JavaScript -->
        </div>
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            <!-- Aquí se cargará la segunda vista usando JavaScript -->
        </div>
        <!-- Agrega más pestañas para otras vistas que desees mostrar -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Lista de rutas de las vistas
        const vistas = [
            "{{ route('productividad') }}",
            "{{ route('tren-tablero') }}",
            "{{ route('calendar.index_tablero') }}",
            // Agrega más rutas para otras vistas que desees mostrar
        ];

        // Índice de la vista actual
        let index = 0;

        // Función para cargar la próxima vista
        function cargarSiguienteVista() {
            if (index >= vistas.length) {
                index = 0; // Reinicia el índice al final de la lista
            }

            const url = vistas[index];
            const vistaDinamica = $('#myTabContent');

            // Carga la nueva vista en la pestaña correspondiente
            vistaDinamica.load(url, function() {
                // Ajusta el tiempo para cambiar a la siguiente vista (en milisegundos)
                const tiempoVisualizacion = 5000; // 5 segundos
                setTimeout(cargarSiguienteVista, tiempoVisualizacion);
            });

            index++;
        }

        // Inicia el ciclo de visualización de vistas
        $(document).ready(function() {
            cargarSiguienteVista();
        });
    </script>
