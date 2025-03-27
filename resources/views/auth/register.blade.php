@extends('layouts.app')

@section('titulo')
    Registro en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md: gap-10 md:items-center">
        <div class="md:w-6/12  p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de Usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input id="name" name="name" type="text" name="name" placeholder="Tu nombre"
                        class="border border-gray-400 p-2 w-full rounded-lg"
                        @error('name') style="border-color: red" @enderror value="{{ old('name') }}">
                        
                        @error('name')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" name="Nombre de usuario"
                        placeholder="Tu nombre de usuario" class="border border-gray-400 p-2 w-full rounded-lg"
                        @error('username') style="border-color: red" @enderror
                        value="{{ old('username')}}">
                </div>
                @error('username')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @enderror

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="text" name="Nombre de usuario"
                        placeholder="Tu email de registro" class="border border-gray-400 p-2 w-full rounded-lg"
                        @error('email') style="border-color: red" @enderror value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" name="password de Registro"
                        placeholder="password registro" class="border border-gray-400 p-2 w-full rounded-lg"
                        @error('password') style="border-color: red" @enderror value="{{ old('password') }}">
                </div>

                @error('password')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        name="password de Registro" placeholder="Repite tu password"
                        class="border border-gray-400 p-2 w-full rounded-lg"
                        @error('password_confirmation') style="border-color: red" @enderror>
                </div>

                @error('password_confirmation')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @enderror

                <input type="submit" value="Crear Cuenta"
                    class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold p-3 rounded-lg">
            </form>
        </div>
    </div>
@endsection
