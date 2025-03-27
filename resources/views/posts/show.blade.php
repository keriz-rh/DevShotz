@extends('layouts.app')
@section('titulo')
    Publicación: {{ $post->titulo }}
@endsection
@section('contenido')
    <div class="container mx-auto md:flex gap-4">
        <div class="md:w-1/2 px-10">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}"
                class="w-full h-96 object-cover rounded-lg">

            <div class="p-3 flex items-center gap-4">
                @auth

                    <livewire:like-post :post="$post"  />


                @endauth

            </div>

            <div>
                <a href="{{ route('post.index', $post->user) }}" class="font-bold">
                    {{ $post->user->username }}
                </a>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
            @auth
                @if (auth()->user()->id == $post->user_id)
                    <form action=" {{ route('posts.destroy', $post) }} " method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar publicación"
                            class="bg-red-500 uppercase hover:bg-red-700
     text-white font-bold p-3 rounded-lg cursor-pointer mt-5">
                    </form>
                @endif
            @endauth

        </div>
        <div class="md:w-1/2 p-5">

            <div class="shadow-xl bg-white p-5 mb-5 rounded-lg">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
                    @if (session('mensaje'))
                        <div class="bg-green-100 border-l-4 uppercase border-green-500 text-green-700 p-4 mb-5" role="alert">
                            <p>{{ session('mensaje') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Comentario
                            </label>
                            <textarea id="comentario" name="comentario" placeholder="Escribe tu comentario"
                                class="border border-gray-400 p-2 w-full rounded-lg h-20 "@error('comentario') border-red-500 @enderror"></textarea>

                            @error('comentario')
                                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror

                        </div>
                        <input type="submit" value="Comentar"
                            class="bg-blue-500 w-full uppercase hover:bg-blue-700 text-white font-bold p-3 rounded-lg">
                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 mt-10 overflow-y-auto">
                    <h2 class="text-xl text-center font-bold p-2 border-b border-gray-200 bg-gray-100">
                        Comentarios ({{ $post->comentarios->count() }})
                    </h2>
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-b border-gray-200">
                                <a href="{{ route('post.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <a class="text-sm text-gray-500">
                                    {{ $comentario->created_at->diffForHumans() }}
                                </a>
                                <p class="mt-5">
                                    {{ $comentario->comentario }}
                                </p>

                            </div>
                        @endforeach
                    @else
                        <p class="p-5 text-center">No hay comentarios aún</p>
                    @endif

                </div>


            </div>
        </div>
    </div>
@endsection
