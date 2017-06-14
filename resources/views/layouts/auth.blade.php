<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', trans('titles.app')) }}</title>
        <meta name="description" content="">
        <meta name="author" content="Jeremy Kenedy">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts and Icons --}}
        {!! HTML::style('https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,400,100,300,600,700', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
        {!! HTML::style(asset('https://fonts.googleapis.com/icon?family=Material+Icons'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

        {{-- MDL CSS Library --}}
        @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
            <link rel="stylesheet" type="text/css" href="{{ asset('css/mdl-themes/' . $theme->link) }}" id="user_theme_link">
        @else
            <link rel="stylesheet" type="text/css" href="{{ asset('css/mdl-themes/material.min.css') }}" id="user_theme_link">
        @endif

        {{-- Custom App Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        @yield('template_styles')

        {{-- Head Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

    </head>
    <body class="mdl-color--grey-100">
        <div id="app">

            @include('partials.form-status')
            @yield('content')

        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ mix('/js/mdl.js') }}"></script>

        @yield('footer_scripts')

    </body>
</html>