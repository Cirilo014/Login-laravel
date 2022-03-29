<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }

    public function registerUser(Request $request){

        //Validation
            $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required'
        ]);

        //Insert
        $user = new Usuario();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $result = $user->save();

        if($result){
            return back()->with('success', 'You have registered Successfuly');
        }else{
            return back()->with('fail', 'Something Wrong');
        }

    }

    public function loginUser(Request $request){

        //Validation
            $request->validate([
            //'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Preencha o e-mail',
            'password.required' => 'Preencha a senha'
        ]
    );

        

        $user = Usuario::where('email', '=', $request->email)->first();
        if($user->perfil === 'Administrador'){
            return redirect('admin');          

        } else if($user->perfil === 'Client'){
            return redirect('client');

        }else if($user->perfil === 'Officer'){
            return redirect('officer');

        }        

        if($user){  
            
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('admin');
                
            
            }else{

                return back()->with('fail', 'A senha está incorreta!');

            }

        }else{
            
            return back()->with('fail', 'Este e-mail não está cadastrado!');
        }   
        
        

    
}

    //Dashoard
        public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
        $data = Usuario::where('id', '=', Session::get('loginId'))->first();

        }
        return view("dashboard", compact('data'));
    }

    public function logout(){

        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }

        //Chamar o admin

        
    }

    public function admin(){
        return view('views-testes.admin');
    }

    public function client(){
        return view('views-testes.client');
    }

    public function officer(){
        return view('views-testes.officer');
    }
}

