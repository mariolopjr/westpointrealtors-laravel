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