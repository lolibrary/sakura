@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('ui.auth.verify') }}</div>

                <div class="card-body text-center py-5 lead">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('ui.auth.verify_resent') }}
                        </div>
                    @endif

                    <p>
                        {{ __('ui.auth.check_email') }}
                    </p>
                    {{ __('ui.auth.not_recieved') }},
                    <form action="{{ route('verification.resend') }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-link" style="padding:0; vertical-align: baseline">
                            {{ __('ui.auth.resend') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
