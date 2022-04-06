<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario2;
use Hash;
use Session;

class Usuario2Controller extends Controller
{
    
    public function show(){
        return view('auth-2.registration2');
    }


    public function store(Request $request){

        //Validation
            $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required'
        ]);

        //Insert
        $user = new Usuario2();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->perfil = $request->perfil;
        $user->password = Hash::make($request->password);
        
        $result = $user->save();

        if($result){
            return back()->with('success', 'You have registered Successfuly');
        }else{
            return back()->with('fail', 'Something Wrong');
        }

    }


    public function director(){
        return view('usuario2.director');
    }

    public function recepcionista(){
        return view('usuario2.recepcionista');
    }

    public function seguranca(){
        return view('usuario2.seguranca');
    }
    
}
