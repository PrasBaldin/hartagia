@if ($paginator->hasPages())
    <nav class="flex justify-center mt-10">
        <ul class="inline-flex items-center space-x-1 text-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 text-gray-400 bg-gray-100 rounded">«</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 bg-white border rounded hover:bg-gray-100">«</a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="px-3 py-2 font-bold text-white bg-green-500 rounded">{{ $page }}</li>
                @else
                    <li>
                        <a href="{{ $url }}" class="px-3 py-2 bg-white border rounded hover:bg-gray-100">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 bg-white border rounded hover:bg-gray-100">»</a>
                </li>
            @else
                <li class="px-3 py-2 text-gray-400 bg-gray-100 rounded">»</li>
            @endif
        </ul>
    </nav>
@endif
