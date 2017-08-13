<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="header_nav">
	<i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right demo-list-icon mdl-list" for="header_nav">
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="/" title="{{ trans('titles.home') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">home</i>
				{{ trans('titles.home') }}
			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{!! trans('titles.logout') !!}">
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