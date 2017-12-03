<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="West Point Real Estate">
    <meta name="Copyright" content="Copyright (c) {{ date('Y') }} West Point Real Estate">
    <link rel = "manifest" href = "/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="green-translucent">
    <meta name="msapplication-config" content="none">
    <meta name="msapplication-TileColor" content="#00d1b2">
    <link rel="canonical" href="{{ URL::current() }}">
    <meta itemprop="name" content="West Point Real Estate">
    <meta itemprop="description" content="Current, up-to-date listings for homes
        located in Florida, with information about real estate rentals without
        requiring MLS!">
    <link rel="start" title="WPRE" href="/">
    <title>@yield('pageTitle')</title>

    @yield('propertyMeta')

    <!-- Stylesheets -->
    {!! HTML::style(asset('https://fonts.googleapis.com/css?family=Raleway:100,300,400,600'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
    {!! HTML::script(asset('https://use.fontawesome.com/ffe4b59639.js'), array('type' => 'text/javascript')) !!}
    {!! HTML::style(asset('css/app.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

    @yield('addStylesheets')
</head>
<body>
<div id="app">
    <div v-cloak>
