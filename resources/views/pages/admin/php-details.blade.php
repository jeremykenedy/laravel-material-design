@extends('layouts.dashboard')

@section('template_title')
	PHP Information
@endsection

@section('header')
	PHP Information
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
	<li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="/php" disabled>
			<span itemprop="name">
				PHP Information
			</span>
		</a>
		<meta itemprop="position" content="2" />
	</li>
@endsection

@section('content')
	<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
		<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
			<h2 class="mdl-card__title-text logo-style">
				PHP Details
			</h2>
		</div>
		<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0">
			<div class="material-table php-info-table context" id="search_table">
				@php
					ob_start();
					phpinfo();
					$pinfo = ob_get_contents();
					ob_end_clean();
					$pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
					echo $pinfo;
				@endphp
			</div>
		</div>
	    <div class="mdl-card__menu" style="top: -3px;">
			@include('partials.mdl-highlighter')
			@include('partials.mdl-filter')
	    </div>
	</div>
@endsection

@section('footer_scripts')
	@include('scripts.mdl-datatables')
	@include('scripts.highlighter-script')
	@include('scripts.filter-data-script')
@endsection