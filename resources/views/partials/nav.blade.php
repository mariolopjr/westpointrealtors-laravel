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
            @if (Auth::guest())
                <a class="nav-item is-tab" href="{{ url('/login') }}">Log in</a>
            @else
                <a class="nav-item is-tab">
                    <figure class="image is-16x16" style="margin-right: 8px;">
                        <img src="http://bulma.io/images/jgthms.png">
                    </figure>
                    Profile
                </a>
                <a class="nav-item is-tab" href="">Log out</a>
            @endif
        </div>
    </div>
</nav>