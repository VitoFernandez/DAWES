<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    
    public function index() {

        /*Radio Buttons*/
        
        $checked = session('afterInsert', 'showGames');
        $checkedList = 'checked';
        $checkedCreate = '';
        
        if($checked != 'showGames'){
            $checkedList = '';
            $checkedCreate = 'checked';
        }
        
        /*SelectsBox*/
        $options = [
                ['value' => 'showAll', 'message' => 'Show all game list'],
                ['value' => 'showEdit', 'message' => 'Show edit game form']
            ];
            
        $selected = session('editGame', 'showAll');

        return view('settings.index',['checkedList' => $checkedList,'checkedCreate' => $checkedCreate, 'options' => $options]);
    }
    
    public function updated(Request $request) {
        
        session(['afterInsert' => $request -> afterInsert]);
        session(['editGame' => $request -> editGame]);
        return back();
    }
}
