@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Botón "Anterior" --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Anterior</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
               class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                Anterior
            </a>
        @endif

        {{-- Números de Página --}}
        <div class="flex space-x-2">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-gray-400">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 text-white bg-blue-600 rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" 
                               class="px-4 py-2 text-blue-600 bg-white border border-blue-600 rounded hover:bg-blue-100">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Botón "Siguiente" --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
               class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                Siguiente
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Siguiente</span>
        @endif
    </nav>
@endif
