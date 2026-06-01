@if ($paginator->hasPages())
    <div class="pagination d-flex justify-content-center mt-5">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="javascript:void(0)" class="rounded text-muted" style="cursor: not-allowed;">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="rounded" rel="prev">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="javascript:void(0)" class="rounded text-muted" style="cursor: not-allowed;">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="javascript:void(0)" class="active rounded" aria-current="page">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="rounded">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="rounded" rel="next">&raquo;</a>
        @else
            <a href="javascript:void(0)" class="rounded text-muted" style="cursor: not-allowed;">&raquo;</a>
        @endif
    </div>
@endif
