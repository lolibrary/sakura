<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->username }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('profile') }}">
            <i data-feather="user" class="icon-fw"></i> {{ __('Profile') }}
        </a>

        <a class="dropdown-item" href="{{ route('public_wishlist', ['username' => Auth::user()->username]) }}">
            <i data-feather="star" class="icon-fw"></i> {{ __('Wishlist') }}
        </a>

        <a class="dropdown-item" href="{{ route('public_closet', ['username' => Auth::user()->username]) }}">
            <i data-feather="tag" class="icon-fw"></i> {{ __('Closet') }}
        </a>

        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i data-feather="log-out" class="icon-fw"></i> {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
