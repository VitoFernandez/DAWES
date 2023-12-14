<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sesionController extends Controller
{
    //
    
    public function singin() {
        return view('singin.index');
    }
    
    public function login(Request $request){
        
        session(['nombre'=> $request->nombre]);
        
        if($request->nombre=='root'){
            return redirect('backend');
        } else if ($request->nombre!=null || $request->nombre!=''){
            return redirect('frontend');
        } else {
            return redirect('/');
        }
        
    }
    public function logout(){
        session()->forget('nombre');
        return redirect('/');
    }
}
