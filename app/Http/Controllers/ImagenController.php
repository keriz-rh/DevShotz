<?php
 
namespace App\Http\Controllers;
 
 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
 
 
 
class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
 
        $imagen = $request->file('file');
 
        //generar un id unico para las imagenes
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
 
        //guardar la imagen al servidor
        $imagenServidor = $manager->read($imagen);
        //agregamos efecto a la imagen con intervention
        $imagenServidor->cover(1000, 1000);
        // la unidad de mide en PX 1= 1pixiel
 
        //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes
        $imagenesPath = public_path('uploads') . '/' . $nombreImagen;
        //Una vez procesada la imagen entonces guardamos la imagen en la carpeta que creamos
        $imagenServidor->save($imagenesPath);
 
        //retornamos el nombre de la imagen, que es el nombre que nos da el ID unico con uuid()
        return response()->json(['imagen' => $nombreImagen]);
    }
}