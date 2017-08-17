<button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
	<i class="material-icons" role="presentation">arrow_drop_down</i>
	<span class="visuallyhidden">Accounts</span>
</button>

<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right demo-list-icon mdl-list" for="accbtn">
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="/" title="{{ trans('titles.home') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">home</i>
				{{ trans('titles.home') }}
			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="{{ url('/profile/'.Auth::user()->name) }}" title="{{ trans('titles.profile') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">perm_identity</i>
				{{ trans('titles.profile') }}
			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="{{ url('/account/') }}" title="{{ trans('titles.account') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">account_circle</i>
				{{ trans('titles.account') }}
			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{{ trans('titles.logout') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">power_settings_new</i>
				{{ trans('titles.logout') }}
			</span>
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		    {{ csrf_field() }}
		</form>
  	</li>
</ul>