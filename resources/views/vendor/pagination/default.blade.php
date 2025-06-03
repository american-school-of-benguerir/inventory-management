@if ($paginator->hasPages())
    <nav class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
        <ul class="inline-flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 [#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F]  rounded cursor-not-allowed">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 [#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F]  transition" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="px-3 py-1 bg-[#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F] rounded">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 bg-[#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-1 bg-[#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F] transition">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 bg-[#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F] transition" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="px-3 py-1 [#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F]  rounded cursor-not-allowed">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
