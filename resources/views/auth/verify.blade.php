@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email, click the following to resend:') }}
                    <form action="{{ route('verification.resend') }}" method="POST">
                        @csrf
                        <div class="form-group row my-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block btn-outline-primary">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
