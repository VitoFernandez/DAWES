@extends('backend.main')
@section('title')

@section('content')

    <form method="post" action="{{ url('backend') }}">
        @csrf
        <div class="mb-3">
            <label for="pregunta" class="form-label">Pregunta:</label>
            <input type="text" class="form-control" id="pregunta" name="enunciado" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="respuestas" class="form-label">Respuestas:</label>
            @for ($i = 0; $i < 4; $i++)
                <input type="text" class="form-control" id="respuestas" name="respuestas[]" required>
                <br>
            @endfor
        </div>
        <br>
        <div class="mb-3">
            <label for="correcta" class="form-label">Respuesta Correcta:</label>
            <select class="form-select" id="correcta" name="correcta" required>
                @for ($i = 0; $i < 4; $i++)
                    <option value="{{ $i }}">{{ $i + 1 }}</option>
                @endfor
            </select>
        </div>
        <a class="btn btn-primary" href="{{ url ('home') }}">Volver</a>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
@endsection