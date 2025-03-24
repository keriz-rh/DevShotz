@extends('layouts.app')

@section('titulo')
    Tu cuenta
@endsection

@section('contenido')

<div class="flex justify-center mt-10">
    <div class="w-full p-6 md:flex">
        <div class="w-8/12 md:w8/12 lg:w-6/12 px-5">
            <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuarios">
        </div>
        <div class="w-8/12 md:w8/12 lg:w-6/12 px-5">
            <p class="text-gray-700 text-2xl"> {{auth()->user()->username}}</p>
        </div>
    </div>
    

</div>

@endsection