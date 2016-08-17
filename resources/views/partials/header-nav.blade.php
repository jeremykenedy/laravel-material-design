<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="header_nav">
	<i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right demo-list-icon mdl-list" for="header_nav">
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="/" title="{{ Lang::get('titles.home') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">home</i>
				{{ Lang::get('titles.home') }}
			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="{{ url('/profile/'.Auth::user()->name) }}" title="{{ Lang::get('titles.profile') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">perm_identity</i>
				{{ Lang::get('titles.profile') }}
			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
		<a href="{{ url('/auth/logout') }}" title="{{ Lang::get('titles.logout') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">power_settings_new</i>
				{{ Lang::get('titles.logout') }}
			</span>
    	</a>
  	</li>
</ul>