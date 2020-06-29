@if ($paginator->hasPages())
    <nav>
        <ul class="paginator">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginator__item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="paginator__link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="paginator__item">
                    <a class="paginator__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginator__item disabled" aria-disabled="true"><span class="paginator__link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginator__item active " aria-current="page"><span class="paginator__link paginator__link--active">{{ $page }}</span></li>
                        @else
                            <li class="paginator__item"><a class="paginator__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginator__item">
                    <a class="paginator__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="paginator__item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="paginator__link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
