@if (!$items->isEmpty() && $items->lastPage() > 1)
    <div class="pagination">

        @if ($items->currentPage() !== 1)
            <a class="pagination-btn pagination-btn-gray pagination-icon" draggable="false"
                href="{{ $items->url($items->currentPage() - 1) }}">
                < </a>
        @endif

                @if ($items->currentPage() !== 1)
                    <a class="pagination-btn pagination-btn-gray" draggable="false" href="{{ $items->url(1) }}">1</a>
                @endif

                @if ($items->currentPage() - 3 > 1)
                    <div class="pagination-btn pagination-btn-dots" draggable="false">...</div>
                @endif

                @for ($index = max($items->currentPage() - 2, 2); $index < $items->currentPage(); $index++)
                    <a class="pagination-btn pagination-btn-gray" draggable="false"
                        href="{{ $items->url($index) }}">{{ $index }}</a>
                @endfor

                <div class="pagination-btn pagination-btn-primary" draggable="false">{{ $items->currentPage()}}</div>

                @for ($index = $items->currentPage() + 1; $index < min($items->lastPage(), $items->currentPage() + 3); $index++)
                    <a class="pagination-btn pagination-btn-gray" draggable="false"
                        href="{{ $items->url($index) }}">{{ $index }}</a>
                @endfor

                @if ($items->currentPage() + 3 < $items->lastPage())
                    <div class="pagination-btn pagination-btn-dots" draggable="false">...</div>
                @endif

                @if ($items->currentPage() !== $items->lastPage())
                    <a class="pagination-btn pagination-btn-gray" draggable="false"
                        href="{{ $items->url($items->lastPage()) }}">{{ $items->lastPage() }}</a>
                @endif

                @if ($items->currentPage() !== $items->lastPage())
                    <a class="pagination-btn pagination-btn-gray pagination-icon" draggable="false"
                        href="{{ $items->nextPageUrl() }}">
                        >
                    </a>
                @endif
    </div>
@endif