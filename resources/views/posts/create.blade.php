@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection


@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush



@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded 
                 flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>


        <div class="md:w-4/12 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input id="titulo" name="titulo" type="text" name="titulo"
                        placeholder="Titulo de la publicación" class="border border-gray-400 p-2 w-full rounded-lg"
                        @error('titulo') style="border-color: red" @enderror value="{{ old('titulo') }}">
                </div>

                @error('titulo')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @enderror

                <div class="mb-5">
                    <label for="descripción" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación"
                    class="border border-gray-400 p-2 w-full rounded-lg"
                    @error('titulo') style="border-color: red" @enderror>{{ old('descripcion') }}</textarea>
                
                </div>

                @error('descripcio')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <input type="submit" value="Crear publicación"
                    class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold p-3 rounded-lg">

            </form>
        </div>

    </div>
@endsection
