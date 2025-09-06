@if (!$items->isEmpty() && $items->lastPage() > 1)
    <div class="flex items-center justify-center gap-2 sm:gap-4 lg:justify-start mt-7 sm:mt-10">

        @if ($items->currentPage() !== 1)
            <a class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray btn-contur dark:border-gray/50 text-black/60 dark:text-white/80"
                 draggable="false" href="{{ $items->url($items->currentPage() - 1) }}"><svg
                    class="icon text-lg sm:text-xl">
                    <use xlink:href="/images/icons.svg#arrow-left"></use>
                </svg></a>
        @endif

        @if ($items->currentPage() !== 1)
            <a class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray btn-contur dark:border-gray/50 text-black/60 dark:text-white/80"
                 draggable="false" href="{{ $items->url(1) }}">1</a>
        @endif

        @if ($items->currentPage() - 3 > 1)
            <div class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray text-black/60 dark:text-white/80 items-end"
                 draggable="false">...</div>
        @endif

        @for ($index = max($items->currentPage() - 2, 2); $index < $items->currentPage(); $index++)
            <a class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray btn-contur dark:border-gray/50 text-black/60 dark:text-white/80"
                 draggable="false" href="{{ $items->url($index) }}">{{ $index }}</a>
        @endfor

        <div class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-primary btn-fill pointer-events-none"
             draggable="false">{{ $items->currentPage()}}</div>

        @for ($index = $items->currentPage() + 1; $index < min($items->lastPage(), $items->currentPage() + 3); $index++)
            <a class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray btn-contur dark:border-gray/50 text-black/60 dark:text-white/80"
                 draggable="false" href="{{ $items->url($index) }}">{{ $index }}</a>
        @endfor

        @if ($items->currentPage() + 3 < $items->lastPage())
            <div class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray text-black/60 dark:text-white/80 items-end"
                 draggable="false">...</div>
        @endif

        @if ($items->currentPage() !== $items->lastPage())
            <a class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray btn-contur dark:border-gray/50 text-black/60 dark:text-white/80"
                 draggable="false" href="{{ $items->url($items->lastPage()) }}">{{ $items->lastPage() }}</a>
        @endif

        @if ($items->currentPage() !== $items->lastPage())
            <a class="btn size-7 sm:size-10 rounded-md sm:rounded-lg text-sm sm:text-base shrink-0 btn-gray btn-contur dark:border-gray/50 text-black/60 dark:text-white/80"
                 draggable="false" href="{{ $items->nextPageUrl() }}"><svg class="icon text-lg sm:text-xl">
                    <use xlink:href="/images/icons.svg#arrow-right"></use>
                </svg></a>
        @endif
    </div>
@endif