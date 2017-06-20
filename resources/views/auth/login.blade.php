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
                <div class="card column is-half is-offset-one-quarter add-shadow">
                    <header class="card-header">
                        <p class="card-header-title has-text-centered">
                            Please login
                        </p>
                    </header>
                    <div class="card-content has-text-left">
                        <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="field">
                                <label class="label" for="email">Email</label>
                                <p class="control">
                                    <input class="input" type="email" name="email" id="email" required />
                                </p>
                            </div>

                            <div class="field">
                                <label class="label" for="password">Password</label>
                                <p class="control">
                                    <input class="input" type="password" name="password" id="password" required />
                                </p>
                            </div>

                            <a type="submit" class="button is-primary">Primary</a>
                        </form>
                    </div>
                </div>
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