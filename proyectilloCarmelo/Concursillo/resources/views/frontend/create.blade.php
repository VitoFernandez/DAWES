@extends('frontend.main')

@section('frontend')
<div class="container-fluid">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="quiz" data-toggle="buttons">
                    @foreach ($preguntas as $pregunta)
                        <div class="pregunta" data-pregunta-id="{{ $pregunta->id }}">
                            <div class="modal-header">
                                <h3><span class="label label-warning" id="qid">{{ $pregunta->id }}</span>{{ $pregunta->enunciado }}</h3>
                            </div>

                            @if($respuestasPorPregunta[$pregunta->id]->isNotEmpty())
                                @foreach ($respuestasPorPregunta[$pregunta->id] as $respuesta)
                                    <label class="element-animation1 btn btn-lg btn-primary btn-block">
                                        <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                        <input type="radio" name="q_answer_{{ $pregunta->id }}" class="q_answer" data-pregunta-id="{{ $pregunta->id }}" value="{{ $respuesta->id }}">
                                        {{ $respuesta->opcion }}
                                    </label>
                                @endforeach
                            @else
                                <p>No hay respuestas disponibles para esta pregunta.</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="modal-footer text-muted">
                
            </div>
        </div>
    </div>
</div>

