@extends('dashboard')

@section('template_title')
	Show Users
@endsection

@section('template_linked_css')
	{!! HTML::style(asset('https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
@endsection

@section('template_fastload_css')
@endsection

@section('header')
	Showing All Users
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
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="/">
			<span itemprop="name">
				Users
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="2" />
	</li>
	<li class="active">
		All Users
	</li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
	<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
		<h2 class="mdl-card__title-text logo-style">
			@if (count($total_users) === 1)
			    {{ $total_users }} User total
			@elseif (count($total_users) > 1)
			    {{ $total_users }} Total Users
			@else
			    No Users
			@endif
		</h2>
	</div>
	<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0">
		<div class="table-responsive material-table">
			<table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
			  <thead>
			    <tr>
					<th class="mdl-data-table__cell--non-numeric">ID</th>
					<th class="mdl-data-table__cell--non-numeric">Name</th>
					<th class="mdl-data-table__cell--non-numeric">Email</th>
					<th class="mdl-data-table__cell--non-numeric">Access Level</th>
					<th class="mdl-data-table__cell--non-numeric">Created</th>
					<th class="mdl-data-table__cell--non-numeric">Updated</th>
			    </tr>
			  </thead>
			  <tbody>
			        @foreach ($users as $a_user)
						<tr>
							<td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->id}}</a></td>
							<td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->name}} </a></td>
							<td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->email}} </a></td>
							<td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $a_user->id) }}" class="badge {{ $access_class }}">{{$access}} </a></td>
							<td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->created_at}} </a></td>
							<td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->updated_at}} </a></td>
						</tr>
			        @endforeach
			  </tbody>
			</table>
		</div>
	</div>
    <div class="mdl-card__menu" style="top: -5px;">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable search-white">
			<label class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon" for="search_table">
			  	<i class="material-icons">search</i>
			</label>
			<div class="mdl-textfield__expandable-holder">
			  	<input class="mdl-textfield__input" type="search" id="search_table" placeholder="Search Terms">
			  	<label class="mdl-textfield__label" for="search_table">
			  		Search Terms
			  	</label>
			</div>
		</div>
    </div>
</div>

@endsection

@section('template_scripts')

	{!! HTML::script('https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js', array('type' => 'text/javascript')) !!}
	{!! HTML::script('https://cdn.datatables.net/1.10.12/js/dataTables.material.min.js', array('type' => 'text/javascript')) !!}
	@include('scripts.mdl-datatables')

@endsection