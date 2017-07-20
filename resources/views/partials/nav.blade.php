<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item" href="{{ url('/') }}">
                West Point Real Estate
            </a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '') is-active @endif" href="{{ url('/') }}">Home</a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '/properties') is-active @endif" href="{{ url('/properties') }}">Properties</a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '/forms') is-active @endif" href="{{ url('/forms') }}">Forms</a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '/contact') is-active @endif" href="{{ url('/contact') }}">Contact</a>
            @if(Auth::user() && Auth::user()->isAdmin())
                <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '/admin') is-active @endif" href="{{ url('/admin') }}">Admin</a>
            @endif
        </div>
        <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <div class="nav-right nav-menu">
            <a class="nav-item is-tab is-hidden-tablet is-active">Home</a>
            <a class="nav-item is-tab is-hidden-tablet">Properties</a>
            <a class="nav-item is-tab is-hidden-tablet">Forms</a>
            <a class="nav-item is-tab is-hidden-tablet">Contact</a>
            @guest
                <a class="nav-item is-tab" href="{{ url('/login') }}">Login</a>
            @endauth
            @auth
                <a class="nav-item is-tab">
                    <figure class="image is-16x16" style="margin-right: 8px;">
                        <img src="{{ Auth::user()->getGravatar() }}">
                    </figure>
                    {{ Auth::user()->name }}
                </a>
                <a class="nav-item is-tab" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form class="hidden" id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            @endauth
        </div>
    </div>
</nav>
