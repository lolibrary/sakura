@extends('layouts.app', ['title' => 'Search'])

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="container">
  <form method="GET">
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
          @endif

      </div>
    </div>
    </form>
  </div>
@endsection
