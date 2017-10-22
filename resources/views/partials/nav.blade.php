<nav class="navbar">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ url('/') }}">
            West Point Real Estate
        </a>

        <div class="navbar-burger burger"
            data-target="main-nav"
            onclick="document.querySelector('#main-nav').classList.toggle('is-active');document.querySelector('.navbar-burger.burger').classList.toggle('is-active');">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="main-nav" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ url('/') }}">
                Home
            </a>
            <a class="navbar-item" href="{{ url('/properties') }}">
                Properties
            </a>
            <a class="navbar-item" href="{{ url('/forms') }}">
                Forms
            </a>
            {{-- <a class="navbar-item" href="{{ url('/contact') }}">
                Contact
            </a>--}}
        </div>
        {{-- <div class="navbar-end">
            @guest
                <a class="navbar-item" href="{{ url('/login') }}">Login</a>
            @endauth
            @auth
                <div class="navbar-item has-dropdown is-hoverable">
                    <div class="navbar-link">
                        <figure class="image is-16x16" style="margin-right: 8px;">
                            <img src="{{ Auth::user()->getGravatar() }}">
                        </figure>
                        {{ Auth::user()->name }}
                    </div>

                    <div class="navbar-dropdown">
                        @if(Auth::user() && Auth::user()->isAdmin())
                            <a class="navbar-item" href="{{ url('/admin') }}">
                                Admin
                            </a>
                        @endif
                        <a class="navbar-item" href="">
                            Profile
                        </a>
                        <hr class="navbar-divider">
                        <a
                            class="navbar-item"
                            href="{{ route('logout')  }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >
                            Logout
                        </a>
                    </div>
                </div>
                <form class="hidden" id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            @endauth
        </div> --}}
    </div>
</nav>
