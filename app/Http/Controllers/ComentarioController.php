<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;


class ComentarioController extends Controller
{
    use ValidatesRequests;

    public function store(Request $request, User $user, Post $post) {
    //validar

        $this->validate(request(), [
            'comentario' => 'required| max:255'
        ]);

        //almacenar el resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post -> id,
            'comentario' => request('comentario'),
        
        ]);
      
        // Imprimir mensaje
        return back()->with('mensaje', 'Comentario realizado con éxito');

    }
}
