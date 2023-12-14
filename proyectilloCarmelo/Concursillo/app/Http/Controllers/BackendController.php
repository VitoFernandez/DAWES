<?php

namespace App\Http\Controllers;
use App\Models\Pregunta;
use App\Models\Respuesta;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home.index');
       /*
        $preguntas = Pregunta::all();
    
        
        $respuestasPorPregunta = [];
    
        foreach ($preguntas as $pregunta) {
            $respuestas = Respuesta::where('pregunta_id', $pregunta->id)->get();
            $respuestasPorPregunta[$pregunta->id] = $respuestas;
        }
    
        
        return view('backend.index', ['preguntas' => $preguntas, 'respuestasPorPregunta' => $respuestasPorPregunta]);
        */
    }
    
    public function viewContent() {
        
        $preguntas = Pregunta::all();
    
        
        $respuestasPorPregunta = [];
    
        foreach ($preguntas as $pregunta) {
            $respuestas = Respuesta::where('pregunta_id', $pregunta->id)->get();
            $respuestasPorPregunta[$pregunta->id] = $respuestas;
        }
    
        
        return view('backend.index', ['preguntas' => $preguntas, 'respuestasPorPregunta' => $respuestasPorPregunta]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('backend.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1º intentar guardar el objeto
        try{
            
            $pregunta = Pregunta::create([
            'enunciado' => $request->enunciado,
             ]);
        
        foreach ($request->respuestas as $key => $respuesta) {
            Respuesta::create([
                'pregunta_id' => $pregunta->id,
                'opcion' => $respuesta,
                'correcta' => $key == $request->correcta,
            ]);
        }
             //3º si se guarda volver algun sitio : index , create

             return back()->with(['message'=> 'La pregunta ha sido guardada correctamente']);//no hace falta poner url('game/create') ya que lo hace redirect
        
        }catch(\Exception $e){
             //4º Si no lo he guardado volver para tras con los datoas rellenos
            return back() -> withInput()->withErrors(['message'=> 'La pregunta no se ha guardado']);//volvemos para atras con los datos que me llegan 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $pregunta = Pregunta::findOrFail($id);
    
        
        $respuestas = Respuesta::where('pregunta_id', $id)->get();
    
        
        return view('backend.show', ['pregunta' => $pregunta, 'respuestas' => $respuestas]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $pregunta = Pregunta::findOrFail($id);
    
        
        $respuestas = Respuesta::where('pregunta_id', $id)->get();
    
        
        return view('backend.edit', ['pregunta' => $pregunta, 'respuestas' => $respuestas]);
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
        // Validaciones y demás lógica...
    
        // Actualizar la pregunta
        $pregunta = Pregunta::find($id);
        $pregunta->update([
            'enunciado' => $request->enunciado,
        ]);
    
        // Actualizar o crear respuestas existentes
        if (!empty($request->respuestas) && is_array($request->respuestas)) {
            foreach ($request->respuestas as $index => $respuestaData) {
                Respuesta::updateOrCreate(
                    ['id' => $respuestaData['id']],
                    [
                        'pregunta_id' => $pregunta->id,
                        'opcion' => $respuestaData['opcion'],
                        'correcta' => $index == $request->correcta,
                    ]
                );
            }
        }
    
        // Crear nuevas respuestas
        if (!empty($request->nuevas_respuestas) && is_array($request->nuevas_respuestas)) {
            foreach ($request->nuevas_respuestas as $nuevaRespuestaData) {
                Respuesta::create([
                    'pregunta_id' => $pregunta->id,
                    'opcion' => $nuevaRespuestaData['opcion'],
                    'correcta' => false, // Puedes ajustar esto según tus necesidades
                ]);
            }
        }
    
        // Resto del código...
    
        return redirect()->route('backend.show', $pregunta->id)->with('message', 'Pregunta actualizada correctamente');
    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        
         try {
            
            $pregunta = Pregunta::findOrFail($id);
            $respuestas = Respuesta::where('pregunta_id', $id)->get();
             
            $respuestas->delete();
            return redirect('backend/view')->with(['message' => 'La pregunta se ha borrado correctamente.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'Ha ocurrido un error.']);
        }
    }
    function view(Request $request, $id) {
        $pregunta  = Pregunta::find($id);
        if ($pregunta == null) {
            return abort(404);
        }
    }
}
