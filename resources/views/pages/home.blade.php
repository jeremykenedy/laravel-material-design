@extends('dashboard')

@section('template_title')
	{{ Lang::get('titles.home') }}
@endsection

@section('template_fastload_css')
@endsection

@section('header')

	{{ Lang::get('auth.loggedIn', ['name' => Auth::user()->name]) }}

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

		<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell margin-top-0-important mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--8-col-desktop">
		  	<div class="mdl-card__title mdl-card--expand @if (Auth::user()->profile->user_profile_bg == NULL) mdl-color--teal-300 @endif" @if (Auth::user()->profile->user_profile_bg != NULL) style="background: #263238 url('{{Auth::user()->profile->user_profile_bg}}') center/cover;" @endif>
				<div class="mdl-user-avatar">
					<img src="{{ Gravatar::get(Auth::user()->email) }}" alt="{{ Auth::user()->name }}">
					<span itemprop="image" style="display:none;">{{ Gravatar::get(Auth::user()->email) }}</span>
				</div>
				<h2 class="mdl-card__title-text mdl-title-username mdl-color-text--white text-center">
					Hi {{ Auth::user()->name }}
				</h2>
		  	</div>
			<div class="mdl-card__supporting-text mdl-color-text--grey-600">
				Thank you for checking out this Laravel Material Design Lite project. Please star and/or fork this repository :)
			</div>
		</div>
		<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell margin-top-0-important mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop mdl-card mdl-color--primary">

			@include('cards.check-list-card')

		</div>

		<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

			@include('modules.table')

		</div>

		<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

			@include('modules.mega-footer')

		</div>

		<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

			@include('modules.mini-footer')

		</div>

	</div>

@endsection

@section('template_scripts')
@endsection