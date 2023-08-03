@extends('profile.layout', ['title' => 'Profile'])

@section('profile')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        @lang(session('status'))
    </div>
@endif

<form id="nav-profile" method="POST" action="{{ route('profile') }}">
    @csrf
    <div class="form-group">
        <label for="profile-name">{{ __('ui.auth.name') }}</label>
        <input type="text" class="form-control" id="profile-name" placeholder="Enter a name" value="{{ old('name') ?? $user->name }}" name="name">
    </div>
    <div class="form-group">
        <label for="profile-username">{{ __('ui.auth.username') }}</label>
        <input type="text" id="profile-username" class="form-control" value="{{ $user->username }}" name="username">
    </div>
    <div class="form-group">
        <label for="profile-email">{{ __('ui.auth.email') }}</label>
        <input type="email" class="form-control" id="profile-email" aria-describedby="emailHelp" placeholder="Enter an email" value="{{ old('email') ?? $user->email }}" name="email">
        <small id="emailHelp" class="form-text text-muted">{{ __('ui.auth.email_txt') }}</small>
    </div>

    <div class="form-group">
        <label for="profile-password">{{ __('ui.auth.pw') }}</label>
        <input type="password" class="form-control" id="profile-password" placeholder="{{ __('ui.auth.pw') }}" name="password">
    </div>
    <div class="form-group">
        <label for="profile-password-confirm">{{ __('ui.auth.pw_confirm') }}</label>
        <input type="password" class="form-control" id="profile-password-confirm" placeholder="{{ __('ui.auth.pw') }}" name="password_confirmation">
        <small class="form-text text-muted">{{ __('ui.auth.pw_no_change') }}</small>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <button type="submit" class="btn btn-block btn-outline-primary my-4">{{ __('Save') }}</button>
        </div>
    </div>
</form>
@endsection
