@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center text-center" style="height: 100%">
    <div>
        <h1>{{ __('ui.auth.verify_needed')}}</h1>

        <p class="lead">{{ __('ui.auth.verify_txt1')}}</p>

        <p>{{ __('ui.auth.verify_txt2')}}</p>

        <form action="{{ route('auth.resend') }}" method="post">
            @csrf

            <button type="submit" class="btn btn-outline-primary">{{ __('ui.auth.verify_resend')}}</button>
        </form>
    </div>
</div>
@endsection
