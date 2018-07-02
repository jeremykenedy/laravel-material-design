<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }} | {{ config('pages.name') }}</title>
        <meta name="description" content="{{ $meta_description }}">
        <meta name="author" content="{{ config('pages.author') }}">
        <link rel="shortcut icon" href="/favicon.ico">

        <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed {{ config('pages.title') }}">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- MDL CSS Library --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/mdl-themes/material.min.css') }}" id="user_theme_link">

        {{-- Custom App Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        {{-- Load In additional Template Style Calls --}}
        @yield('styles')

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @yield('head')

    </head>
    <body>
        {{-- Load Template Nav --}}
        @include('front-end.partials.nav')

        {{-- Load Template Header--}}
        @yield('page-header')

        <div id="app">

            <div class="container">
                @include('partials.form-status')
            </div>

            @yield('content')

            {{-- Load Template Specific Pre Footer --}}
            @yield('additional-page-footer')

        </div>

        {{-- Start Global Footer --}}
        @include('front-end.partials.page-footer')

        {{-- Scripts --}}
        <!-- <script src="{{ mix('/js/app.js') }}"></script> -->

        @yield('scripts')

    </body>
</html>
