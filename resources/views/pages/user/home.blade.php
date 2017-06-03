@extends('layouts.dashboard')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('header')
	{{ trans('auth.loggedIn', ['name' => Auth::user()->name]) }}
@endsection

@section('breadcrumbs')

	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="{{url('/')}}">
			<span itemprop="name">
				{{ trans('titles.app') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>
	<li class="active">
		{{ trans('titles.dashboard') }}
	</li>

@endsection

@section('content')

	<div class="mdl-grid margin-top-0-important padding-top-0-important">

		<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell margin-top-0-important mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--8-col-desktop">
			@include('panels.welcome-panel')
		</div>

		@include('cards.weather-card')

		<div class="mdl-cell mdl-shadow--2dp mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop mdl-color--primary mdl-card dark-table">

			@include('cards.check-list-card')

		</div>

		{{--
			<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

				@include('modules.table')

			</div>

			<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

				@include('modules.mega-footer')

			</div>

			<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

				@include('modules.mini-footer')

			</div>
		--}}

	</div>

@endsection

@section('footer_scripts')
@endsection