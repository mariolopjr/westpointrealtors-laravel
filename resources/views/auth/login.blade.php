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
                <h1 class="title drop-in-transition-delay2">Thanks for coming back!</h1>
                <div class="card column is-half is-offset-one-quarter add-shadow-2x drop-in-transition">
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
                                <p class="control has-icons-left{{ $errors->has('email') ? ' has-icons-right' : '' }}">
                                    <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus />

                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>

                                    @if ($errors->has('email'))
                                        <span class="icon is-small is-right">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">This email is invalid</p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label" for="password">Password</label>
                                <p class="control has-icons-left{{ $errors->has('password') ? ' has-icons-right' : '' }}">
                                    <input class="input square-corners{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" id="password" placeholder="Password" required />

                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>

                                    @if ($errors->has('password'))
                                        <span class="icon is-small is-right">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">This password is invalid</p>
                                @endif
                            </div>

                            <a class="" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>

                            <button type="submit" class="button is-primary square-corners login-btn">Login</button>
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