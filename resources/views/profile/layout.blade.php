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
                    @if ($user->is(auth()->user()))
                        <a href="{{ route('profile') }}" class="list-group-item list-group-item-action @if (Route::is('profile')) active @endif">
                            <i class="fal fa-fw fa-user"></i>
                            {{ __('ui.profile') }}
                        </a>
                    @endif
                    @can('wishlist', $user)
                    <a href="{{ route('wishlist.public', $user) }}" class="list-group-item list-group-item-action @if (Route::is('wishlist.public')) active @endif">
                        <i class="fal fa-fw fa-star"></i>
                        {{ __('ui.wishlist.title') }}
                    </a>
                    @endcan
                    @can('closet', $user)
                    <a href="{{ route('closet.public', $user) }}" class="list-group-item list-group-item-action @if (Route::is('closet.public')) active @endif">
                        <i class="fal fa-fw fa-tags"></i>
                        {{ __('ui.closet.title') }}
                    </a>
                    @endcan
            </div>
        </div>
        <div class="col-md-8">
            @yield('profile', '')
        </div>
    </div>
</div>
@endsection
