@extends('layouts.app', ['title' => "{$item->english_name} by {$item->brand->name}"])

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center">
                <h1 class="h3">{{ $item->english_name }}</h3>
                    <h4 class="text-muted">{{ $item->foreign_name }}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm p-2">
                <img src="{{ $item->image ? cdn_link($item->image) : default_asset() }}"
                     onerror="this.src = '{{ default_asset() }}'"
                     data-original-url="{{ $item->image ? cdn_link($item->image) : default_asset() }}"
                     class="rounded mw-100 d-block mx-auto">
                <div class="row p-0 mx-0 my-3">
                    <div class="col p-1 list-group text-center small">
                        @include('components.items.wishlist')
                    </div>
                    <div class="col p-1 list-group text-center small">
                        @include('components.items.closet')
                    </div>
                </div>                
                @if (auth()->user() && auth()->user()->can('update', $item))
                <div class="row p-0 mx-0 my-3">
                    <div class="col p-1 list-group text-center small">
                    <a class="btn btn-outline-primary" href="{{ $item->edit_url }}">
                        <i class="fal fa-fw fa-edit"></i>  {{ __('ui.item.edit') }}
                    </a>
                    </div>
                </div>
                @elseif (auth()->user())
                <div class="row p-0 mx-0 my-3">
                    <div class="col p-1 list-group text-center small">
                    <a class="btn btn-outline-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSeuCoQbM7cXwF2OAkljtlmALwdgUNCAkKGEDeQHomCySMhStQ/viewform?usp=pp_url&entry.1974464960={{ $item->url }}">
                        <i class="fal fa-fw fa-edit"></i>  {{ __('ui.item.suggest') }}
                    </a>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-sm p-2 px-4">
                <h4 class="mt-2">{{ __('ui.item.info') }}</h4>
                <div class="text-muted">
                    <p class="m-0">
                        @if ($item->year)
                            @lang('ui.item.year', ['year' => $item->year])
                        @else
                            {{ __('ui.item.year_unknown') }}
                        @endif
                    </p>

                    <p class="m-0">
                        @if ($item->product_number)
                            @lang('ui.item.prod_num', ['prod_num' => $item->product_number])
                        @else
                            {{ __('ui.item.prod_num_unknown') }}
                        @endif
                    </p>

                    <p class="m-0">
                        @if ($item->price)
                            @lang('ui.item.price', ['price' => $item->price_formatted])
                        @else
                            {{ __('ui.item.price_unknown') }}
                        @endif
                    </p>

                    <p class="m-0">
                        @if ($item->submitter)
                            @lang('ui.item.submitter', ['submitter' => $item->submitter->username])
                        @else
                            {{ __('ui.item.submitter_unknown') }}
                        @endif
                    </p>

                    <p class="m-0">
                        @if ($item->published())
                            {{ __('ui.item.published') }}
                            <time datetime="{{ $item->published_at->toRfc3339String() }}"
                                  class="text-regular">{{ $item->published_at->format('jS M Y, H:i') }} UTC
                            </time>
                        @else
                            <span class="text-danger">{{ __('ui.item.draft') }}</span>
                        @endif
                    </p>
                </div>

                @foreach ($item->attributes()->orderByTranslation('name')->get() as $attribute)
                    <h4 class="mt-4">{{ $attribute->name }}</h4>
                    <p class="text-muted text-regular">{{ $attribute->pivot->value }}</p>
                @endforeach

                @if ($item->notes)
                    <h4 class="mt-4">{{ __('ui.item.notes') }}</h4>
                    <p class="text-muted text-regular">{!! purify($item->notes) !!}</p>
                @endif

                <div class="row">
                    <div class="col p-1 list-group text-center small">
                        <div class="list-group-item">
                            <i class="fal fa-star"></i> {{ $item->wishlist() }} {{ trans_choice('ui.wishlist.stargazers', $item->wishlist()) }}
                        </div>
                    </div>
                    <div class="col p-1 list-group text-center small">
                        <div class="list-group-item">
                            <i class="fal fa-shopping-bag"></i> {{ $item->closet() }} {{ trans_choice('ui.closet.owners', $item->closet()) }}
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">{{ __('ui.item.brand') }}</h4>
                <div class="row">
                    <div class="list-group col p-1 text-center small">
                        <a class="list-group-item" href="{{ $item->brand->url }}">
                            {{ $item->brand->name }}
                        </a>
                    </div>
                </div>

                <h4 class="mt-4">{{ __('ui.item.category') }}</h4>
                <div class="row">
                    @forelse ($item->categories()->orderByTranslation('name')->get() as $category)
                        <div class="p-1 list-group text-center col small">
                            <a class="list-group-item" href="{{ $category->url }}">
                                {{ $category->name }}
                            </a>
                        </div>
                    @empty
                        <p class="col text-muted">{{ __('ui.item.category_none') }}</p>
                    @endforelse
                </div>

                <h4 class="mt-4">{{ __('ui.item.features') }} <i
                        title="{{ __('ui.item.features_help') }}"
                        data-toggle="tooltip" class="fal fa-question-circle"></i></h4>
                <div class="row">
                    @forelse ($item->features()->orderByTranslation('name')->get() as $feature)
                        <div class="p-1 list-group text-center col-lg-4 col-6 small">
                            <a class="list-group-item" href="{{ $feature->url }}">
                                {{ $feature->name }}
                            </a>
                        </div>
                    @empty
                        <p class="col text-muted">{{ __('ui.item.features_none') }}</p>
                    @endforelse
                </div>

                <h4 class="mt-4">{{ __('ui.item.colors') }}</h4>
                <div class="row">
                    @forelse ($item->colors()->orderByTranslation('name')->get() as $color)
                        <div class="p-1 list-group text-center col-lg-4 col-6 small">
                            <a class="list-group-item" href="{{ $color->url }}">
                                {{ $color->name }}
                            </a>
                        </div>
                    @empty
                        <p class="col text-muted">{{ __('ui.item.colors_none') }}</p>
                    @endforelse
                </div>

                <h4 class="mt-4">{{ __('ui.item.tags') }}</h4>
                <div class="row">
                    @forelse ($item->tags()->orderByTranslation('name')->get() as $tag)
                        <div class="p-1 list-group text-center col-lg-4 col-6 small">
                            <a class="list-group-item" href="{{ $tag->url }}">
                                {{ $tag->name }}
                            </a>
                        </div>
                    @empty
                        <p class="col text-muted">{{ __('ui.item.tags_none') }}</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="row">
            <h4 class="my-4 px-4">{{ __('ui.item.images') }}</h4>
            <div class="item-image-columns mb-5">
                @if ($item->image)
                    <a class="card m-0 p-0" href="{{ cdn_link($item->image) }}"
                        data-lightbox="show">
                        <img src="{{ cdn_thumbnail($item->image) }}"
                                onerror="this.src = '{{ default_asset() }}'"
                                data-original-url="{{  cdn_thumbnail($item->image) }}"
                                class="mw-100">
                    </a>
                @endif
                @foreach ($item->images as $image)
                    @isset ($image['attributes']['image'])
                        <a class="card m-0 p-0" href="{{ cdn_link($image['attributes']['image']) }}"
                           data-lightbox="show">
                            <img src="{{ cdn_thumbnail($image['attributes']['image']) }}"
                                 onerror="this.src = '{{ default_asset() }}'"
                                 data-original-url="{{  cdn_thumbnail($image['attributes']['image']) }}"
                                 data-key="{{ $image['key'] ?? '' }}"
                                 class="mw-100">
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('meta')
    <link rel="canonical" href="{{ $item->url }}">

    <meta property="og:url" content="{{ $item->url }}">
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{ $item->english_name }} by {{ $item->brand->name }}">
    <meta property="og:image" content="{{ $item->image ? cdn_link($item->image) : default_asset() }}">
    <meta property="product:brand" content="{{ $item->brand->name }}">
@endsection
