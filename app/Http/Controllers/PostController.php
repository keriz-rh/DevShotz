<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;



class PostController extends Controller
{

    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index (User $user) 
    {
    
        $posts = Post::where('user_id', $user->id)->latest()->paginate(8);


        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create ()
    {
        return view('posts.create');
    }

    public function store(Request $request) {

        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required|string'
        ]);
        
        /*Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]); */

        //Otra forma de hacerlo
/*
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save();
*/

        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen
        ]);

         return redirect()->route('post.index', \Illuminate\Support\Facades\Auth::user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }


    public function destroy(Post $post)
    {
       $this->authorize('delete', $post);
         $post->delete();

         //eliminar imagen
         $imagen_path = public_path('uploads/' . $post->imagen); // Asegura una ruta válida

         if (File::exists($imagen_path)) {
             File::delete($imagen_path);
         }

         return redirect()->route('post.index', auth()->user()->username);
    }

}

