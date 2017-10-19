@extends('layouts.frontcontentonly')

@section('pageTitle', 'Register - West Point Real Estate')

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
                            <a class="" href="{{ route('login') }}">
                              Already have an account? Welcome back!
                            </a>
                        </span>
                    </div>
                </div>
            </header>
        </div>

        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title drop-in-transition-delay2">Thanks for registering!</h1>
                <div class="card column is-half is-offset-one-quarter add-shadow-2x drop-in-transition">
                    <header class="card-header">
                        <p class="card-header-title has-text-centered">
                            Please register
                        </p>
                    </header>
                    <div class="card-content has-text-left">
                        <form class="login-form" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="field">
                                <label class="label">Name</label>
                                <p class="control has-icons-left{{ $errors->has('name') ? ' has-icons-right' : '' }}">
                                    <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name" required autofocus />

                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>

                                    @if ($errors->has('name'))
                                        <span class="icon is-small is-right">
                                            <i class="fa fa-warning"></i>
                                        </span>
                                    @endif
                                </p>
                            </div>

                            <div class="field">
                                <label class="label" for="email">Email</label>
                                <p class="control has-icons-left{{ $errors->has('email') ? ' has-icons-right' : '' }}">
                                    <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" required />

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
                                <label class="label" for="password">Confirm Password</label>
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
                                <label class="label" for="password-confirm">Password</label>
                                <p class="control has-icons-left">
                                    <input class="input square-corners" type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" required />

                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </p>
                            </div>

                            <button type="submit" class="button is-primary square-corners login-btn">Register</button>
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
