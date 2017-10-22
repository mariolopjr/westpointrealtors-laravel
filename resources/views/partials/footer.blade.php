<footer class="site">
    <div class="container">
        <div class="columns">
            <div class="company-info column is-one-third">
                <h1 class="title">West Point Real Estate</h1>
                <h2 class="subtitle">A Real Estate Brokerage</h2>
                <span class="address">8 Beverly Hills Boulevard</span>
                <span class="address">Beverly Hills, Florida</span>
                <span class="contact-number">(352) 462-0414</span>
                <span class="contact-number">1 (800) 418-4261</span>
                <span class="email">westpointagents@gmail.com</span>
            </div>
            <div class="column is-one-third is-offset-one-third disclaimer">
                <span>Disclaimer</span>
                <hr>
                <span>Information herein deemed reliable but not guaranteed.</span>
            </div>
        </div>
    </div>
    <div class="lower-footer">
        <div class="container">
            <span class="is-uppercase">© West Point Real Estate</span>
            @guest
                <a href="{{ url('/admin') }}" class="is-pulled-right">Agent Login</a>
            @endauth
            @auth
                <a
                    class="is-pulled-right"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >
                    Agent Logout
                </a>
                <form class="hidden" id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            @endauth
        </div>
    </div>
</footer>
