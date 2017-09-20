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
                    {{-- <div class="nav-right">
                        <a class="nav-item" href="{{ route('register') }}">
                          No account? Create a FREE account!
                        </a>
                    </div> --}}
                </div>
            </header>
        </div>

        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title drop-in-transition-delay2">Thanks for coming back!</h1>
                <div class="card column is-half is-offset-one-quarter add-shadow-2x drop-in-transition">
                    <div class="card-content has-text-left">
                        <p class="title has-text-centered">
                            <span class="login-bold">Please</span> <span class="login-light">login</span>
                        </p>
                        <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="field">
                                <p class="control has-icons-left{{ $errors->has('email') ? ' has-icons-right' : '' }}">
                                    <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required autofocus />

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

                            <div class="field">
                                <b-switch>Remember me?</b-switch>
                            </div>

                            <button type="submit" class="button square-corners login-btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-foot">
            <nav class="tabs">
                <div class="container">
                    <ul>
                        <li class="has-text-centered">© West Point Real Estate</li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
@endsection
