<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="">
        <meta name="author" content="Jeremy Kenedy">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        {!! HTML::style('https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,400,100,300,600,700', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
        {!! HTML::style(asset('https://fonts.googleapis.com/icon?family=Material+Icons'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
        @yield('template_linked_fonts')

        {{-- MDL CSS Library --}}
        @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
            <link rel="stylesheet" type="text/css" href="{{ asset('css/mdl-themes/' . $theme->link) }}" id="user_theme_link">
        @else
            <link rel="stylesheet" type="text/css" href="{{ asset('css/mdl-themes/material.min.css') }}" id="user_theme_link">
        @endif

        {{-- Custom App Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @yield('head')

    </head>
    <body class="mdl-color--grey-100">

        <div id="app" class="demo-layout dashboard-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            @include('partials.form-status')
            @yield('template-form-status')

            <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">

                    <span class="mdl-layout-title">

                        @yield('header')

                    </span>

                    <div class="mdl-layout-spacer"></div>

                    {{--
                        @include('partials.search-bar')
                    --}}

                    @include('partials.header-nav')

                </div>
            </header>

            @include('partials.drawer-nav')

            <main class="mdl-layout__content mdl-color--grey-100">

                <nav class="breadcrumb">
                    <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                        @yield('breadcrumbs')
                    </ul>
                </nav>

                <div class="mdl-grid margin-top-0 padding-top-0">

                    @yield('content')

                </div>
            </main>
        </div>

        {{-- Scripts --}}
        {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array('type' => 'text/javascript')) !!}
        {!! HTML::script('//code.getmdl.io/1.1.3/material.min.js', array('type' => 'text/javascript')) !!}
        {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.4/dialog-polyfill.min.js', array('type' => 'text/javascript')) !!}

        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ mix('/js/mdl.js') }}"></script>

        {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}

        @yield('footer_scripts')

    </body>
</html>