<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use App\Models\User;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request) {
        $request->validate([
            // 'username' => 'required|unique:users|min:3|max:20'
            'username' => [
                'required', 
                // "unique:users,username,{auth()->user()->username}", 
                Rule::unique('users', 'username')->ignore(auth()->user()),
                'min:3', 
                'max:20', 
                'not_in:twitter,edita-perfil'
                ]
        ]);

        if($request->hasFile('imagen')){

            $manager = new ImageManager(new Driver());
 
            $imagen = $request->file('imagen');
     
            //generar un id unico para las imagenes
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
     
            //guardar la imagen al servidor
            $imagenServidor = $manager->read($imagen);
            //agregamos efecto a la imagen con intervention
            $imagenServidor->cover(1000, 1000);
            // la unidad de mide en PX 1= 1pixiel
     
            //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes
            $imagenesPath = public_path('perfiles') . '/' . $nombreImagen;
            //Una vez procesada la imagen entonces guardamos la imagen en la carpeta que creamos
            $imagenServidor->save($imagenesPath);
     
        }

        // Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        //redireccionar
        return redirect()->route('post.index', $usuario->username);


    }

}
