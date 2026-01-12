<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ cdn_link('assets/favicon.png') }}" type="image/png" sizes="any">
    <title>{{ $title ?? 'Lolibrary' }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="search-endpoint" content="{{ route('api.search') }}">
    <meta name="default-image" content="{{ default_asset() }}">

    <!-- Styles -->
    <link href="{{ mix('assets/app.css') }}" rel="stylesheet">

    @yield('meta', '')
</head>
<body>
    <a class="sr-only sr-only-focusable" href="#skip-navigation">{{ __('ui.skip') }}</a>
    <div id="app" style="margin-top: 55px">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="height: 14px" src="{{ cdn_link('assets/logo_horizontal.png') }}" alt="Lolibrary logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @junior
                        @include('components.navbar.admin')
                    @endjunior
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ config('app.locales')[App::getLocale()] }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(config('app.locales') as $key => $value)
                                @if ($key != 'en_US')
                                <a class="dropdown-item" href="{{ route('set_lang', ['lang' => $key]) }}">{{ $value }}</a>
                                @endif
                                @endforeach
                            </div>
                        </li>

                        <li><a class="nav-link" href="{{ route('donate') }}">{{ __('ui.donate.title') }}</a></li>
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('ui.auth.register') }}</a></li>
                        @else
                            @include('components.navbar.dropdown')
                        @endguest

                        <li class="d-sm-none"><a class="nav-link" href="{{ route('search') }}">{{ __('ui.search.title') }}</a></li>
                    </ul>

                    <form class="form-inline pl-md-3 d-none d-sm-flex" action="{{ route('search') }}" method="get">
                        <input class="form-control mr-sm-2" name="search" autocomplete="off" type="search" placeholder="{{ __('ui.search.title') }}" aria-label="{{ __('ui.search.title') }}">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="far fa-search" aria-label="Search Icon"></i></button>
                    </form>
                </div>
            </div>
        </nav>

        @if (config('app.banner.show'))
            <div class="alert-fullwidth text-center alert alert-{{ config('app.banner.style', 'info') }}" role="alert">
                {{ config('app.banner.content') }}
            </div>
        @endif

        @if (session('status'))
            <div class="alert-fullwidth text-center alert alert-primary" role="alert">
                {{ __(session('status')) }}
            </div>
        @endif

        <main class="py-4" id="skip-navigation" style="min-height: 70vh">
            @yield('content')
        </main>

        <footer class="footer mt-4 py-5 text-muted" style="height: 25vh">
            <div class="container">
                <p class="npo-statement">{{__('ui.npo')}}</p>

                <p>
                    Powered by <a href="https://www.fastly.com" title="Fastly" rel="external nofollow">
                        <img style="height: 1.5rem" src="{{ cdn_link('assets/fastly.svg') }}" alt="Fastly">
                    </a>
                </p>

            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('assets/app.js') }}"></script>
    @yield('script', '')
</body>
</html>
