@extends('layouts.app')

@section('titulo')
    Publicación: {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="flex justify-center mt-10">
        <div class="md:w-1/2 px-10">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}"
                class="w-full h-96 object-cover rounded-lg">
        
                <div class="flex justify-between mt-5">
                    0 likes
                </div>
                
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans()}}</p>
               <p class="mt-5">
                     {{ $post->descripcion }}
               </p>
            </div>

        </div>

        <div class="md:w-1/2> p-5">
            <div>
                <p class="text-xl font-bold"></p>
            </div>
        </div>

    </div>


@endsection
