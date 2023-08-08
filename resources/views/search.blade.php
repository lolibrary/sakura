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
  <form method="GET" id="search-form">
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
        <span id="search-results">
          @include('components.search-results')
        </span>

      </div>
    </div>
    </form>
  </div>
@endsection
