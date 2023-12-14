@extends('backend.main')

@section('title', 'Detalles de Pregunta')

@section('content')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Enunciado</th>
                <th>Opciones</th>
                <th>Correcta</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pregunta->id }}</td>
                <td>{{ $pregunta->enunciado }}</td>
                <td>
                    <ul>
                        @foreach($respuestas as $respuesta)
                            <li>{{ $respuesta->opcion }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($respuestas as $respuesta)
                            <li>{{ $respuesta->correcta ? 'Correcta' : 'Incorrecta' }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ url('backend/') }}">Volver</a>
    <a class="btn btn-primary" href="{{ url('backend/' . $pregunta->id . '/edit') }}">Editar</a>
</div>
@endsection