@extends('layouts.base')

@section('content')
    <div class="container">
        <h1 class="text-center m-2">Editar registro</h1>
        <form action="/productividad_adm/{{$produ->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Auxiliar</label>
                <input type="text" class="form-control" id="aux" name="aux" value="{{$produ->auxiliar}}"
                    required>
            </div>
            <div class="mb-3">
                <label for="exampleInputcajas1" class="form-label">Cajas</label>
                <input type="number" class="form-control" id="cajas" name="cajas" value="{{$produ->cajas}}"
                    required>
            </div>
            <div class="mb-3">
                <label for="exampleuni1" class="form-label">Unidades</label>
                <input type="number" class="form-control" id="unidades" value="{{$produ->unidades}}"
                    name="unidades" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>

@endsection
