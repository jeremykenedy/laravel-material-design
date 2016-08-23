@extends('dashboard')

@section('template_title')
	Editing User {{ $user->name }}
@endsection

@section('template_fastload_css')

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

@endsection

@section('header')
	<small>
		Editing {{ $user->name }}
	</small>
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
		<a itemprop="item" href="{{ url('/profile/'.Auth::user()->name) }}">
			<span itemprop="name">
				{{ Lang::get('titles.profile') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="2" />
	</li>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="{{ url('/profile/'.Auth::user()->name.'/edit') }}" class="hidden">
			<span itemprop="name">
				{{ Lang::get('titles.editProfile') }}
			</span>
		</a>
		<meta itemprop="position" content="3" />
		{{ Lang::get('titles.editProfile') }}
	</li>

@endsection

@section('content')







			<div class="mdl-grid full-grid margin-top-0 padding-0">
				<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">

					{!! Form::model($user, array('action' => array('UsersManagementController@update', $user->id), 'method' => 'PUT')) !!}

						<div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
							<div class="mdl-user-avatar">
								<img src="http://lorempicsum.com/futurama/250/250/1" style="max-height:200px;">
								<span itemprop="image" style="display:none;">http://lorempicsum.com/futurama/250/250/1</span>
							</div>
							<div class="mdl-card__title">
								<h3 class="mdl-card__title-text mdl-title-username">
									{{ $user->name }}
								</h3>
							</div>
							<div class="mdl-card__supporting-text">
								<div class="mdl-grid full-grid padding-0">
									<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">

										<div class="mdl-grid ">

											<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
													{!! Form::text('name', $user->name, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*')) !!}
													{!! Form::label('name', Lang::get('auth.name') , array('class' => 'mdl-textfield__label')); !!}
													<span class="mdl-textfield__error">Letters and numbers only</span>
												</div>
											</div>


<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">


	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth">
	    <input class="mdl-textfield__input mdl-select-input" type="text" name="role_id" id="role_id" value="{{$access}}" readonly tabIndex="-1">
	    <label for="role_id">
	        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
	    </label>
	    <label for="role_id" class="mdl-textfield__label">{{ Lang::get('forms.label-userrole_id') }}</label>
	    <ul for="role_id" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
	        <li class="mdl-menu__item">User</li>
	        <li class="mdl-menu__item">Editor</li>
	        <li class="mdl-menu__item">Administrator</li>
	    </ul>
	</div>

</div>
{{-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth">

	<select class="" name="role_id">
	    <option value="0">Select a Level</option>
	    <option value="1">User</option>
	    <option value="2" selected="selected">Editor</option>
	    <option value="3">Administrator</option>
	</select>

</div>
 --}}
{{--
{!! Form::label('role_id', Lang::get('forms.label-userrole_id') , array('class' => 'col-md-3 control-label')); !!}

{!! Form::select('role_id', array('0' => Lang::get('forms.option-label'), '1' => Lang::get('forms.option-user'), '2' => Lang::get('forms.option-editor'), '3' => Lang::get('forms.option-admin')), $access, array('class' => 'form-control')) !!}

 --}}



											<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
													{!! Form::email('email', $user->email, array('id' => 'email', 'class' => 'mdl-textfield__input')) !!}
													{!! Form::label('email', Lang::get('auth.email') , array('class' => 'mdl-textfield__label')); !!}
													<span class="mdl-textfield__error">Please Enter a Valid {{ Lang::get('auth.email') }}</span>
												</div>
											</div>
											<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
										        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
										            {!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
										            {!! Form::label('first_name', Lang::get('auth.first_name') , array('class' => 'mdl-textfield__label')); !!}
										            <span class="mdl-textfield__error">Letters only</span>
										        </div>
										  	</div>
										  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('last_name') ? 'is-invalid' :'' }}">
											        {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
											        {!! Form::label('last_name', Lang::get('auth.last_name') , array('class' => 'mdl-textfield__label')); !!}
											        <span class="mdl-textfield__error">Letters only</span>
											    </div>
										  	</div>
										  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('twitter_username') ? 'is-invalid' :'' }}">
											        {!! Form::text('twitter_username', $user->profile->twitter_username, array('id' => 'twitter_username', 'class' => 'mdl-textfield__input')) !!}
											        {!! Form::label('twitter_username', Lang::get('profile.label-twitter_username') , array('class' => 'mdl-textfield__label')); !!}
											    </div>
										  	</div>
										  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('github_username') ? 'is-invalid' :'' }}">
											        {!! Form::text('github_username', $user->profile->github_username, array('id' => 'github_username', 'class' => 'mdl-textfield__input')) !!}
											        {!! Form::label('github_username', Lang::get('profile.label-github_username') , array('class' => 'mdl-textfield__label')); !!}
											    </div>
										  	</div>
											<div class="mdl-cell mdl-cell--12-col">
											    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('bio') ? 'is-invalid' :'' }}">
											        {!! Form::textarea('bio',  $user->profile->bio, array('id' => 'bio', 'class' => 'mdl-textfield__input')) !!}
											        {!! Form::label('bio', Lang::get('profile.label-bio') , array('class' => 'mdl-textfield__label')); !!}
											    </div>
											</div>
										</div>
									</div>


									<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">

										<div class="mdl-grid ">
											<div class="mdl-cell mdl-cell--12-col">

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 {{ $errors->has('location') ? 'is-invalid' :'' }}">
												    {!! Form::text('location', $user->profile->location, array('id' => 'location', 'class' => 'mdl-textfield__input' )) !!}
												    {!! Form::label('location', Lang::get('profile.label-location') , array('class' => 'mdl-textfield__label')); !!}
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
							</div>

						    <div class="mdl-card__actions padding-top-0">
								<div class="mdl-grid padding-top-0">
									<div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0">
										<span class="save-actions start-hidden">
											{!! Form::button('<i class="material-icons" style="padding-right: 5px;">save</i>'.Lang::get('profile.submitButton'), array('class' => 'dialog-button mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--primary mdl-color-text--white mdl-button--raised full-span margin-bottom-1 margin-top-1 margin-top-0-desktop')) !!}
										</span>
									</div>
								</div>
						    </div>
						    <div class="mdl-card__menu">
						    	<span class="save-actions start-hidden">
									{!! Form::button('<i class="material-icons">save</i>', array('class' => 'mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'view profile')) !!}
								</span>
								<a href="/profile/{{Auth::user()->name}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="view profile">
									<i class="material-icons">person_outline</i>
								</a>
						    </div>
						</div>


						@include('dialogs.dialog-save')

					{!! Form::close() !!}

				</div>
			</div>









{{-- 	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Editing User:</strong> {{ $user->name }}
					</div>

					{!! Form::model($user, array('action' => array('UsersManagementController@update', $user->id), 'method' => 'PUT')) !!}

						<div class="panel-body">

							@include('partials.form-status')

							<div class="form-group has-feedback row">
								{!! Form::label('name', Lang::get('forms.label-username') , array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
					              	<div class="input-group">
					                	{!! Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => Lang::get('forms.ph-username'))) !!}
					                	<label class="input-group-addon" for="name"><i class="fa fa-fw {{ Lang::get('forms.username-icon') }}" aria-hidden="true"></i></label>
					              	</div>
								</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('email', Lang::get('forms.label-useremail') , array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
					              	<div class="input-group">
					                	{!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('forms.ph-useremail'))) !!}
					                	<label class="input-group-addon" for="email"><i class="fa fa-fw {{ Lang::get('forms.useremail-icon') }} " aria-hidden="true"></i></label>
					              	</div>
								</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('role_id', Lang::get('forms.label-userrole_id') , array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
					              		{!! Form::select('role_id', array('0' => Lang::get('forms.option-label'), '1' => Lang::get('forms.option-user'), '2' => Lang::get('forms.option-editor'), '3' => Lang::get('forms.option-admin')), $access, array('class' => 'form-control')) !!}
								</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('first_name', Lang::get('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
							      	<div class="input-group">
							       	 	{!! Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_firstname'))) !!}
							        	<label class="input-group-addon" for="first_name"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_firstname') }}" aria-hidden="true"></i></label>
							      	</div>
								</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('last_name', Lang::get('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
							      	<div class="input-group">
							       	 	{!! Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_lastname'))) !!}
							        	<label class="input-group-addon" for="last_name"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_lastname') }}" aria-hidden="true"></i></label>
							      	</div>
								</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('location', Lang::get('forms.create_user_label_location'), array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
						      		<div class="input-group">
						        		{!! Form::text('location', $user->profile->location, array('id' => 'location', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_location'))) !!}
						        		<label class="input-group-addon" for="location"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_location') }}" aria-hidden="true"></i></label>
						      		</div>
						      	</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('bio', Lang::get('forms.create_user_label_bio'), array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
							  		<div class="input-group">
							    		{!! Form::textarea('bio', $user->profile->bio, array('id' => 'bio', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_bio'), 'spellcheck' => "true", 'autocomplete' => "on", 'autocorrect' => "on", 'autocapitalize' => "on")) !!}
							    		<label class="input-group-addon" for="bio"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_bio') }}" aria-hidden="true"></i></label>
							  		</div>
							  	</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('twitter_username', Lang::get('forms.create_user_label_twitter_username'), array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
						      		<div class="input-group">
						        		{!! Form::text('twitter_username', $user->profile->twitter_username, array('id' => 'twitter_username', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_twitter_username'))) !!}
						        		<label class="input-group-addon" for="twitter_username"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_twitter_username') }}" aria-hidden="true"></i></label>
						      		</div>
						      	</div>
							</div>


							<div class="form-group has-feedback row">
								{!! Form::label('github_username', Lang::get('forms.create_user_label_github_username'), array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
						      		<div class="input-group">
						        		{!! Form::text('github_username', $user->profile->github_username, array('id' => 'github_username', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_github_username'))) !!}
						        		<label class="input-group-addon" for="github_username"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_github_username') }}" aria-hidden="true"></i></label>
						      		</div>
						      	</div>
							</div>

						</div>
						<div class="panel-footer">

							{!! Form::button('<i class="fa fa-fw '.Lang::get('forms.submit-btn-icon').'" aria-hidden="true"></i> '.Lang::get('forms.submit-btn-text'), array('class' => 'btn btn-primary btn-lg btn-block margin-bottom-1','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => Lang::get('modals.edit_user__modal_text_confirm_btn'), 'data-message' => Lang::get('modals.edit_user__modal_text_confirm_message'))) !!}

						</div>

						@include('dialogs.dialog-save')

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div> --}}





{{--
	@include('modals.modal-save')
	@include('modals.modal-delete')
 --}}
@endsection

@section('template_scripts')

	@include('scripts.mdl-required-input-fix')
	@include('scripts.gmaps-address-lookup-api3')
	@include('scripts.google-maps-geocode-and-map')
	@include('scripts.mdl-select')

	<script type="text/javascript">

		mdl_dialog();

		$('form input, form select, form textarea').on('input', function() {
		    $('.save-actions').show();
		});
		$('.mdl-select-input').change(function(event) {
			$('.save-actions').show();
		});

	</script>

@endsection

