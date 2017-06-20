<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item" href="/">
                West Point Real Estate
            </a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '') is-active @endif" href="/">Home</a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '/properties') is-active @endif" href="/properties">Properties</a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '/forms') is-active @endif" href="/forms">Forms</a>
            <a class="nav-item is-tab is-hidden-mobile @if(substr(request()->fullUrl(), strpos(request()->getUri(), "/", 7)) == '/contact') is-active @endif" href="/contact">Contact</a>
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
                <a class="nav-item is-tab">Log in</a>
            @else
                <a class="nav-item is-tab">
                    <figure class="image is-16x16" style="margin-right: 8px;">
                        <img src="http://bulma.io/images/jgthms.png">
                    </figure>
                    Profile
                </a>
                <a class="nav-item is-tab">Log out</a>
            @endif
        </div>
    </div>
</nav>