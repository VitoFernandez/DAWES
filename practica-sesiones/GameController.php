<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $games = Game::all();
        return view('game.index', ['games' => $games]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() { // formulario de create
        
        return view('game.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){ //hacer las cosas para crear
        
        //1º generar el objeto para guardar
        
        $object = new Game($request->all());
        
        //2º intentar guardar
        
        try {
            
            $result = $object->save();  
            
        //3º si lo he guardado volver a algún sitio
            
            $target = '';
            
            if(session('afterInsert','showGames') == 'showGames' ){
                $target = 'game';
            }else{
                $target = 'game/create';
            }
            return redirect($target)->with(['message'=> 'The game has been saved.']);
            
        } catch(\Exception $e) {
            
        //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The Game has not been saved.']);
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        return view('game.show', ['game' => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game) // formulario de editar
    {
        
        return view('game.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game) // modificar los datos cuando le das a enviar
    {
        
        //1º generar el objeto para guardar
        
        $target = '';
        $sessionData = session('editGame', 'showAll');
        
        try {
            
            $game->update($request->all());
            //3º si lo he guardado volver a algún sitio
            if($sessionData == 'showEdit'){
                $target = 'game/'.$game->id().'/edit';
            }else if($sessionData == 'showAll'){
                $target = 'game';
            }
            
            return redirect($target)->with(['message'=> 'The game has been updated.']);
            
            
        } catch(\Exception $e) {
            
            //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The Game has not been updated.']);
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
