@extends('layouts.base')

@section('content')
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar nuevo registro
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/productividad_admin/" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Auxiliar</label>
                                <input type="text" class="form-control" id="aux" name="aux" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputcajas1" class="form-label">Cajas</label>
                                <input type="number" class="form-control" id="cajas" name="cajas" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleuni1" class="form-label">Unidades</label>
                                <input type="number" class="form-control" id="unidades" name="unidades" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <table id="productividad" class="table table-striped table-bordered shadow-lg p-2 mb-2 bg-body rounded">
            <thead>
                <tr>
                    <th scope="col">Auxiliar</th>
                    <th scope="col">Cajas</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_productividad as $obj)
                    <tr>
                        <td scope="row">{{ $obj->auxiliar }}</td>
                        <td>{{ $obj->cajas }}</td>
                        <td>{{ $obj->unidades }}</td>
                        <td>
                            <form action="/productividad_adm/{{ $obj->id }}" class="form-del" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/productividad_adm/{{ $obj->id }}" class="btn btn-info">Editar</a>
                                <button type="submit" class="btn btn-danger mb-1">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#productividad').DataTable({
                "language": {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                "lengthMenu": [
                    [5, 10, 100, -1],
                    [5, 10, 100, "Todos"]
                ]
            });
        });
    </script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '!Registro eliminado!',
                '!Registro eliminado con exito!',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-del').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡El registro se eliminará definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        })
    </script>
@endsection
