@extends('layouts.error')

@section('error')
<h2>{{ __('ui.error.503') }}</h2>
<h3 class="text-muted">{{ __('ui.error.503_txt') }}</h3>
@endsection
