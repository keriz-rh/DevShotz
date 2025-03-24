<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use ValidatesRequests;
    
    public function index () 
    {
        return view('auth.register');
    }

    public function store (Request $request){
        // dd($request->all());

        //Modificamos el request
        $request->merge([
            'username' => Str::slug($request->username)
        ]);
        
        // validación

        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6|max:30'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Autenticamos al usuario

       /* Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); */

        //otra forma de autenticar
        Auth::attempt($request->only('email', 'password'));

        // Redireccionamos
        return redirect()->route('post.index');

    }
}
