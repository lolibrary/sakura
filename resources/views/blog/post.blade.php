@extends('layouts.app', ['title' => $post->title])

@section('content')
<div class="col" style="height: 3rem">
    <a href="{{ route('home') }}" class="px-4 h5">
        <i class="far fa-chevron-left"></i> {{ __('ui.back') }}
    </a>
</div>

<div class="col-md-6 mx-auto">
    <div class="card" style="margin-bottom: 10px">
        <img class="card-img-top" src="{{ $post->image ?? cdn_link('assets/backgrounds/pattern_dark_blog-cropped.png') }}" alt="" style="max-height: 320px; width: 100%">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted text-right">
                {{ __('ui.blog.by') }} {{ $post->user->username ?? __('ui.blog.anon')}},

                @if ($post->published_at)
                    <time datetime="{{ $post->published_at->toRfc3339String() }}">{{ $post->published_at->format('jS M Y H:i') }}</time>
                @else
                    <time datetime="{{ $post->created_at->toRfc3339String() }}">{{ $post->created_at->format('jS M Y H:i') }}</time>
                @endif
            </h6>

            <p class="card-text">
                {{-- post body is raw HTML. blog post permission is only given to admin or higher. --}}
                {!! $post->body !!}
            </p>
        </div>
    </div>
</div>
@endsection

@section('meta')
    <link rel="canonical" href="{{ $post->url }}">
    <meta property="og:url" content="{{ $post->url }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Lolibrary: {{ $post->title }}">
    <meta property="og:image" content="{{ $post->image ?? cdn_link('assets/backgrounds/pattern_dark_blog-cropped.png') ?? default_asset() }}">
@endsection
