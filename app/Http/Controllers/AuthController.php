<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(){

        return view('register');
    }

    public function registerAdmin(){

        return view('Admin.registerAdmin');
    }

    public function registerPost(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'Rol_ID' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        $user = new User();

        $user->name = $request->name;

        $user->Rol_ID = $request->Rol_ID;
        
        $user->email = $request->email;
        
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success','Registro exitoso');

    }

    public function registerPostAdmin(Request $request){

        $user = new User();

        $user->name = $request->name;

        $user->Rol_ID = $request->Rol_ID;
        
        $user->email = $request->email;
        
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success','Registro exitoso');

    }

    public function login(){
        return view('login');
    }


    public function loginPost(Request $request){
        $credetials = [
            'email' => $request->email,
            'password' =>$request->password,
        ];
        
        if(Auth::attempt($credetials)){
            return redirect('/UserAdmin')->with('success', 'Inicio de sesión exitoso');
        }

        return back()->withErrors(['error' => 'Correo electrónico o contraseña incorrectos']);
    }

    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}
