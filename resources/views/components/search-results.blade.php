<div class="row" id="search-results-grid">
    @forelse ($items as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-2">
            @include('items.card', ['item' => $item, 'type' => 'small'])
        </div>
    @empty
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mx-auto p-2">
            <div style="height: 14rem">
                <img src="/categories/other.svg" class="mw-100 mh-100">
            </div>
            <p class="h4 text-center text-muted my-0">No Results!</p>
            <p class="text-center">Try another search?</p>
        </div>
    @endforelse
</div>

@if ($items->count() > 0)
    {{ $items->links() }}
    <input type="hidden" id="search-page" value="{{ $items->meta->current_page }}">
@endif
