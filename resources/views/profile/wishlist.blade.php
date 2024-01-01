@extends('profile.layout', ['title' => __('ui.wishlist.owner_title', ['user' => $user->username])])

@section('profile')
@if ($items->count() > 0)
    <div class="row">
        @foreach ($items as $item)
        <div class="col-lg-4 col-md-6 col-sm-6 p-2">
            @component('items.card', ['item' => $item, 'type' => 'small'])
                @if ($isOwner)
                    <form action="{{ route('items.wishlist', $item) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put">

                        <button class="btn btn-outline-danger btn-block rounded-0"
                            style="border: none; border-top: 1px solid rgba(0, 0, 0, 0.125);"
                            type="submit">
                            {{ __('ui.wishlist.remove') }}
                        </button>
                    </form>
                @endif
            @endcomponent
        </div>
        @endforeach
    </div>

    {{ $items->links() }}
@else
    @if ($isOwner)
        <div class="text-center mt-5">
            <p class="h2">{{ __('ui.wishlist.empty') }}</p>
            <p class="lead">@lang('ui.wishlist.add', ['link' => route('search')])</p>
        </div>
        <div class="row pt-5">
            <div class="col-4">
                <div class="card bg-light text-muted">
                    <div class="card-body shadow-sm d-flex justify-content-center align-items-center">
                        <i class="fal fa-plus-circle fa-5x"></i>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-light text-muted">
                    <div class="card-body shadow-sm d-flex justify-content-center align-items-center">
                        <i class="fal fa-plus-circle fa-5x"></i>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-light text-muted">
                    <div class="card-body shadow-sm d-flex justify-content-center align-items-center">
                        <i class="fal fa-plus-circle fa-5x"></i>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center mt-5">
            <p class="h2">{{  __('ui.wishlist.empty_guest', ['user' => $user->username]) }}</p>
        </div>
    @endif
@endif
@endsection
