<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
	<a href="/" class="dashboard-logo mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white">
		Laravel
			<i class="material-icons " role="presentation">whatshot</i>
		Material
	</a>
	<header class="demo-drawer-header">
		{{--
			<img src="{{ Gravatar::get(Auth::user()->email) }}" alt="{{ Auth::user()->name }}" class="demo-avatar">
		--}}
		<i class="material-icons mdl-list__item-avatar">face</i>
		<div class="demo-avatar-dropdown">
			<span>
				{{ Auth::user()->name }}
			</span>
			<div class="mdl-layout-spacer"></div>
			@include('partials.account-nav')
		</div>
	</header>

	<nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

		<a class="mdl-navigation__link" href="/" title="{{ Lang::get('titles.home') }}">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>
			{{ Lang::get('titles.home') }}
		</a>
		<a class="mdl-navigation__link" href="{{ url('/profile/'.Auth::user()->name) }}">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person</i>
			{{ Lang::get('titles.profile') }}
		</a>
		<a class="mdl-navigation__link" href="/tasks">
			<i class="material-icons mdl-badge mdl-badge--overlap" @if (count($incompleteTasks) != 0) data-badge="{{ count($incompleteTasks) }}" @endif role="presentation">view_list</i>
			My Tasks
		</a>
		<a class="mdl-navigation__link" href="/tasks/create">
			<i class="material-icons mdl-badge mdl-badge--overlap" role="presentation">playlist_add</i>
			Create Task
		</a>
		@if (!Auth::guest() && Auth::user()->hasRole('administrator'))

			<a class="mdl-navigation__link" href="{{ url('/users') }}">
				<i class="mdl-color-text--blue-grey-400 material-icons mdl-badge mdl-badge--overlap" data-badge="{{ $totalUsers }}" role="presentation">contacts</i>
				{{ Lang::get('titles.adminUserList') }}
			</a>

			<a class="mdl-navigation__link" href="{{ url('/users/create') }}">
				<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person_add</i>
				{{ Lang::get('titles.adminNewUser') }}
			</a>

		@endif

		<div class="mdl-layout-spacer"></div>
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>

	</nav>
	{{--
		// TEMP - FOR REFERENCE ONLY - DELETE BEFORE RELEASE
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>Trash</a>
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>Spam</a>
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Forums</a>
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Updates</a>
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Promos</a>
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Purchases</a>
		<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Social</a>
	--}}

</div>