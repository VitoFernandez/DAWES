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
                <input type="text" class="form-control respuesta" id="respuesta{{ $i }}" name="respuestas[]" required>
                <br>
            @endfor
        </div>
        <br>
        <div class="mb-3">
            <label for="correcta" class="form-label">Respuesta Correcta:</label>
            <select class="form-select" id="correcta" name="correcta" disabled required>
                @for ($i = 0; $i < 4; $i++)
                    <option value="{{ $i }}">{{ $i + 1 }}</option>
                @endfor
            </select>
        </div>
        <a class="btn btn-primary" href="{{ url ('home') }}">Volver</a>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const respuestasInputs = document.querySelectorAll('.respuesta');
            const selectCorrecta = document.getElementById('correcta');

            respuestasInputs.forEach(function (input, index) {
                input.addEventListener('input', function () {
                    selectCorrecta.innerHTML = '';

                    respuestasInputs.forEach(function (respuestaInput, i) {
                        const respuesta = respuestaInput.value.trim();
                        if (respuesta !== '') {
                            const option = document.createElement('option');
                            option.value = i;
                            option.textContent = respuesta;
                            selectCorrecta.appendChild(option);
                        }
                    });

                    
                    selectCorrecta.removeAttribute('disabled');
                });
            });
        });
    </script>
@endsection
