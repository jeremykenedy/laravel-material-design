@php
	if ($user->profile->avatar_status == 1) {
		$userGravImage = $user->profile->avatar;
	} else {
		$userGravImage = Gravatar::get($user->email);
	}
@endphp
<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
	    <div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="https://schema.org/Person">
			<div class="mdl-user-avatar">
				<img src="{{$userGravImage}}" alt="{{ $user->name }}" class="user-avatar">
				<span itemprop="image" style="display:none;">{{ Gravatar::get($user->email) }}</span>
			</div>
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white" @if ($user->profile->user_profile_bg != NULL) style="background: url('{{$user->profile->user_profile_bg}}') center/cover;" @endif>
		        <h3 class="mdl-card__title-text mdl-title-username">
		        	{{ $user->name }}
		        </h3>
		    </div>
		    <div class="mdl-card__supporting-text">
				<div class="mdl-grid full-grid padding-0">
					<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">
					    <ul class="demo-list-icon mdl-list">
					        <li class="mdl-list__item mdl-typography--font-light">
					        	<div class="mdl-list__item-primary-content">
					        		<i class="material-icons mdl-list__item-icon">person</i>
									<span itemprop="name">
										{{ $user->first_name }} @if ($user->last_name) {{ $user->last_name }} @endif
									</span>
					        	</div>
					        </li>
					        <li class="mdl-list__item mdl-typography--font-light">
					        	<div class="mdl-list__item-primary-content">
					        		<i class="material-icons mdl-list__item-icon">contact_mail</i>
					        		<span itemprop="email">
										{{ $user->email }}
									</span>
					        	</div>
					        </li>
					        @if ($user->profile)
						        @if ($user->profile->twitter_username)
									<li class="mdl-list__item">
										<span class="mdl-list__item-primary-content">
											<svg class="material-icons mdl-list__item-icon" style="width:24px;height:24px" viewBox="0 0 24 24">
											    <path fill="#757575" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
											</svg>
											{!! HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link mdl-typography--font-light', 'target' => '_blank')) !!}
										</span>
									</li>
						        @endif
						        @if ($user->profile->github_username)
							        <li class="mdl-list__item">
							        	<span class="mdl-list__item-primary-content">
											<svg class="material-icons mdl-list__item-icon" style="width:24px;height:24px" viewBox="0 0 24 24">
											    <path fill="#757575" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
											</svg>
											{!! HTML::link('https://github.com/'.$user->profile->github_username, $user->profile->github_username, array('class' => 'github-link mdl-typography--font-light', 'target' => '_blank')) !!}
							        	</span>
							        </li>
						        @endif
								@if ($user->profile->location)
								    <li class="mdl-list__item mdl-typography--font-light">
								    	<div class="mdl-list__item-primary-content" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
								    		<i class="material-icons mdl-list__item-icon">location_on</i>
											<span itemprop="streetAddress">
												{{ $user->profile->location }}
											</span>
								    	</div>
								    </li>
								@endif
						        @if ($user->profile->bio)
							        <li class="mdl-list__item">
							        	<span class="mdl-list__item-primary-content">
							        		<i class="material-icons mdl-list__item-icon">comment</i>
							        		<p class="mdl-typography--font-light">
												{{ $user->profile->bio }}
												<meta itemprop="description" content="{{ $user->profile->bio }}">
											</p>
							        	</span>
							        </li>
						        @endif
					        @endif
					    </ul>
					</div>
					@if ($user->profile)
						@if ($user->profile->location)
							<div class="mdl-cell mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop margin-top-0 margin-top-2-desktop">
								<div class="card-image mdl-card mdl-shadow--2dp">
									<div id="map-canvas"></div>
									<div class="mdl-card__actions mdl-color--primary mdl-color-text--white">
										<p class="mdl-typography--font-light">
											LON: <span id="longitude"></span> / LAT: <span id="latitude"></span>
										</p>
									</div>
								</div>
							</div>
						@endif
					@endif
				</div>
		    </div>
		    <div class="mdl-card__actions">
				<div class="mdl-grid full-grid">
					<div class="mdl-cell mdl-cell--12-col">
						@if ($user->profile)
							@if (Auth::user()->id == $user->id)
								<a href="/profile/{{ Auth::user()->name }}/edit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white">
									<i class="material-icons padding-right-half-1">edit</i>
									{{ Lang::get('titles.editProfile') }}
								</a>
							@endif
						@else
							<p class="text-center">{{ Lang::get('profile.noProfileYet') }}</p>
							{!! HTML::link(URL::to('/profile/'.Auth::user()->name.'/edit'), Lang::get('titles.createProfile'), array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp')) !!}
						@endif
					</div>
				</div>
		    </div>
		    <div class="mdl-card__menu">

				@if (!Auth::guest() && Auth::user()->hasRole('administrator'))
					<a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
						<i class="material-icons">edit</i>
					</a>
				@endif

				<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
					<i class="material-icons">share</i>
				</button>
		    </div>
	    </div>
	</div>
</div>