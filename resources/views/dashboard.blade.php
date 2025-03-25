@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center mt-10">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row items-center ">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuarios">
            </div>
            <div class="md:w8/12 lg:w-6/12 px-5 flex flex-col md:items-start items-center md:justify-center py-10 md:py-10">
                <p class="text-gray-700 text-2xl"> {{ $user->username }}</p>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">
                        Seguidores
                    </span>

                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        0
                        <span class="font-normal">
                            Siguiendo
                        </span>

                        
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">
                        Posts
                    </span>

    
                </p>
            </div>
        </div>



    </div>
@endsection
