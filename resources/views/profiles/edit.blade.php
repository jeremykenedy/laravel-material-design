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

  <div class="success message dismissible ajax-success" style="display:none;">
    <i class="material-icons status">warning</i>
    <h4>
        <span id="ajax_success_title"></span>
    </h4>
    <p>
        <span id="ajax_success_message"></span>
    </p>
  </div>

  <div class="error message dismissible ajax-error" style="display:none;">
    <i class="material-icons status">&#xE876;</i>
    <h4>
        Error
    </h4>
    <p>
       <div id="ajax_error_message"></div>
    </p>
  </div>

  <div class="message dismissible ajax-message" style="display:none;">
    <i class="material-icons status" id="ajax_message_icon">&#xE876;</i>
    <h4>
        <span id="ajax_message_title"></span>
    </h4>
    <p>
        <span id="ajax_message_message"></span>
    </p>
  </div>


@section('content')

	@if (Auth::user()->id == $user->id)

		<div class="mdl-grid full-grid margin-top-0 padding-0">
			<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">












	{!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name],  'class' => '', 'id' => 'edit_profile_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}


		<meta name="_token" content="{!! csrf_token() !!}" />






					<div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">

						<div class="mdl-user-avatar">
							<img src="{{ Gravatar::get($user->email) }}" alt="{{ $user->name }}">
							<span itemprop="image" style="display:none;">{{ Gravatar::get($user->email) }}</span>
						</div>

						<div class="mdl-card__title" @if ($user->profile->user_profile_bg != NULL) style="background: url('{{$user->profile->user_profile_bg}}') center/cover;" @endif>

							<div class="file_upload_container">
							    <div class="file_upload_btn">
							     	<label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-color-text--white">
							        	<i class="material-icons">wallpaper</i>

							       		{!! Form::file('user_profile_bg',  array('id' => 'file_upload_btn', 'class' => 'hidden mdl-file-input')) !!}
							      	</label>
							    </div>
							    <div id="file_upload_text_div" class="mdl-textfield mdl-js-textfield">
									<input class="file_upload_text mdl-textfield__input mdl-color-text--white mdl-file-input" type="text" disabled readonly id="file_upload_text" />
									<label class="mdl-textfield__label sr-only" for="file_upload_text">Change Profile Background Image</label>
							    </div>
							</div>

							<h3 class="mdl-card__title-text mdl-title-username">
								{{ $user->name }}
							</h3>
						</div>
						<div class="mdl-card__supporting-text">


<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a href="#profile-panel" class="mdl-tabs__tab">Profile</a>
      <a href="#theme-panel" class="mdl-tabs__tab is-active">Theme</a>
     {{--  <a href="#location-panel" class="mdl-tabs__tab">Location</a> --}}
  </div>

  <div class="mdl-tabs__panel" id="profile-panel">








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


								<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-grid ">
										<div class="mdl-cell mdl-cell--12-col">
											<div class="col-sm-5 col-sm-offset-4 margin-bottom-1">
												<div class="row" data-toggle="buttons">
													<div class="col-xs-6 right-btn-container">
														<label class="btn btn-primary @if($user->profile->avatar_status == 0) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne:not(.in), .collapseTwo.in">
															<input type="radio" name="avatar_status" id="option1" autocomplete="off" value="0" @if($user->profile->avatar_status == 0) checked @endif> Use Gravatar
														</label>
													</div>
													<div class="col-xs-6 left-btn-container">
														<label class="btn btn-primary @if($user->profile->avatar_status == 1) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne.in, .collapseTwo:not(.in)">
															<input type="radio" name="avatar_status" id="option2" autocomplete="off" value="1" @if($user->profile->avatar_status == 1) checked @endif> Use My Image
														</label>
													</div>
												</div>
											</div>
										</div>
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
  <div class="mdl-tabs__panel is-active" id="theme-panel">








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
				                  <strong>Custom CSS theme builder</strong>
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
				                      <h4 class="margin-bottom-0">Try it out</h4>
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

{{--
 				              <div class="mdl-gen__cdn mdl-cell mdl-cell--12-col">
				                <div class="code-with-text" id="cdn-code">
				                  <pre class="demo-code language-markup codepen-button-disabled"><code class="language-markup mdl-gen__cdn-link" data-language="markup" id="color_selected">material.$primary-$accent.min.css</code></pre>
				                </div>
				              </div>
--}}

				          </div>



				</div>
















  </div>

{{--
  <div class="mdl-tabs__panel" id="location-panel">






  </div>
 --}}
</div>

						</div>

					    <div class="mdl-card__actions padding-top-0">
							<div class="mdl-grid padding-top-0">
								<div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0">
									<span class="save-actions start-hidden">
										{!! Form::button(trans('profile.submitChangesButton'), array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect margin-top-1 margin-top-0-desktop')) !!}
									</span>
								</div>
							</div>
					    </div>
					    <div class="mdl-card__menu">
					    	<span class="save-actions start-hidden">
								{!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'view profile')) !!}
							</span>
							<a href="/profile/{{Auth::user()->name}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="view profile">
								<i class="material-icons">person_outline</i>
							</a>
					    </div>
					</div>

{{--

<dialog id="dialog" class="mdl-dialog padding-0 ajax-dialog">
	<i class="material-icons status mdl-color--white mdl-color-text--green">check</i>
  	<h3 class="mdl-dialog__title mdl-color--green mdl-color-text--white text-center-only padding-half-1">
  		{{ trans('dialogs.confirm_modal_title_save_msg') }}
  	</h3>
	<div class="mdl-dialog__actions block padding-1-half ">
		<div class="mdl-grid ">
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
				{!! Form::button(trans('dialogs.confirm_modal_button_cancel_text'), array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--grey-400 mdl-color-text--white dialog-close dialog-delete-close block full-span')) !!}
			</div>
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
				{!! Form::button('<span class="mdl-spinner-text">'.trans('dialogs.confirm_modal_button_save_text').'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--green mdl-color-text--white mdl-button--raised full-span','type' => 'submit','id' => 'submit')) !!}
			</div>
		</div>
  	</div>
</dialog>

 --}}


{{--
					@include('dialogs.dialog-save')

 --}}


@include('dialogs.dialog-save', ['isAjax' => true])




				{!! Form::close() !!}

			</div>
		</div>

	@else
		<p>{{ trans('profile.notYourProfile') }}</p>
	@endif












<style type="text/css">

	#wheel {
	    position: relative;
	}

	#wheel svg {
		width: 100%;
		height: auto;
	}

	#wheel .polygons {
		cursor: pointer;
	}

	.mdl-gen-download {
		pointer-events: none;
		cursor: default;
	}

	@media (min-width:840px) {
	    #wheel svg {
	        max-width: 100%;
	        width: 100%
	    }
	}

	#wheel .mdl-gen-download {
	    position: absolute;
	    left: 50%;
	    top: 50%
	}

	#wheel .mdl-gen-download .mdl-button {
	    -webkit-transform: translate(-50%, -50%);
	    transform: translate(-50%, -50%)
	}

	#wheel g[data-color] {
	    opacity: 1;
	    transition: opacity .2s cubic-bezier(.4, 0, 1, 1)
	}

	#wheel .selector {
	    opacity: 0;
	    transition: opacity .4s cubic-bezier(.4, 0, 1, 1);
	    fill: #BDBDBD
	}

	#wheel .selected .selector {
	    opacity: 1
	}

	#wheel .label {
	    text-anchor: middle;
	    opacity: 0;
	    transition: opacity .4s cubic-bezier(.4, 0, 1, 1);
	    fill: #fff;
	    font-size: 24px
	}
	#wheel .selected--1 .label--1,
	#wheel .selected--2 .label--2 {
	    opacity: 1
	}
	#wheel svg.hide-nonaccents g[data-color="Blue Grey"]:not(.selected),
	#wheel svg.hide-nonaccents g[data-color="Brown"]:not(.selected),
	#wheel svg.hide-nonaccents g[data-color="Grey"]:not(.selected) {
	    opacity: .12
	}
	#wheel .selected {
	    opacity: 1 !important
	}
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

</style>










	{{--
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">

							<div class="btn-group pull-right btn-group-xs">

								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
									<span class="sr-only">{{ trans('profile.editTriggerAlt') }}</span>
								</button>

								<ul class="dropdown-menu">
									<li class="active">
										<a data-toggle="pill" href=".edit_profile" class="profile-trigger">
											{{ trans('profile.editProfileTitle') }}
										</a>
									</li>
									<li>
										<a data-toggle="pill" href=".edit_settings" class="settings-trigger">
											{{ trans('profile.editAccountTitle') }}
										</a>
									</li>
									<li>
										<a data-toggle="pill" href=".edit_account" class="admin-trigger">
											{{ trans('profile.editAccountAdminTitle') }}
										</a>
									</li>
								</ul>
							</div>

							<div class="tab-content">
								<span class="tab-pane active edit_profile">
									{{ trans('profile.editProfileTitle') }}
								</span>
								<span class="tab-pane edit_settings">
									{{ trans('profile.editAccountTitle') }}
								</span>
								<span class="tab-pane edit_account">
									{{ trans('profile.editAccountAdminTitle') }}
								</span>
							</div>

						</div>
						<div class="panel-body">

							@if ($user->profile)

								@if (Auth::user()->id == $user->id)

									<div class="tab-content">

										<div class="tab-pane fade in active edit_profile">

											<div class="row">
												<div class="col-sm-12">
													<div id="avatar_container">
														<div class="collapseOne panel-collapse collapse @if($user->profile->avatar_status == 0) in @endif">
															<div class="panel-body">
																<img src="{{  Gravatar::get($user->email) }}" alt="{{ $user->name }}" class="user-avatar">
															</div>
														</div>
														<div class="collapseTwo panel-collapse collapse @if($user->profile->avatar_status == 1) in @endif">
															<div class="panel-body">

																<div class="dz-preview"></div>

																{!! Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)) !!}

																	<img id="user_selected_avatar" class="user-avatar" src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatar }} @endif" alt="{{ $user->name }}">

																{!! Form::close() !!}

															</div>
														</div>
													</div>
												</div>
											</div>

											{!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name],  'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data'  ]) !!}

												{{ csrf_field() }}

												<div class="row">
													<div class="col-sm-5 col-sm-offset-4 margin-bottom-1">
														<div class="row" data-toggle="buttons">
															<div class="col-xs-6 right-btn-container">
																<label class="btn btn-primary @if($user->profile->avatar_status == 0) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne:not(.in), .collapseTwo.in">
																	<input type="radio" name="avatar_status" id="option1" autocomplete="off" value="0" @if($user->profile->avatar_status == 0) checked @endif> Use Gravatar
																</label>
															</div>
															<div class="col-xs-6 left-btn-container">
																<label class="btn btn-primary @if($user->profile->avatar_status == 1) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne.in, .collapseTwo:not(.in)">
																	<input type="radio" name="avatar_status" id="option2" autocomplete="off" value="1" @if($user->profile->avatar_status == 1) checked @endif> Use My Image
																</label>
															</div>
														</div>
													</div>
												</div>


												<div class="form-group has-feedback {{ $errors->has('theme') ? ' has-error ' : '' }}">
													{!! Form::label('theme', trans('profile.label-theme') , array('class' => 'col-sm-4 control-label')); !!}
													<div class="col-sm-6">

														<select class="form-control" name="theme_id" id="theme_id">
															@if ($themes->count())
																@foreach($themes as $theme)
																  <option value="{{ $theme->id }}"{{ $currentTheme->id == $theme->id ? 'selected="selected"' : '' }}>{{ $theme->name }}</option>
																@endforeach
															@endif
														</select>

														<span class="glyphicon {{ $errors->has('theme') ? ' glyphicon-asterisk ' : ' ' }} form-control-feedback" aria-hidden="true"></span>

												        @if ($errors->has('theme'))
												            <span class="help-block">
												                <strong>{{ $errors->first('theme') }}</strong>
												            </span>
												        @endif

													</div>
												</div>

												<div class="form-group has-feedback {{ $errors->has('location') ? ' has-error ' : '' }}">
													{!! Form::label('location', trans('profile.label-location') , array('class' => 'col-sm-4 control-label')); !!}
													<div class="col-sm-6">
														{!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => trans('profile.ph-location'))) !!}
														<span class="glyphicon {{ $errors->has('location') ? ' glyphicon-asterisk ' : ' glyphicon-pencil ' }} form-control-feedback" aria-hidden="true"></span>
												        @if ($errors->has('location'))
												            <span class="help-block">
												                <strong>{{ $errors->first('location') }}</strong>
												            </span>
												        @endif
													</div>
												</div>

												<div class="form-group has-feedback {{ $errors->has('bio') ? ' has-error ' : '' }}">
													{!! Form::label('bio', trans('profile.label-bio') , array('class' => 'col-sm-4 control-label')); !!}
													<div class="col-sm-6">
														{!! Form::textarea('bio', old('bio'), array('id' => 'bio', 'class' => 'form-control', 'placeholder' => trans('profile.ph-bio'))) !!}
														<span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
												        @if ($errors->has('bio'))
												            <span class="help-block">
												                <strong>{{ $errors->first('bio') }}</strong>
												            </span>
												        @endif
													</div>
												</div>

												<div class="form-group has-feedback {{ $errors->has('twitter_username') ? ' has-error ' : '' }}">
													{!! Form::label('twitter_username', trans('profile.label-twitter_username') , array('class' => 'col-sm-4 control-label')); !!}
													<div class="col-sm-6">
														{!! Form::text('twitter_username', old('twitter_username'), array('id' => 'twitter_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-twitter_username'))) !!}
														<span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
												        @if ($errors->has('twitter_username'))
												            <span class="help-block">
												                <strong>{{ $errors->first('twitter_username') }}</strong>
												            </span>
												        @endif
													</div>
												</div>

												<div class="margin-bottom-2 form-group has-feedback {{ $errors->has('github_username') ? ' has-error ' : '' }}">
													{!! Form::label('github_username', trans('profile.label-github_username') , array('class' => 'col-sm-4 control-label')); !!}
													<div class="col-sm-6">
														{!! Form::text('github_username', old('github_username'), array('id' => 'github_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-twitter_username'))) !!}
														<span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
												        @if ($errors->has('github_username'))
												            <span class="help-block">
												                <strong>{{ $errors->first('github_username') }}</strong>
												            </span>
												        @endif
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-6 col-sm-offset-4">

														{!! Form::button(
															'<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitButton'),
															 array(
																'class' 		 	=> 'btn btn-success disableddd',
																'type' 			 	=> 'button',
																'data-target' 		=> '#confirmForm',
																'data-modalClass' 	=> 'modal-success',
																'data-toggle' 		=> 'modal',
																'data-title' 		=> trans('modals.edit_user__modal_text_confirm_title'),
																'data-message' 		=> trans('modals.edit_user__modal_text_confirm_message')
														)) !!}

													</div>
												</div>

											{!! Form::close() !!}

										</div>

										<div class="tab-pane fade edit_settings">

											{!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'id' => 'user_basics_form')) !!}

												{!! csrf_field() !!}

									            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
									                {!! Form::label('name', 'Username' , array('class' => 'col-md-3 control-label')); !!}
									                <div class="col-md-9">
									                  	<div class="input-group">
									                    	{!! Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.ph-username'))) !!}
									                    	<label class="input-group-addon" for="name"><i class="fa fa-fw fa-user }}" aria-hidden="true"></i></label>
									                  	</div>
									                </div>
									            </div>

									            <div class="form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
									                {!! Form::label('email', 'E-mail' , array('class' => 'col-md-3 control-label')); !!}
									                <div class="col-md-9">
									                  	<div class="input-group">
									                    	{!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.ph-useremail'))) !!}
									                    	<label class="input-group-addon" for="email"><i class="fa fa-fw fa-envelope " aria-hidden="true"></i></label>
									                  	</div>
									                </div>
									            </div>

									            <div class="form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
									                {!! Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
									                <div class="col-md-9">
									                  	<div class="input-group">
									                    	{!! Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
									                    	<label class="input-group-addon" for="first_name"><i class="fa fa-fw {{ trans('forms.create_user_icon_firstname') }}" aria-hidden="true"></i></label>
									                  	</div>
									                  	@if ($errors->has('first_name'))
									                    	<span class="help-block">
									                        	<strong>{{ $errors->first('first_name') }}</strong>
									                    	</span>
									                  	@endif
									                </div>
									            </div>

									            <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
									                {!! Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
									                <div class="col-md-9">
									                  	<div class="input-group margin-bottom-1">
									                    	{!! Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
									                    	<label class="input-group-addon" for="last_name"><i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i></label>
									                  	</div>
									                  	@if ($errors->has('last_name'))
									                    	<span class="help-block">
									                        	<strong>{{ $errors->first('last_name') }}</strong>
									                    	</span>
									                  	@endif
									                </div>
									            </div>

											    <div class="form-group row">
												    <div class="col-md-9 col-md-offset-3">
														{!! Form::button(
															'<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitProfileButton'),
															 array(
																'class' 		 	=> 'btn btn-success',
																'id' 				=> 'account_save_trigger',
																'disabled'			=> true,
																'type' 			 	=> 'button',
																'data-submit'       => trans('profile.submitProfileButton'),
																'data-target' 		=> '#confirmForm',
																'data-modalClass' 	=> 'modal-success',
																'data-toggle' 		=> 'modal',
																'data-title' 		=> trans('modals.edit_user__modal_text_confirm_title'),
																'data-message' 		=> trans('modals.edit_user__modal_text_confirm_message')
														)) !!}
													</div>
												</div>

											{!! Form::close() !!}

										</div>

										<div class="tab-pane fade edit_account">

											<ul class="nav nav-pills nav-justified margin-bottom-3">
												<li class="bg-info change-pw active">
													<a data-toggle="pill" href="#changepw" class="warning-pill-trigger">
														{{ trans('profile.changePwPill') }}
													</a>
												</li>
												<li class="bg-info delete-account">
													<a data-toggle="pill" href="#deleteAccount" class="danger-pill-trigger">
														{{ trans('profile.deleteAccountPill') }}
													</a>
												</li>
											</ul>

											<div class="tab-content">

											    <div id="changepw" class="tab-pane fade in active">

													<h3 class="margin-bottom-1">
														{{ trans('profile.changePwTitle') }}
													</h3>

													{!! Form::model($user, array('action' => array('ProfilesController@updateUserPassword', $user->id), 'method' => 'PUT', 'autocomplete' => 'new-password')) !!}

													    <div class="pw-change-container margin-bottom-2">

															<div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
															  	{!! Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label')); !!}
															  	<div class="col-md-9">
																	{!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'), 'autocomplete' => 'new-password')) !!}
															        @if ($errors->has('password'))
															            <span class="help-block">
															                <strong>{{ $errors->first('password') }}</strong>
															            </span>
															        @endif
															  	</div>
															</div>

													        <div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
													          	{!! Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label')); !!}
													          	<div class="col-md-9">
													              	{!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
																	<span id="pw_status"></span>
																	@if ($errors->has('password_confirmation'))
																	    <span class="help-block">
																	        <strong>{{ $errors->first('password_confirmation') }}</strong>
																	    </span>
																	@endif
													          	</div>
													        </div>
													    </div>

													    <div class="form-group row">
														    <div class="col-md-9 col-md-offset-3">
																{!! Form::button(
																	'<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitPWButton'),
																	 array(
																		'class' 		 	=> 'btn btn-warning',
																		'id' 				=> 'pw_save_trigger',
																		'disabled'			=> true,
																		'type' 			 	=> 'button',
																		'data-submit'       => trans('profile.submitButton'),
																		'data-target' 		=> '#confirmForm',
																		'data-modalClass' 	=> 'modal-warning',
																		'data-toggle' 		=> 'modal',
																		'data-title' 		=> trans('modals.edit_user__modal_text_confirm_title'),
																		'data-message' 		=> trans('modals.edit_user__modal_text_confirm_message')
																)) !!}
															</div>
														</div>
													{!! Form::close() !!}

		    									</div>

											    <div id="deleteAccount" class="tab-pane fade">

											      	<h3 class="margin-bottom-1 text-center text-danger">
											      		{{ trans('profile.deleteAccountTitle') }}
											      	</h3>
											      	<p class="margin-bottom-2 text-center">
														<i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
															<strong>Deleting</strong> your account is <u><strong>permanent</strong></u> and <u><strong>cannot</strong></u> be undone.
														<i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
											      	</p>

													<hr>

													<div class="row">
														<div class="col-sm-6 col-sm-offset-3 margin-bottom-3 text-center">

															{!! Form::model($user, array('action' => array('ProfilesController@deleteUserAccount', $user->id), 'method' => 'DELETE')) !!}

																<div class="btn-group btn-group-vertical margin-bottom-2" data-toggle="buttons">
																	<label class="btn no-shadow" for="checkConfirmDelete" >
																		<input type="checkbox" name='checkConfirmDelete' id="checkConfirmDelete">
																		<i class="fa fa-square-o fa-fw fa-2x"></i>
																		<i class="fa fa-check-square-o fa-fw fa-2x"></i>
																		<span class="margin-left-2"> Confirm Account Deletion</span>
																	</label>
																</div>

															    {!! Form::button(
															    	'<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> ' . trans('profile.deleteAccountBtn'),
																	array(
																		'class' 			=> 'btn btn-block btn-danger',
																		'id' 				=> 'delete_account_trigger',
																		'disabled'			=> true,
																		'type' 				=> 'button',
																		'data-toggle' 		=> 'modal',
																		'data-submit'       => trans('profile.deleteAccountBtnConfirm'),
																		'data-target' 		=> '#confirmForm',
																		'data-modalClass' 	=> 'modal-danger',
																		'data-title' 		=> trans('profile.deleteAccountConfirmTitle'),
																		'data-message' 		=> trans('profile.deleteAccountConfirmMsg')
																	)
															    ) !!}

															{!! Form::close() !!}

														</div>
													</div>
											    </div>
											</div>
										</div>
									</div>

								@else

									<p>{{ trans('profile.notYourProfile') }}</p>

								@endif
							@else

								<p>{{ trans('profile.noProfileYet') }}</p>

							@endif

						</div>
					</div>
				</div>
			</div>
		</div>

		@include('modals.modal-form')
	--}}

@endsection

@section('footer_scripts')

	@include('scripts.mdl-required-input-fix')
	@include('scripts.gmaps-address-lookup-api3')
	@include('scripts.google-maps-geocode-and-map')
	@include('scripts.mdl-file-upload')

	<script type="text/javascript">

		mdl_dialog('.dialog-button-save');
		mdl_dialog('.dialog-icon-save');

		$('form input, form select, form textarea').on('input', function() {
		    $('.save-actions').show();
		});

		$('.mdl-select-input, .mdl-file-input').change(function(event) {
			$('.save-actions').show();
		});

	</script>



	{{--
		@include('scripts.form-modal-script')
		@include('scripts.gmaps-address-lookup-api3')
		@include('scripts.user-avatar-dz')

		<script type="text/javascript">

			$('.dropdown-menu li a').click(function() {
				$('.dropdown-menu li').removeClass('active');
			});

			$('.profile-trigger').click(function() {
				$('.panel').alterClass('panel-*', 'panel-default');
			});

			$('.settings-trigger').click(function() {
				$('.panel').alterClass('panel-*', 'panel-info');
			});

			$('.admin-trigger').click(function() {
				$('.panel').alterClass('panel-*', 'panel-warning');
				$('.edit_account .nav-pills li, .edit_account .tab-pane').removeClass('active');
				$('#changepw')
					.addClass('active')
					.addClass('in');
				$('.change-pw').addClass('active');
			});

			$('.warning-pill-trigger').click(function() {
				$('.panel').alterClass('panel-*', 'panel-warning');
			});

			$('.danger-pill-trigger').click(function() {
				$('.panel').alterClass('panel-*', 'panel-danger');
			});

			$('#user_basics_form').on('keyup change', 'input, select, textarea', function(){
			    $('#account_save_trigger').attr('disabled', false);
			});

			$('#checkConfirmDelete').change(function() {
			    var submitDelete = $('#delete_account_trigger');
			    var self = $(this);

			    if (self.is(':checked')) {
			        submitDelete.attr('disabled', false);
			    }
			    else {
			    	submitDelete.attr('disabled', true);
			    }
			});

			$("#password_confirmation").keyup(function() {
				checkPasswordMatch();
			});

			$("#password, #password_confirmation").keyup(function() {
				enableSubmitPWCheck();
			});

			$('#password, #password_confirmation').hidePassword(true);

			$('#password').password({
				shortPass: 'The password is too short',
				badPass: 'Weak - Try combining letters & numbers',
				goodPass: 'Medium - Try using special charecters',
				strongPass: 'Strong password',
				containsUsername: 'The password contains the username',
				enterPass: false,
				showPercent: false,
				showText: true,
				animate: true,
				animateSpeed: 50,
				username: false, // select the username field (selector or jQuery instance) for better password checks
				usernamePartialMatch: true,
				minimumLength: 6
			});

			function checkPasswordMatch() {
			    var password = $("#password").val();
			    var confirmPassword = $("#password_confirmation").val();
			    if (password != confirmPassword) {
			        $("#pw_status").html("Passwords do not match!");
			    }
			    else {
			        $("#pw_status").html("Passwords match.");
			    }
			}

			function enableSubmitPWCheck() {
			    var password = $("#password").val();
			    var confirmPassword = $("#password_confirmation").val();
			    var submitChange = $('#pw_save_trigger');
			    if (password != confirmPassword) {
			       	submitChange.attr('disabled', true);
			    }
			    else {
			        submitChange.attr('disabled', false);
			    }
			}

		</script>
	--}}







<script type="text/javascript">

	$(".mdl-dialog.ajax-dialog button[type='submit']").click(function(event) {
		var formData = $('#edit_profile_form').serializeArray();
		var fadeSpeed = 150;
	    $.ajax({
			url: '/profile/{{$user->name}}/updateAjax',
			type: "post",
			dataType: 'json',
			data: {'username':'{{ $user->name }}', formData},
			success: function(request, status, data){
				dialog.close();

				$('#ajax_message_title').text(request.title);
				$('#ajax_message_message').text(request.message);
				$('#ajax_message_icon').text('check');
				$('.message.ajax-message').addClass('success')
				$('.message.ajax-message').fadeIn(fadeSpeed, function() {
					$(this).css({
						opacity: 1,
						left: 0
					});
				});;
				$('#user_theme_link').attr('href', '/css/mdl-themes/'+ request.themeLink);
			},
			error: function (request, status, error) {
				console.log(error);
				console.log(request);
				console.log(status);
				dialog.close();
				$('#ajax_error_message').text(request.responseText);
				$('.ajax-error.message').fadeIn(fadeSpeed, function() {
					$(this).css({
						opacity: 1,
						left: 0
					});
				});;
			}
	    });
	});

	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});




	// var fileInputTextDiv = document.getElementById('file_upload_text_div');
	// var fileInput = document.getElementById('file_upload_btn');
	// var fileInputText = document.getElementById('file_upload_text');
	// fileInput.addEventListener('change', changeInputText);
	// fileInput.addEventListener('change', changeState);

	// function changeInputText() {
	//   var str = fileInput.value;
	//   var i;
	//   if (str.lastIndexOf('\\')) {
	//     i = str.lastIndexOf('\\') + 1;
	//   } else if (str.lastIndexOf('/')) {
	//     i = str.lastIndexOf('/') + 1;
	//   }
	//   fileInputText.value = str.slice(i, str.length);
	// }

	// function changeState() {
	//   if (fileInputText.value.length != 0) {
	//     if (!fileInputTextDiv.classList.contains("is-focused")) {
	//       fileInputTextDiv.classList.add('is-focused');
	//     }
	//   } else {
	//     if (fileInputTextDiv.classList.contains("is-focused")) {
	//       fileInputTextDiv.classList.remove('is-focused');
	//     }
	//   }
	// }




	function init(color1, color2) {

		var color1 = color1 || 'Indigo';
		var color2 = color2 || 'Pink';

	    "use strict";
	    var e = document.querySelector("#wheel > svg"),
	        t = document.querySelector(".mdl-gen__cdn .mdl-gen__cdn-link"),
	        a = new MaterialCustomizer(e, t),
	        r = document.querySelector("#download");
	    r.addEventListener("click", function() {
	        window.navigator.msSaveBlob && window.navigator.msSaveBlob(this.blob, "material.min.cssffffff")
	    }.bind(a)), r.addEventListener("click", function() {
	        ga("send", {
	            hitType: "event",
	            eventCategory: "customizer",
	            eventAction: "download",
	            eventLabel: a.getSelectedPrimary() + "-" + a.getSelectedSecondary()
	        })
	    });
	    var n = 0;
	    t.addEventListener("click", function() {
	        var e = window.getSelection();
	        e.removeAllRanges();
	        var a = document.createRange();
	        if (0 === n) {
	            var r = t.querySelectorAll(".token.attr-value")[1];
	            a.setStart(r, 2), a.setEnd(r, 3)
	        } else a.setStart(t, 1), a.setEnd(t, 2);
	        e.addRange(a), n = (n + 1) % 2
	    }), t.addEventListener("mouseup", function(e) {
	        e.preventDefault()
	    }), t.addEventListener("mousedown", function(e) {
	        e.preventDefault()
	    }), document.addEventListener("mouseup", function() {
	        window.getSelection().toString().indexOf(".min.css") !== -1 && ga("send", {
	            hitType: "event",
	            eventCategory: "customizer",
	            eventAction: "copy",
	            eventLabel: a.getSelectedPrimary() + "-" + a.getSelectedSecondary()
	        })
	    });
	    var i = new XMLHttpRequest;
	    i.onload = function() {
	        a.template = this.responseText, a.highlightField(color1), a.highlightField(color2), window.requestAnimationFrame(function() {
	            a.updateCDN(), a.updateStylesheet()
	        })
	    }, i.open("get", "../../material.min.css.template", !0), i.send()
	}

	MaterialCustomizer = function() {
	    "use strict";

	    function e(e) {
	        return e.parentElement || e.parentNode
	    }
	    var t = ["Cyan", "Teal", "Green", "Light Green", "Lime", "Yellow", "Amber", "Orange", "Brown", "Blue Grey", "Grey", "Deep Orange", "Red", "Pink", "Purple", "Deep Purple", "Indigo", "Blue", "Light Blue"],
	        a = ["Blue Grey", "Brown", "Grey"],
	        r = ["Red", "Pink", "Purple", "Deep Purple", "Indigo", "Blue", "Light Blue", "Cyan", "Teal", "Green", "Light Green", "Lime", "Yellow", "Amber", "Orange", "Deep Orange", "Brown", "Grey", "Blue Grey"],
	        n = ["50", "100", "200", "300", "400", "500", "600", "700", "800", "900", "A100", "A200", "A400", "A700"],
	        i = [
	            ["255,235,238", "255,205,210", "239,154,154", "229,115,115", "239,83,80", "244,67,54", "229,57,53", "211,47,47", "198,40,40", "183,28,28", "255,138,128", "255,82,82", "255,23,68", "213,0,0"],
	            ["252,228,236", "248,187,208", "244,143,177", "240,98,146", "236,64,122", "233,30,99", "216,27,96", "194,24,91", "173,20,87", "136,14,79", "255,128,171", "255,64,129", "245,0,87", "197,17,98"],
	            ["243,229,245", "225,190,231", "206,147,216", "186,104,200", "171,71,188", "156,39,176", "142,36,170", "123,31,162", "106,27,154", "74,20,140", "234,128,252", "224,64,251", "213,0,249", "170,0,255"],
	            ["237,231,246", "209,196,233", "179,157,219", "149,117,205", "126,87,194", "103,58,183", "94,53,177", "81,45,168", "69,39,160", "49,27,146", "179,136,255", "124,77,255", "101,31,255", "98,0,234"],
	            ["232,234,246", "197,202,233", "159,168,218", "121,134,203", "92,107,192", "63,81,181", "57,73,171", "48,63,159", "40,53,147", "26,35,126", "140,158,255", "83,109,254", "61,90,254", "48,79,254"],
	            ["227,242,253", "187,222,251", "144,202,249", "100,181,246", "66,165,245", "33,150,243", "30,136,229", "25,118,210", "21,101,192", "13,71,161", "130,177,255", "68,138,255", "41,121,255", "41,98,255"],
	            ["225,245,254", "179,229,252", "129,212,250", "79,195,247", "41,182,246", "3,169,244", "3,155,229", "2,136,209", "2,119,189", "1,87,155", "128,216,255", "64,196,255", "0,176,255", "0,145,234"],
	            ["224,247,250", "178,235,242", "128,222,234", "77,208,225", "38,198,218", "0,188,212", "0,172,193", "0,151,167", "0,131,143", "0,96,100", "132,255,255", "24,255,255", "0,229,255", "0,184,212"],
	            ["224,242,241", "178,223,219", "128,203,196", "77,182,172", "38,166,154", "0,150,136", "0,137,123", "0,121,107", "0,105,92", "0,77,64", "167,255,235", "100,255,218", "29,233,182", "0,191,165"],
	            ["232,245,233", "200,230,201", "165,214,167", "129,199,132", "102,187,106", "76,175,80", "67,160,71", "56,142,60", "46,125,50", "27,94,32", "185,246,202", "105,240,174", "0,230,118", "0,200,83"],
	            ["241,248,233", "220,237,200", "197,225,165", "174,213,129", "156,204,101", "139,195,74", "124,179,66", "104,159,56", "85,139,47", "51,105,30", "204,255,144", "178,255,89", "118,255,3", "100,221,23"],
	            ["249,251,231", "240,244,195", "230,238,156", "220,231,117", "212,225,87", "205,220,57", "192,202,51", "175,180,43", "158,157,36", "130,119,23", "244,255,129", "238,255,65", "198,255,0", "174,234,0"],
	            ["255,253,231", "255,249,196", "255,245,157", "255,241,118", "255,238,88", "255,235,59", "253,216,53", "251,192,45", "249,168,37", "245,127,23", "255,255,141", "255,255,0", "255,234,0", "255,214,0"],
	            ["255,248,225", "255,236,179", "255,224,130", "255,213,79", "255,202,40", "255,193,7", "255,179,0", "255,160,0", "255,143,0", "255,111,0", "255,229,127", "255,215,64", "255,196,0", "255,171,0"],
	            ["255,243,224", "255,224,178", "255,204,128", "255,183,77", "255,167,38", "255,152,0", "251,140,0", "245,124,0", "239,108,0", "230,81,0", "255,209,128", "255,171,64", "255,145,0", "255,109,0"],
	            ["251,233,231", "255,204,188", "255,171,145", "255,138,101", "255,112,67", "255,87,34", "244,81,30", "230,74,25", "216,67,21", "191,54,12", "255,158,128", "255,110,64", "255,61,0", "221,44,0"],
	            ["239,235,233", "215,204,200", "188,170,164", "161,136,127", "141,110,99", "121,85,72", "109,76,65", "93,64,55", "78,52,46", "62,39,35"],
	            ["250,250,250", "245,245,245", "238,238,238", "224,224,224", "189,189,189", "158,158,158", "117,117,117", "97,97,97", "66,66,66", "33,33,33"],
	            ["236,239,241", "207,216,220", "176,190,197", "144,164,174", "120,144,156", "96,125,139", "84,110,122", "69,90,100", "55,71,79", "38,50,56"]
	        ],
	        l = function(e, t) {
	            this.wheel = e, this.cdn = t, this.cdn && (this.cdnTpl = t.textContent), this.paletteIndices = r, this.lightnessIndices = n, this.palettes = i, this.init_()
	        };
	    return l.prototype.init_ = function() {
	            this.config = {
	                width: 650,
	                height: 650,
	                r: 250,
	                ri: 100,
	                hd: 40,
	                c: 40,
	                mrs: .5,
	                alphaIncr: .005,
	                colors: t
	            }, this.forbiddenAccents = a, this.calculateValues_(), this.wheel && this.buildWheel_()
	        }, l.prototype.calculateValues_ = function() {
	            var e = this.config;
	            e.alphaDeg = 360 / e.colors.length, e.alphaRad = e.alphaDeg * Math.PI / 180, e.rs = (e.c + e.r) * Math.sin(e.alphaRad / 2), e.rs *= e.mrs, e.selectorAlphaRad = 2 * Math.atan(e.rs / e.c), e.gamma1 = e.alphaRad / 2 - e.selectorAlphaRad / 2, e.gamma2 = e.alphaRad / 2 + e.selectorAlphaRad / 2, e.cx = (e.c + e.r) * Math.sin(e.alphaRad) / 2, e.cy = -(e.c + e.r) * (1 + Math.cos(e.alphaRad)) / 2, this.config = e
	        }, l.prototype.buildWheel_ = function() {
	            var e = this.config,
	                t = this.wheel.querySelector("g.wheel--maing"),
	                a = this.wheel.parentNode;
	            this.wheel.setAttribute("viewBox", "0 0 " + this.config.width + " " + this.config.height), this.wheel.setAttribute("preserveAspectRatio", "xMidYMid meet"), this.wheel.setAttribute("width", this.config.width), this.wheel.setAttribute("height", this.config.height);
	            var r = this.generateFieldTemplate_(),
	                n = "http://www.w3.org/2000/svg";
	            e.colors.forEach(function(i, l) {
	                for (var o = r.cloneNode(!0), s = document.createElement("div"), c = 1; c <= 2; c++) {
	                    var h = document.createElementNS(n, "g"),
	                        d = document.createElementNS(n, "text");
	                    d.setAttribute("class", "label label--" + c), d.setAttribute("transform", "rotate(" + -e.alphaDeg * l + ")"), d.setAttribute("dy", "0.5ex"), d.textContent = "" + c, h.appendChild(d), h.setAttribute("transform", "translate(" + e.cx + "," + e.cy + ")"), o.appendChild(h)
	                }
	                o.setAttribute("data-color", i), o.id = i, o.querySelector(".polygons > *:nth-child(1)").style.fill = "rgb(" + this.getColor(i, "500") + ")", o.querySelector(".polygons > *:nth-child(2)").style.fill = "rgb(" + this.getColor(i, "700") + ")", o.querySelector(".polygons").addEventListener("click", this.fieldClicked_.bind(this)), o.setAttribute("transform", "rotate(" + e.alphaDeg * l + ")"), t.appendChild(o), s.setAttribute("for", i), s.className = "mdl-tooltip mdl-tooltip--large", s.innerHTML = i, a.appendChild(s)
	            }.bind(this)), t.setAttribute("transform", "translate(" + e.width / 2 + "," + e.height / 2 + ")")
	        }, l.prototype.generateFieldTemplate_ = function() {
	            var e = "http://www.w3.org/2000/svg",
	                t = this.config,
	                a = document.createElementNS(e, "g"),
	                r = document.createElementNS(e, "g"),
	                n = document.createElementNS(e, "polygon");
	            n.setAttribute("points", [
	                [t.ri * Math.sin(t.alphaRad + t.alphaIncr), -t.ri * Math.cos(t.alphaRad + t.alphaIncr)].join(","), [t.r * Math.sin(t.alphaRad + t.alphaIncr), -t.r * Math.cos(t.alphaRad + t.alphaIncr)].join(","), [0, -t.r].join(","), [0, -(t.ri + t.hd)].join(",")
	            ].join(" "));
	            var i = document.createElementNS(e, "polygon");
	            i.setAttribute("points", [
	                [t.ri * Math.sin(t.alphaRad + t.alphaIncr), -t.ri * Math.cos(t.alphaRad + t.alphaIncr)].join(","), [(t.ri + t.hd) * Math.sin(t.alphaRad + t.alphaIncr), -(t.ri + t.hd) * Math.cos(t.alphaRad + t.alphaIncr)].join(","), [0, -(t.ri + t.hd)].join(","), [0, -t.ri].join(",")
	            ].join(" ")), r.appendChild(n), r.appendChild(i), r.setAttribute("class", "polygons"), a.appendChild(r);
	            var l = document.createElementNS(e, "path");
	            return l.setAttribute("class", "selector"), l.setAttribute("d", " M " + t.r * Math.sin(t.alphaRad) / 2 + " " + -(t.r * (1 + Math.cos(t.alphaRad)) / 2) + " L " + (t.cx - t.rs * Math.cos(t.gamma1)) + " " + (t.cy - t.rs * Math.sin(t.gamma1)) + " A " + t.rs + " " + t.rs + " " + t.alphaDeg + " 1 1 " + (t.cx + t.rs * Math.cos(t.gamma2)) + " " + (t.cy + t.rs * Math.sin(t.gamma2)) + " z "), a.appendChild(l), a
	        }, l.prototype.getNumSelected = function() {
	            return this.wheel.querySelector(".selected--2") ? 2 : this.wheel.querySelector(".selected--1") ? 1 : 0
	        }, l.prototype.fieldClicked_ = function(t) {
	            var a = e(e(t.target)),
	                r = a.getAttribute("data-color"),
	                n = this.getNumSelected();
	            if ((a.getAttribute("class") || "").indexOf("selected--1") === -1 || 1 !== n) switch (n) {
	                case 1:
	                    if (this.forbiddenAccents.indexOf(r) !== -1) return;
	                    this.highlightField(a.getAttribute("data-color")), this.wheel.setAttribute("class", ""), window.requestAnimationFrame(function() {
	                        this.updateCDN(),
	                        this.updateStylesheet();
	                        $('.save-actions').show();
	                    }.bind(this));
	                    break;
	                case 2:
	                    Array.prototype.forEach.call(this.wheel.querySelector("g.wheel--maing").childNodes, function(e) {
	                        e.setAttribute("class", ""), e.querySelector(".polygons").setAttribute("filter", "")
	                    });
	                case 0:
	                    this.highlightField(a.getAttribute("data-color")), window.requestAnimationFrame(function() {
	                        this.wheel.setAttribute("class", "hide-nonaccents")
	                    }.bind(this))
	            }
	        }, l.prototype
	        .replaceDict = function(e, t) {
	            for (var a in t) e = e
	                .replace(new RegExp(a, "g"), t[a]);
	            return e
	        }, l.prototype.urlsafeName = function(e) {
	            return e.toLowerCase()
	                .replace(" ", "_")
	        }, l.prototype.getSelectedPrimary = function() {
	            return this.wheel.querySelector(".selected--1").getAttribute("data-color")
	        }, l.prototype.getSelectedSecondary = function() {
	            return this.wheel.querySelector(".selected--2").getAttribute("data-color")
	        }, l.prototype.updateCDN = function() {
	            var e = this.getSelectedPrimary(),
	                t = this.getSelectedSecondary();
	            this.cdn.textContent = this
	                .replaceDict(this.cdnTpl, {
	                    "\\$primary": this.urlsafeName(e),
	                    "\\$accent": this.urlsafeName(t)
	                }), Prism.highlightElement(this.cdn);
				var theTheme = 'material.' + this.urlsafeName(e) + '-' + this.urlsafeName(t) + '.min.css';
				var theUrl = '/css/mdl-themes/' + theTheme;
				$('#theme_id option[data-link="'+theTheme+'"]').prop('selected', true);
	        }, l.prototype.highlightField = function(t) {
	            var a = this.wheel.querySelector('[data-color="' + t + '"]'),
	                r = e(a);
	            r.removeChild(a), r.appendChild(a), a.setAttribute("class", "selected selected--" + (this.getNumSelected() + 1));
	            var n = window.navigator.msPointerEnabled;
	            n || a.querySelector(".polygons").setAttribute("filter", "url(#drop-shadow)")
	        }, l.prototype.getColor = function(e, t) {
	            var a = this.palettes[this.paletteIndices.indexOf(e)];
	            return a ? a[this.lightnessIndices.indexOf(t)] : null
	        }, l.prototype.processTemplate = function(e, t) {
	            var a = this.getColor(e, "500"),
	                r = this.getColor(e, "700"),
	                n = this.getColor(t, "A200");
	            return this
	                .replaceDict(this.template, {
	                    "\\$color-primary-dark": r,
	                    "\\$color-primary-contrast": this.calculateTextColor(a),
	                    "\\$color-accent-contrast": this.calculateTextColor(n),
	                    "\\$color-primary": a,
	                    "\\$color-accent": n
	                });
	        }, l.prototype.calculateChannel = function(e) {
	            return e /= 255, e < .03928 ? e / 12.92 : Math.pow((e + .055) / 1.055, 2.4)
	        }, l.prototype.calculateLuminance = function(e) {
	            var t = e.split(","),
	                a = this.calculateChannel(parseInt(t[0])),
	                r = this.calculateChannel(parseInt(t[1])),
	                n = this.calculateChannel(parseInt(t[2]));
	            return .2126 * a + .7152 * r + .0722 * n
	        }, l.prototype.calculateContrast = function(e, t) {
	            var a = this.calculateLuminance(e) + .05,
	                r = this.calculateLuminance(t) + .05;
	            return Math.max(a, r) / Math.min(a, r)
	        }, l.prototype.calculateTextColor = function(e) {
	            var t = 3.1,
	                a = "255,255,255",
	                r = "66,66,66",
	                n = this.calculateContrast(e, a);
	            if (n >= t) return a;
	            var i = this.calculateContrast(e, r);
	            return i > n ? r : a
	        }, l.prototype
	        .replaceKeyword = function(e, t, a) {
	            return e
	                .replace(new RegExp(t, "g"), a)
	        }, l.prototype.updateStylesheet = function() {
	            var e = document.getElementById("main-stylesheet"),
	                t = document.createElement("style");
	            t.id = "main-stylesheet";
	            var a = this.processTemplate(this.getSelectedPrimary(),
	            this.getSelectedSecondary());
	            e && e.parentNode && e.parentNode.removeChild(e),
	            t.textContent = a,
	            document.head.appendChild(t),
	            this.prepareDownload(a);
	        }, l.prototype.prepareDownload = function(e) {
	            var t = document.getElementById("download"),
	                a = new Blob([e], {
	                    type: "text/css"
	                });
	            this.blob = a;
	            var r = URL.createObjectURL(a);
	            t.setAttribute("href", r), t.setAttribute("download", "material.min.css")
	    }, l
	}(), "undefined" != typeof module && (module.exports = MaterialCustomizer);



//need inital colors to load if present.



var url = $('#user_theme_link').attr('href');
var filename = url.substring(url.lastIndexOf('/')+1);

if(filename != 'material.min.css'){

// ABSTRACT THIS CHINK INTO A FUNCTION //
	var nameSplit = filename.split(".");
	var colorNamesRaw = nameSplit[1].split("-");
	var color1Raw = colorNamesRaw[0];
	var color1RawSplit = color1Raw.split("_");
	var color1 = ucFirstLetter(color1RawSplit[0]);

	if(color1RawSplit.length > 1) {
		color1 = ucFirstLetter(color1RawSplit[0]).concat(' ' + ucFirstLetter(color1RawSplit[1]));
	}

	var color2Raw = colorNamesRaw[1];
	var color2RawSplit = color2Raw.split("_");
	var color2 = ucFirstLetter(color2RawSplit[0]);

	if(color2RawSplit.length > 1) {
		color2 = ucFirstLetter(color2RawSplit[0]).concat(' ' + ucFirstLetter(color2RawSplit[1]));
	}
// ABSTRACT THIS CHINK INTO A FUNCTION //


	init(color1, color2);

} else {


	init();

}

	$('#theme_id').change(function(){
		var selectedThemeMenu = $(this).find('option:selected').data('link');

// ABSTRACT THIS CHINK INTO A FUNCTION //
		var nameSplit = selectedThemeMenu.split(".");
		var colorNamesRaw = nameSplit[1].split("-");
		var color1Raw = colorNamesRaw[0];
		var color1RawSplit = color1Raw.split("_");
		var color1 = ucFirstLetter(color1RawSplit[0]);

		if(color1RawSplit.length > 1) {
			color1 = ucFirstLetter(color1RawSplit[0]).concat(' ' + ucFirstLetter(color1RawSplit[1]));
		}

		var color2Raw = colorNamesRaw[1];
		var color2RawSplit = color2Raw.split("_");
		var color2 = ucFirstLetter(color2RawSplit[0]);

		if(color2RawSplit.length > 1) {
			color2 = ucFirstLetter(color2RawSplit[0]).concat(' ' + ucFirstLetter(color2RawSplit[1]));
		}
// ABSTRACT THIS CHINK INTO A FUNCTION //


		$('.selected--1').removeClass('selected selected--1');
		$('.selected--2').removeClass('selected selected--2');
		$('.selected--3').removeClass('selected selected--3');
		$('.selected--4').removeClass('selected selected--4');

		init(color1, color2);
	});

	function ucFirstLetter(string) {
	    return string.charAt(0).toUpperCase() + string.slice(1);
	}

</script>




@endsection
