@extends('layouts.app')

@section('titulo')
    pagina principal
@endsection

@section('contenido')
    <x-listar-post :posts="$posts" :emptyMessage="'No hay posts, sigue a alguien para poder mostrar sus posts'" />
@endsection 
