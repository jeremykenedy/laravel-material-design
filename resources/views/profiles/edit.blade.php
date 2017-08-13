@extends('layouts.dashboard')

@section('template_title')
	{{ trans('profile.templateTitle') }}
@endsection

@section('header')
	<small>
		{{ trans('profile.editProfileTitle') }} | {{ trans('profile.showProfileTitle',['username' => $user->name]) }}
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

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="{{ url('/profile/'.Auth::user()->name) }}">
			<span itemprop="name">
				{{ trans('titles.profile') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="2" />
	</li>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="{{ url('/profile/'.Auth::user()->name.'/edit') }}" class="hidden">
			<span itemprop="name">
				{{ trans('titles.editProfile') }}
			</span>
		</a>
		<meta itemprop="position" content="3" />
		{{ trans('titles.editProfile') }}
	</li>

@endsection

@section('template-form-status')
	@include('partials.form-status-ajax')
@endsection

@section('template_fastload_css')
	.mdl-gen__preview {
	    position: relative;
	    height: 350px
	}
	.mdl-demo-card .mdl-layout__content {
	 	margin: 0 1em;
	}
	.demo-layout .mdl-layout__header .mdl-layout__drawer-button i {
	    margin-top: 12px;
	}
	.mdl-demo-card .mdl-layout__header .mdl-layout__drawer-button i {
	    color: #ffffff;
	}

	body .mdl-card__title {
		display: block;
		height: 190px;
	}
@endsection

@section('content')
	@if (Auth::user()->id == $user->id)
		<div class="mdl-grid full-grid margin-top-0 padding-0">
			<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
				<div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
					<div class="mdl-user-avatar">
						<div id="avatar_selector_avatar" class="avatar-selecter @if($user->profile->avatar_status == 0) active-avatar-selecter @endif">
							<img src="{{ Gravatar::get($user->email) }}" alt="{{ $user->name }}" class="user-avatar">
							<h3 class="mdl-card__title-text mdl-title-username mdl-color-text--white">
								{{ $user->name }}
							</h3>
						</div>
						<div id="avatar_selector_userimage" class="avatar-selecter @if($user->profile->avatar_status == 1) active-avatar-selecter @endif">
							<div class="dz-preview"></div>
							{!! Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}
								@if($user->profile->avatar)
									<img id="user_selected_avatar" class="user-avatar" src="{{ $user->profile->avatar }}" alt="{{ $user->name }}">
								@else
									<div class="user-avatar-icon">
										<i class="material-icons">file_upload</i>
									</div>
								@endif
								<h3 class="mdl-card__title-text mdl-title-username mdl-color-text--white">
									{{ $user->name }}
								</h3>
							{!! Form::close() !!}
						</div>
						<span itemprop="image" style="display:none;">{{ Gravatar::get($user->email) }}</span>
					</div>
					<div id="user_profile_header" class="mdl-card__title mdl-color--primary mdl-color-text--white" @if ($user->profile->user_profile_bg != NULL) style="background: url('{{$user->profile->user_profile_bg}}') center/cover;" @endif>
						{!! Form::open(array('route' => 'background.upload', 'method' => 'POST', 'name' => 'backgroundDropzone','id' => 'backgroundDropzone', 'class' => 'form single-dropzone dropzone single mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-color-text--white', 'files' => true)) !!}
							<i class="material-icons">wallpaper</i>
						{!! Form::close() !!}
					</div>
					{!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name],  'class' => '', 'id' => 'edit_profile_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
						<meta name="_token" content="{!! csrf_token() !!}" />
						<div class="mdl-card__supporting-text">
							<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

								<div class="mdl-tabs__tab-bar">
									<a href="#profile-panel" class="mdl-tabs__tab is-active">
										Profile
									</a>
									<a href="#theme-panel" class="mdl-tabs__tab">
										Theme
									</a>
								</div>

								<div class="mdl-tabs__panel is-active" id="profile-panel">
									<div class="mdl-grid ">
										<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
												{!! Form::text('name', $user->name, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*', 'disabled')) !!}
												{!! Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label')); !!}
												<span class="mdl-textfield__error">Letters and numbers only</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
												{!! Form::email('email', $user->email, array('id' => 'email', 'class' => 'mdl-textfield__input', 'disabled')) !!}
												{!! Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label')); !!}
												<span class="mdl-textfield__error">Please Enter a Valid {{ trans('auth.email') }}</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
												{!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
												{!! Form::label('first_name', trans('auth.first_name') , array('class' => 'mdl-textfield__label')); !!}
												<span class="mdl-textfield__error">Letters only</span>
											</div>
										</div>

									  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('last_name') ? 'is-invalid' :'' }}">
										        {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
										        {!! Form::label('last_name', trans('auth.last_name') , array('class' => 'mdl-textfield__label')); !!}
										        <span class="mdl-textfield__error">Letters only</span>
										    </div>
									  	</div>

									  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
										        {!! Form::text('twitter_username', $user->profile->twitter_username, array('id' => 'twitter_username', 'class' => 'mdl-textfield__input')) !!}
										        {!! Form::label('twitter_username', trans('profile.label-twitter_username') , array('class' => 'mdl-textfield__label')); !!}
										    </div>
									  	</div>

									  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('github_username') ? 'is-invalid' :'' }}">
										        {!! Form::text('github_username', $user->profile->github_username, array('id' => 'github_username', 'class' => 'mdl-textfield__input')) !!}
										        {!! Form::label('github_username', trans('profile.label-github_username') , array('class' => 'mdl-textfield__label')); !!}
										    </div>
									  	</div>

										<div class="mdl-cell mdl-cell--12-col">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('bio') ? 'is-invalid' :'' }}">
										        {!! Form::textarea('bio',  $user->profile->bio, array('id' => 'bio', 'class' => 'mdl-textfield__input')) !!}
										        {!! Form::label('bio', trans('profile.label-bio') , array('class' => 'mdl-textfield__label')); !!}
										    </div>
										</div>
									</div>
									<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
										<div class="mdl-grid ">
											<div class="mdl-cell mdl-cell--12-col">

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('location') ? 'is-invalid' :'' }}">
												    {!! Form::text('location', $user->profile->location, array('id' => 'location', 'class' => 'mdl-textfield__input' )) !!}
												    {!! Form::label('location', trans('profile.label-location') , array('class' => 'mdl-textfield__label')); !!}
													<span class="mdl-textfield__error">Please Enter a Valid Location</span>
												</div>

												@if ($user->profile->location)
													<div class="card-image mdl-card mdl-shadow--2dp">
														<div id="map-canvas"></div>
														<div class="mdl-card__actions mdl-color--primary mdl-color-text--white">
															<p class="mdl-typography--font-light">
																LON: <span id="longitude"></span> / LAT: <span id="latitude"></span>
															</p>
														</div>
													</div>
												@endif

											</div>
										</div>
									</div>
								</div>

								<div class="mdl-tabs__panel" id="theme-panel">
									<div id="color_select_panel">
									    <div class="mdl-gen mdl-cell mdl-cell--12-col">
									        <div class="mdl-grid">
												<div class="mdl-gen__panel mdl-gen__panel--left mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col">
													<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('theme_id') ? 'is-invalid' :'' }}">
															<select class="mdl-selectfield__select mdl-textfield__input" name="theme_id" id="theme_id">
																@if ($themes->count())
																	@foreach($themes as $theme)
																	  <option value="{{ $theme->id }}"{{ $currentTheme->id == $theme->id ? 'selected="selected"' : '' }} data-link="{{ $theme->link }}" >{{ $theme->name }}</option>
																	@endforeach
																@endif
															</select>
													        <label for="theme_id">
													            <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
													        </label>
													        {!! Form::label('theme_id', trans('profile.label-theme'), array('class' => 'mdl-textfield__label mdl-selectfield__label mdl-color-text--primary')); !!}
															@if ($errors->has('theme_id'))
															    <span class="mdl-textfield__error">{{ $errors->first('theme') }}</span>
															@endif
													    </div>
													</div>
													<div class="mdl-gen__cdn mdl-cell mdl-cell--12-col sr-only">
														<div class="code-with-text" id="cdn-code">
															<pre class="demo-code language-markup codepen-button-disabled">
																<code class="language-markup mdl-gen__cdn-link" data-language="markup" id="color_selected">
																	material.$primary-$accent.min.css
																</code>
															</pre>
														</div>
													</div>
													<div id="wheel">
													  	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
													        <defs>
													          	<filter id="drop-shadow">
																	<feGaussianBlur in="SourceAlpha" stdDeviation="3.2" />
																	<feOffset dx="0" dy="0" result="offsetblur" />
																	<feFlood flood-color="rgba(0,0,0,1)" />
																	<feComposite in2="offsetblur" operator="in" />
																	<feMerge>
																	  	<feMergeNode />
																	  	<feMergeNode in="SourceGraphic" />
																	</feMerge>
													          	</filter>
													        </defs>
													    	<g class="wheel--maing"></g>
													  	</svg>
													  	<div class="mdl-gen-download">
													    	<a href="#" id="download" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--fab">
													    		<i class="material-icons">
													    			format_color_fill
													    		</i>
													    	</a>
													  	</div>
													</div>
												</div>

									            <div class="mdl-gen__panel--right mdl-gen__panel mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col">
													<div class="mdl-gen__desc docs-text-styling">
														<strong>
															Custom CSS theme builder
														</strong>
														<p>
															Click on the color wheel to choose a primary (1) and accent (2) color to preview the theme below.
															When you’ve selected a color combination you like, simply click save.
														</p>
													</div>
													<div class="mdl-demo-card mdl-card mdl-shadow--2dp">
				                						<div class="mdl-gen__preview">
				                  							<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
																<header class="mdl-layout__header">
																	<div class="mdl-layout__header-row">
																		<span class="mdl-layout-title">Theme Preview</span>
																	</div>
																</header>
																<div class="mdl-layout__drawer">
																	<span class="mdl-layout-title">Theme Preview</span>
																	<nav class="mdl-navigation">
																		<a class="mdl-navigation__link" href="#">Some</a>
																		<a class="mdl-navigation__link" href="#">Links</a>
																		<a class="mdl-navigation__link" href="#">Here</a>
																	</nav>
																</div>
				                    							<div class="mdl-layout__content">
																	<h4 class="margin-bottom-0">
																		Try it out
																	</h4>
																	<p>
																		Lorem ipsum dolor sit amet.
																	</p>
																	<p>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
																		  Accent
																		</a>
																	  	<a href="#" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">
																	  		Primary
																		</a>
																	</p>
																	<p>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--primary">
																		  Primary
																		</a>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--accent">
																		  Accent
																		</a>
																	</p>
																	<p>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect">
																			<i class="material-icons">email</i>
																		</a>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
																			<i class="material-icons">add</i>
																		</a>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
																			<i class="material-icons">person</i>
																		</a>
																	</p>
				                    							</div>
				                  							</div>
				                						</div>
													</div>
				              					</div>
				            				</div>
				          				</div>
									</div>
			  					</div>

							</div>
						</div>

						<div class="mdl-card__actions padding-top-0 ">
							<div class="mdl-grid padding-top-0">
								<div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0">
									<span class="save-actions start-hidden">
										{!! Form::button(trans('profile.submitChangesButton'), array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect margin-top-1 margin-top-0-desktop')) !!}
									</span>
								</div>
							</div>
						</div>

						<div class="mdl-card__menu">
							<span class="save-actions start-hidden mdl-color-text--white">
								{!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'view profile')) !!}
							</span>
							<a id="avatar_selection_menu" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
							  	<i class="material-icons">more_vert</i>
							</a>
							<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="avatar_selection_menu">
								<li class="mdl-menu__item">
									<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect @if($user->profile->avatar_status == 0) active @endif" for="use_gravatar">
									  	<input type="radio" id="use_gravatar" class="mdl-radio__button" name="avatar_status" value="0" @if($user->profile->avatar_status == 0) checked @endif>
									  	<span class="mdl-radio__label">
									  		Use Gravatar
									  	</span>
									</label>
								</li>
								<li class="mdl-menu__item">
									<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect @if($user->profile->avatar_status == 1) active @endif" for="use_image">
									  	<input type="radio" id="use_image" class="mdl-radio__button" name="avatar_status" value="1" @if($user->profile->avatar_status == 1) checked @endif>
									  	<span class="mdl-radio__label">
									  		Use My Image
									  	</span>
									</label>
								</li>
							</ul>
							<a href="/profile/{{Auth::user()->name}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="view profile">
								<i class="material-icons">person_outline</i>
							</a>
						</div>

						@include('dialogs.dialog-save', ['isAjax' => true])

					{!! Form::close() !!}

				</div>

			</div>
		</div>

	@else
		<p>{{ trans('profile.notYourProfile') }}</p>
	@endif

@endsection

@section('footer_scripts')

	@include('scripts.mdl-required-input-fix')
	@include('scripts.gmaps-address-lookup-api3')
	@include('scripts.google-maps-geocode-and-map')
	@include('scripts.mdl-save-ajax')

	<script type="text/javascript">

		// Profile theme color wheel
		$('#theme_id').change(function(){
			var selectedThemeMenu = $(this).find('option:selected').data('link');
			var themeColors = getThemeColors(selectedThemeMenu);
			for (i = 0; i < 5; i++) {
			    $('.selected--' + i).removeClass('selected selected--' + i);
			}
			init(themeColors.color1, themeColors.color2);
		});
		initColorWheel();

		// Switch Avatar/Gravatar
		var a = elId('avatar_selector_avatar');
		var b = elId('avatar_selector_userimage');
		var x = elId('use_image');
		var y = elId('use_gravatar');
		var da = elId('drawer_avatar');
		x.onclick = function() {
		    a.style.display = "none";
		    b.style.display = "block";
		    var avatarLink = "{{$user->profile->avatar}}";
		    if(avatarLink != "") {
		    	da.src = "{{$user->profile->avatar}}?" + new Date().getTime() + (Math.floor(Math.random() * 1000) * Math.floor(Math.random() * 1000));
		    }
		};
		y.onclick = function() {
		    a.style.display = "block";
		    b.style.display = "none";
		    da.src = "{{ Gravatar::get($user->email) }}";
		};
		function elId(name) {
			return document.getElementById(name);
		}

		// User avatar and profile background dropzone callback actions
		$(document).ready(function(){
			var userBgDropzone = Dropzone.forElement("#backgroundDropzone");
			userBgDropzone.on('success', function() {
				var userBgStamped = "{{$user->profile->user_profile_bg}}?" + new Date().getTime() + (Math.floor(Math.random() * 1000) * Math.floor(Math.random() * 1000));
				var header = $("#user_profile_header");
				header.css("background", ""); //It was not always clearing for PNG images
				header.css("background", "url(" + userBgStamped + ") center/cover");

			});
			var userAvatarDropzone = Dropzone.forElement("#avatarDropzone");
			userAvatarDropzone.on('success', function() {
				var userAvatarStamped = "{{$user->profile->avatar}}?" + new Date().getTime() + (Math.floor(Math.random() * 1000) * Math.floor(Math.random() * 1000));
				var profileAvatar = $("#user_selected_avatar");
				var drawerAvatar = $("#drawer_avatar");
				profileAvatar.attr("src", userAvatarStamped);
				drawerAvatar.attr("src", userAvatarStamped);
			});
		});
	</script>

@endsection
