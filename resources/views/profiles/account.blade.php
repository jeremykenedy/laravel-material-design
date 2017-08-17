@extends('layouts.dashboard')

@section('template_title')
	{{ $user->name }}'s Account
@endsection

@section('template_fastload_css')
@endsection

@section('header')
	<small>
		{{ trans('profile.accountTitle',['username' => $user->name]) }}
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

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="{{ url('/account/') }}" class="hidden">
			<span itemprop="name">
				{{ trans('titles.account') }}
			</span>
		</a>
		{{ trans('titles.account') }}
		<meta itemprop="position" content="2" />
	</li>

@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell margin-top-0-tablet-important mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop weather-container">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white header-container">
        <h2 class="mdl-card__title-text">
        	<span class="header-title">
				{{ trans('profile.changePwTitle') }}
        	</span>
        </h2>
    </div>

    <div class="mdl-card__supporting-text margin-top-0 padding-top-0">

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

			<div class="mdl-tabs__tab-bar">
				<a href="#name-panel" class="mdl-tabs__tab acct-tab is-active">{{ trans('profile.changeNamePill') }}</a>
				<a href="#change-panel" class="mdl-tabs__tab pw-tab">{{ trans('profile.changePwPill') }}</a>
				<a href="#delete-panel" class="mdl-tabs__tab del-tab">{{ trans('profile.deleteAccountPill') }}</a>
			</div>

<div class="mdl-tabs__panel is-active" id="name-panel">



        {!! Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form')) !!}

          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                      {!! Form::text('name', $user->name, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*')) !!}
                      {!! Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Letters and numbers only</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                      {!! Form::email('email', $user->email, array('id' => 'email', 'class' => 'mdl-textfield__input')) !!}
                      {!! Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label')); !!}
                      <span class="mdl-textfield__error">Please Enter a Valid {{ trans('auth.email') }}</span>
                    </div>
                  </div>



                </div>
              </div>

            </div>
          </div>

          <div class="mdl-card__actions padding-top-0">
            <div class="mdl-grid padding-top-0">
              <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                {{-- SAVE BUTTON--}}
                <span class="save-actions">
                  {!! Form::button('<i class="material-icons">save</i> Save New User', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                </span>

              </div>
            </div>
          </div>

            <div class="mdl-card__menu mdl-color-text--white">

              <span class="save-actions">
                {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Save New User')) !!}
              </span>

              <a href="{{ url('/users/') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users">
                  <i class="material-icons">reply</i>
                  <span class="sr-only">Back to Users</span>
              </a>

            </div>

            @include('dialogs.dialog-save')

          {!! Form::close() !!}



</div>

			<div class="mdl-tabs__panel" id="change-panel">

{{-- 				{!! Form::model($user, array('action' => array('ProfilesController@updateUserPassword', $user->id), 'method' => 'PUT', 'autocomplete' => 'new-password')) !!}

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
 --}}



        {!! Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form')) !!}

          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? 'is-invalid' :'' }}">
                          {!! Form::password('password', array('id' => 'password', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('password', 'Password', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Please enter a valid password</span>
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password_confirmation') ? 'is-invalid' :'' }}">
                          {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'mdl-textfield__input')) !!}
                          {!! Form::label('password_confirmation', 'Confirm Password', array('class' => 'mdl-textfield__label')); !!}
                        <span class="mdl-textfield__error">Must match password</span>
                      </div>
                  </div>


                </div>
              </div>

            </div>
          </div>

          <div class="mdl-card__actions padding-top-0">
            <div class="mdl-grid padding-top-0">
              <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                {{-- SAVE BUTTON--}}
                <span class="save-actions">
                  {!! Form::button('<i class="material-icons">save</i> Save New User', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                </span>

              </div>
            </div>
          </div>

            <div class="mdl-card__menu mdl-color-text--white">

              <span class="save-actions">
                {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Save New User')) !!}
              </span>

              <a href="{{ url('/users/') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users">
                  <i class="material-icons">reply</i>
                  <span class="sr-only">Back to Users</span>
              </a>

            </div>

            @include('dialogs.dialog-save')

          {!! Form::close() !!}


			</div>




			<div class="mdl-tabs__panel" id="delete-panel">

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

	{{--
		<div class="mdl-card__actions mdl-card--border">
	        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
	            Show Forecast
	        </a>
	        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
	            Show Current
	        </a>
	    </div>
	 --}}


</div>






{{--
@include('modals.modal-form')

 --}}



{{--



		@include('scripts.form-modal-script')
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







{{--
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
</div> --}}



	<style type="text/css" media="screen">
		.header-container {

		}
		.account-header-password {

		}
		.account-header-delete {
			display: none;
		}
	</style>
@endsection
@section('footer_scripts')
	<script>

		$(document).ready(function() {

			function tabHeaders() {
				var titleContainer = $('.header-container');
				var titleContent = $('.header-title');
				var trigger = $('.mdl-tabs__tab');
				var delTriggerClass = 'del-tab';
				var pwTriggerClass = 'pw-tab';
				var deleteClass = "mdl-color--red-400";
				var pwClass = "mdl-color--yellow-800";
				var defaultClass = "mdl-color--primary";
				var activeClass = "is-active";
				var title;

				trigger.click(function() {

					var self = $(this);
					title = self.text();

					titleContainer.removeClass(defaultClass + ' ' + deleteClass + ' ' + pwClass);

				    switch (true) {
				      case self.hasClass(delTriggerClass):
				        titleContainer.addClass(deleteClass);
				        break;
				      case self.hasClass(pwTriggerClass):
				        titleContainer.addClass(pwClass);
				        break;
				      default:
						titleContainer.addClass(defaultClass);
				        break;
				    }
					titleContent.html(title);
				});
			}
			tabHeaders();
		});

	</script>


@endsection
