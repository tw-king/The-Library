@if ($paginator->hasPages())
    <nav>
        <ul class="w3-bar">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="w3-button w3-disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li class="w3-button"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="w3-button"><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="w3-button w3-disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif
