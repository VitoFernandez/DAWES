@extends('backend.main')

@section('title', 'Edit Question')

@section('content')

<form action="{{ url('backend/' . $pregunta->id) }}" method="post">
    @method('put')    
    @csrf
    
    <div class="mb-3">
        <label for="enunciado" class="form-label">Pregunta</label>
        <textarea class="form-control" id="enunciado" name="enunciado">{{ old('enunciado', $pregunta->enunciado) }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="respuestas" class="form-label">Respuestas</label>
        @foreach($respuestas as $respuesta)
            <div class="mb-2">
                <input type="text" class="form-control" name="respuestas[{{ $respuesta->id }}][opcion]" value="{{ old('respuestas.' . $respuesta->id . '.opcion', $respuesta->opcion) }}">
                <input type="hidden" name="respuestas[{{ $respuesta->id }}][id]" value="{{ $respuesta->id }}">
            </div>
        @endforeach

        <!-- Nuevas respuestas (si es necesario) -->
        @for ($i = count($respuestas); $i < 4; $i++)
            <div class="mb-2">
                <input type="text" class="form-control" name="nuevas_respuestas[{{ $i }}][opcion]" value="{{ old('nuevas_respuestas.' . $i . '.opcion') }}">
            </div>
        @endfor
    </div>
    
    <div class="mb-3">
        <label for="correcta" class="form-label">Respuesta Correcta</label>
        <select class="form-select" id="correcta" name="correcta">
            @foreach($respuestas as $respuesta)
                <option value="{{ $respuesta->id }}" {{ $respuesta->correcta ? 'selected' : '' }}>
                    {{ $respuesta->opcion }}
                </option>
            @endforeach
        </select>
    </div>
    
    <a class="btn btn-primary" href="{{ url('backend/') }}">Volver</a>
    <input type="submit" class="btn btn-success" value="Editar">
</form>

@endsection
