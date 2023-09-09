@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="text-center m-4">
                <img src="{{ cdn_link('categories/other.svg') }}" alt="" style="max-height: 150px; max-width: 150px" class="img-thumbnail circle">
            </div>
            <div class="text-center m-4">
                {{ $user->username }}
            </div>

            <div class="list-group">
                    @if ($isOwner)
                        <a href="{{ route('profile') }}" class="list-group-item list-group-item-action @if (Route::is('profile')) active @endif">
                            <i class="fal fa-fw fa-user"></i>
                            {{ __('ui.profile') }}
                        </a>
                    @endif
                    @if ($isOwner || $user->public_wishlist)
                    <a href="{{ route('public_wishlist', ['username' => $user->username]) }}" class="list-group-item list-group-item-action @if (Route::is('public_wishlist')) active @endif">
                        <i class="fal fa-fw fa-star"></i>
                        {{ __('ui.wishlist.title') }}
                    </a>
                    @endif
                    @if ($isOwner || $user->public_closet)
                    <a href="{{ route('public_closet', ['username' => $user->username]) }}" class="list-group-item list-group-item-action @if (Route::is('public_closet')) active @endif">
                        <i class="fal fa-fw fa-tags"></i>
                        {{ __('ui.closet.title') }}
                    </a>
                    @endif
            </div>
        </div>
        <div class="col-md-8">
            @yield('profile', '')
        </div>
    </div>
</div>
@endsection
