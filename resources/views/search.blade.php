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
        {!! $filters !!}
      </div>

      <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="row mb-3">
          <div class="col px-2">
            @include('components.search-bar')
          </div>
        </div>
        <span id="search-results">
          {!! $items !!}
        </span>
        <div class="row text-center p-5" id="search-results-loading" style="display: none">
          <div class="col text-center text-muted">
            <i class="far fa-5x fa-spinner fa-pulse"></i>
          </div>
        </div>
        <div class="row text-center p-5" id="search-results-error" style="display: none">
          <div class="col text-center">
          <img style="max-height: 300px; max-width: 100%" src="{{ cdn_link('assets/banners/banner01.png') }}" alt="">
          <p>{{__('ui.search.error')}}</p>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
@endsection
