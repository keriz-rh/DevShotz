@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data"
            class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" type="text" name="username" placeholder="Tu nombre de usuario"
                        class="border border-gray-400 p-2 w-full rounded-lg"
                        @error('name') style="border-color: red" @enderror 
                        value="{{ auth()->user()->username }}">
                        
                        @error('username')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Foto de perfil
                    </label>
                    <input 
                    id="imagen" 
                    name="imagen" 
                    type="file" 
                    name="imagen" 
                    class="border border-gray-400 p-2 w-full rounded-lg"
                    value=""
                    accept=".jpg, .jpeg, .png">
                        
                </div>
                <input type="submit" value="guardar cambios"
                class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold p-3 rounded-lg">

            </form>
        </div>
    </div>

@endsection