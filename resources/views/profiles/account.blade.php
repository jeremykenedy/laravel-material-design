@extends('layouts.dashboard')

@section('template_title')
	{{ $user->name }}'s Account
@endsection

@section('template_fastload_css')
@endsection

@section('header')
	<small>
		{{ trans('profile.accountTitle',['username' => $user->name]) }}
	</small>
@endsection

@section('breadcrumbs')

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="{{url('/')}}">
			<span itemprop="name">
				{{ trans('titles.app') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="{{ url('/account/') }}" class="hidden">
			<span itemprop="name">
				{{ trans('titles.account') }}
			</span>
		</a>
		{{ trans('titles.account') }}
		<meta itemprop="position" content="2" />
	</li>

@endsection

@section('content')











@endsection

@section('footer_scripts')
@endsection
