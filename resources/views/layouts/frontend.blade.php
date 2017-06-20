<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Stylesheets -->
    {!! HTML::style(asset('https://fonts.googleapis.com/css?family=Raleway:100,300,400,600'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
    {!! HTML::style(asset('https://unpkg.com/buefy@0.4.0/lib/buefy.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
    {!! HTML::style(asset('css/app.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

    @yield('addStylesheets')
</head>

<body>
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

    <!-- Scripts -->
    {!! HTML::script(asset('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'), array('type' => 'text/javascript', 'integrity' => 'sha256-+J5cSgDOPu6OT8mt+r5f7/cmvICoEmNdK2ZGz8ql8wc=', 'crossorigin' => 'anonymous')) !!}
    {!! HTML::script(asset('https://unpkg.com/buefy@0.4.0'), array('type' => 'text/javascript')) !!}
    @yield('addScripts')
</body>
</html>
