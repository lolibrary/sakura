<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ auth()->user()->getRoleAttribute() }} <span class="caret"></span>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if (class_exists(\Laravel\Nova\Nova::class))
        <a class="dropdown-item" href="{{ url('/library/resources/items') }}">
            <i data-feather="columns" class="icon-fw"></i> {{ __('Dashboard') }}
        </a>
        @endif
    </div>
</li>
