@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <img style="max-height: 300px" src="{{ cdn_link('images/banners/banner01-resized.png') }}" alt="">
            <h2>{{ __('ui.auth.verify_success') }}</h2>
            <h3 class="text-muted">{{ __('ui.auth.verify_done') }}</h3>
        </div>
    </div>
</div>
@endsection
