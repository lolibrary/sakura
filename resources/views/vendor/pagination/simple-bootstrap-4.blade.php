<div class="text-center">
    <div class="d-inline-block">
@if ($paginator->hasPages())
    <ul class="pagination justify-content-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">
                    <x-heroicon-o-chevron-left style="width: 1.2rem; height: 1.2rem; padding-bottom: 0.2rem;" /> @lang('pagination.previous')
                </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <x-heroicon-o-chevron-left style="width: 1.2rem; height: 1.2rem; padding-bottom: 0.2rem;" /> @lang('pagination.previous')
                </a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    @lang('pagination.next') <x-heroicon-o-chevron-right style="width: 1.8rem; height: 1.8rem; padding-bottom: 0.2rem;" />
                </a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">
                    @lang('pagination.next') <x-heroicon-o-chevron-left style="width: 1.8rem; height: 1.8rem; padding-bottom: 0.2rem;" />
                </span>
            </li>
        @endif
    </ul>
@endif
    </div>
</div>
