@if ($paginator->hasPages())
    <nav class="w-full mt-6">
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            {{-- Pagination Controls --}}
            <ul class="inline-flex items-center space-x-1 rounded-lg bg-[#ebe7e4] dark:bg-[#262F3F] px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-md">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="px-3 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 rounded-l-md cursor-not-allowed">
                        <span aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-[#6ca296] dark:text-[#8576ff] bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-l-md hover:bg-[#6ca296] hover:text-white dark:hover:bg-[#8576ff] transition">
                            &lsaquo;
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="px-3 py-2 text-gray-500 bg-gray-100 dark:bg-gray-700">{{ $element }}</li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="px-3 py-2 rounded bg-[#6ca296] dark:bg-[#8576ff] text-white  hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">
                                    {{ $page }}
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="px-3 py-2 text-[#6ca296] dark:text-[#8576ff] bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-[#6ca296] hover:text-white dark:hover:bg-[#8576ff] transition">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-[#6ca296] dark:text-[#8576ff] bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-r-md hover:bg-[#6ca296] hover:text-white dark:hover:bg-[#8576ff] transition">
                            &rsaquo;
                        </a>
                    </li>
                @else
                    <li class="px-3 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 rounded-r-md cursor-not-allowed">
                        <span aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
