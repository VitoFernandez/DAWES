<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Respuesta;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener todas las preguntas
        $preguntas = Pregunta::all()->shuffle();
    
        // Inicializar un arreglo para almacenar las respuestas por pregunta
        $respuestasPorPregunta = [];
    
        // Obtener respuestas para cada pregunta
        foreach ($preguntas as $pregunta) {
            $respuestas = Respuesta::where('pregunta_id', $pregunta->id)->get();
            $respuestasPorPregunta[$pregunta->id] = $respuestas;
        }
    
        // Pasa las preguntas y respuestas a la vista
        return view('frontend.create', [
            'preguntas' => $preguntas,
            'respuestasPorPregunta' => $respuestasPorPregunta,
        ]);
    }
    
    public function mostrarPregunta($idPregunta = 1)
    {
        $pregunta = Pregunta::find($idPregunta);
    
        if (!$pregunta) {
            // Si no hay más preguntas, muestra el recuento
            $respuestasCorrectas = session('respuestasCorrectas', 0);
            $respuestasIncorrectas = session('respuestasIncorrectas', 0);
    
            return view('frontend.recuento', compact('respuestasCorrectas', 'respuestasIncorrectas'));
        }
    
        $respuestas = Respuesta::where('pregunta_id', $pregunta->id)->get();
    
        return view('frontend.create', compact('pregunta', 'respuestas'));
    }
    
    public function procesarRespuesta(Request $request)
    {
        // Aquí manejas la lógica para verificar la respuesta del usuario
    
        // Actualizar las respuestas correctas e incorrectas en la sesión
        $respuestasCorrectas = session('respuestasCorrectas', 0);
        $respuestasIncorrectas = session('respuestasIncorrectas', 0);
    
        if ($request->input('respuestaCorrecta')) {
            $respuestasCorrectas++;
        } else {
            $respuestasIncorrectas++;
        }
    
        session(['respuestasCorrectas' => $respuestasCorrectas, 'respuestasIncorrectas' => $respuestasIncorrectas]);
    
        // Después de procesar la respuesta, redirige a la siguiente pregunta
        return redirect()->route('frontend.mostrarPregunta', ['idPregunta' => $request->input('siguientePregunta')]);
    }

    
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
