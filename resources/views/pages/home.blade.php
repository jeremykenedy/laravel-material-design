@extends('dashboard')

@section('template_title')
	Welcome {{ Auth::user()->name }}
@endsection

@section('template_fastload_css')
@endsection

@section('header')
	{{ Lang::get('titles.home') }}
	|
	<small>
		{{ Lang::get('auth.loggedIn') }}
	</small>
@endsection

@section('breadcrumbs')

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="{{url('/')}}">
			<span itemprop="name">
				{{ Lang::get('titles.app') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>
	<li class="active">
		{{ Lang::get('titles.home') }}
	</li>

@endsection


@section('content')

	<div class="mdl-grid margin-top-0-important padding-top-0-important">

		@include('modules.pie-charts')
		@include('modules.charts')

		<div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">

			@include('cards.hero-image-card')

			<div class="demo-separator mdl-cell--1-col"></div>

			@include('cards.check-list-card')

		</div>

	</div>

@endsection

@section('template_scripts')
@endsection