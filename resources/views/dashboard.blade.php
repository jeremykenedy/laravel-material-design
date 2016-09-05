<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" name="viewport">
		<title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ Lang::get('titles.app') }}</title>

	    {{-- HTML5 Shim and Respond.js for IE8 support --}}
	    <!--[if lt IE 9]>
			{!! HTML::script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', array('type' => 'text/javascript')) !!}
			{!! HTML::script('//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js', array('type' => 'text/javascript')) !!}
			{!! HTML::script('//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js', array('type' => 'text/javascript')) !!}
			{!! HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', array('type' => 'text/javascript')) !!}
	    <![endif]-->
	    <!--[if gte IE 9]>
	      <style type="text/css">.gradient {filter: none;}</style>
	    <![endif]-->

		{{-- FONTS AND ICONS --}}
		{!! HTML::style('https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,400,100,300,600,700', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
		{!! HTML::style(asset('https://fonts.googleapis.com/icon?family=Material+Icons'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

		@yield('template_linked_fonts')

		{{-- STYLESHEETS --}}
		{!! HTML::style(asset('https://code.getmdl.io/1.1.3/material.grey-red.min.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
		{!! HTML::style(elixir('css/app.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

		@yield('template_linked_css')

		<style type="text/css">
			@yield('template_fastload_css')
		</style>

	</head>
	<body class="mdl-color--grey-100">

	    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

	    	@include('partials.form-status')

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
					<ul itemscope itemtype="http://schema.org/BreadcrumbList">
						@yield('breadcrumbs')
					</ul>
				</nav>

				<div class="mdl-grid margin-top-0 padding-top-0">

					@yield('content')

				</div>
			</main>
	    </div>

		{{-- SCRIPTS --}}
		{!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script('//code.getmdl.io/1.1.3/material.min.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.4/dialog-polyfill.min.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script(elixir('js/app.js'), array('type' => 'text/javascript')) !!}

		@yield('template_scripts')

	</body>
</html>