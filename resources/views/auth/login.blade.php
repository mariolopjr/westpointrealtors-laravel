@extends('layouts.frontcontentonly')

@section('content')
    <section class="hero is-fullheight login-hero">
        <div class="hero-head">
            <header class="nav">
                <div class="container">
                    <div class="nav-left">
                        <a class="nav-item" href="{{ url('/') }}">
                            West Point Real Estate
                        </a>
                    </div>
                    <div class="nav-right">
                        <span class="nav-item">
                            <a class="">
                              No account? Create a FREE account!
                            </a>
                        </span>
                    </div>
                </div>
            </header>
        </div>

        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Thanks for coming back!</h1>
                <div class="card is-half is-offset-one-quarter">
                    <div class="card-content">
                        <p class="title">
                            “There are two hard things in computer science: cache invalidation, naming things, and off-by-one errors.”
                        </p>
                        <p class="subtitle">
                            Jeff Atwood
                        </p>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">
                            <span>
                                View on <a href="https://twitter.com/codinghorror/status/506010907021828096">Twitter</a>
                            </span>
                        </p>
                        <p class="card-footer-item">
                            <span>
                                Share on <a href="#">Facebook</a>
                            </span>
                        </p>
                    </footer>
                </div>
                <form action="/login" class="login-form">

                </form>
            </div>
        </div>

        <div class="hero-foot">
            <nav class="tabs">
                <div class="container">
                    <ul>
                        <li>Copyright c West Point Real Estate</li>
                        <li><a>Terms and Conditions</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
@endsection