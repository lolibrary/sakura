@extends('layouts.app', ['title' => 'Search'])

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-3 mb-2 mb-3">
        @include('components.filters')
      </div>

      <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="row mb-3">
          <div class="col px-2">
            @include('components.search-bar')
          </div>
        </div>

          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-2" id="results">
              @forelse ($items as $item)
                @include('items.card', compact('item'))
              @empty
                <div style="height: 14rem">
                  <img src="/categories/other.svg" class="mw-100 mh-100">
                </div>
                <p class="h4 text-center text-muted my-0">No Results!</p>
                <p class="text-center">Try another search?</p>
              @endforelse
            </div>
          </div>

          @if ($items->count() > 0)
          <div v-if="results && results.last_page > 1" class="row">
            <div class="col mb-2 mt-4" id="pagination">
            {{ $items->links() }}
            </div>
          </div>
          @endif

      </div>

    </div>
  </div>
@endsection
