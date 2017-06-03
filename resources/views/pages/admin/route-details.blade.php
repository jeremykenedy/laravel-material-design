@extends('layouts.dashboard')

@section('template_title')
	Routing Information
@endsection

@section('header')
	Routing Information
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
		<a itemprop="item" href="/routes" disabled>
			<span itemprop="name">
				Routes List
			</span>
		</a>
		<meta itemprop="position" content="2" />
	</li>
@endsection

@section('content')

	<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
		<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
			<h2 class="mdl-card__title-text logo-style">
				@if (count($routes) === 1)
				    {{ count($routes) }} Route Total
				@elseif (count($routes) > 1)
				    {{ count($routes) }} Total Routes
				@else
				    No Routes ?!?
				@endif
			</h2>
		</div>
		<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
			<div class="table-responsive material-table">
				<table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">URI</th>
							<th class="mdl-data-table__cell--non-numeric">Name</th>
							<th class="mdl-data-table__cell--non-numeric">Prefix</th>
							<th class="mdl-data-table__cell--non-numeric">Method</th>
						</tr>
					</thead>
				  	<tbody>
						@foreach ($routes as $route)
							<tr>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users">{{ $route->uri }}</a></td>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users">{{ $route->getName() }}</a></td>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users">{{ $route->getPrefix() }}</a></td>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users">{{ $route->getActionMethod() }}</a></td>
							</tr>
						@endforeach
				  	</tbody>
				</table>
			</div>
		</div>
	    <div class="mdl-card__menu" style="top: -5px;">
		    @include('partials.mdl-highlighter')
		    @include('partials.mdl-search')
	    </div>
	</div>
@endsection

@section('footer_scripts')
	@include('scripts.mdl-datatables')
	@include('scripts.highlighter-script')
@endsection
