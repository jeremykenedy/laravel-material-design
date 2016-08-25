@extends('dashboard')

@section('template_title')
	Create New User
@endsection

@section('template_fastload_css')
@endsection

@section('header')
	Create New User
@endsection

@section('content')

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
		<a itemprop="item" href="/users">
			<span itemprop="name">
				Users List
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="2" />
	</li>
	<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="/users/create">
			<span itemprop="name">
				Create New User
			</span>
		</a>
		<meta itemprop="position" content="3" />
	</li>
@endsection


{{-- WORKING ON THIS THEMPLATE--}}


<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
	    <div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">


			<div class="mdl-card__title mdl-card--expand">
				<h2 class="mdl-card__title-text">Create New User</h2>
			</div>

			{!! Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form')) !!}

			    <div class="mdl-card__supporting-text">
					<div class="mdl-grid full-grid padding-0">
						<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">















								<div class="form-group has-feedback row">
									{!! Form::label('email', Lang::get('forms.create_user_label_email'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
									  	<div class="input-group">
									    	{!! Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_email'))) !!}
									    	<label class="input-group-addon" for="email"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_email') }}" aria-hidden="true"></i></label>
									  	</div>
									</div>
								</div>

								<div class="form-group has-feedback row">
									{!! Form::label('name', Lang::get('forms.create_user_label_username'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
							      		<div class="input-group">
							        		{!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_username'))) !!}
							        		<label class="input-group-addon" for="name"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_username') }}" aria-hidden="true"></i></label>
							      		</div>
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
									{!! Form::label('user_level', 'User Access Level' , array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
										<div class="input-group">
							        		{!! Form::select('user_level', array('0' => 'Select Access Level', '1' => 'User', '2' => 'Editor', '3' => 'Administrator'), NULL, array('class' => 'form-control')) !!}
											<label class="input-group-addon" for="user_level"><i class="fa fa-fw fa-exclamation-circle" aria-hidden="true"></i></label>
										</div>
									</div>
								</div>

								<div class="form-group has-feedback row">
									{!! Form::label('password', Lang::get('forms.create_user_label_password'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
							      		<div class="input-group">
							        		{!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => Lang::get('forms.create_user_ph_password'))) !!}
							        		<label class="input-group-addon" for="password"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_password') }}" aria-hidden="true"></i></label>
							      		</div>
							      	</div>
								</div>

								<div class="form-group has-feedback row">
									{!! Form::label('password_confirmation', Lang::get('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
							      		<div class="input-group">
							        		{!! Form::text('password_confirmation', NULL, array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_pw_confirmation'))) !!}
							        		<label class="input-group-addon" for="password_confirmation"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_pw_confirmation') }}" aria-hidden="true"></i></label>
							      		</div>
							      	</div>
								</div>

								<div class="form-group has-feedback row">
									{!! Form::label('location', Lang::get('forms.create_user_label_location'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
							      		<div class="input-group">
							        		{!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_location'))) !!}
							        		<label class="input-group-addon" for="location"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_location') }}" aria-hidden="true"></i></label>
							      		</div>
							      	</div>
								</div>

								<div class="form-group has-feedback row">
									{!! Form::label('bio', Lang::get('forms.create_user_label_bio'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
							      		<div class="input-group">
							        		{!! Form::textarea('bio', old('bio'), array('id' => 'bio', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_bio'), 'spellcheck' => "true", 'autocomplete' => "on", 'autocorrect' => "on", 'autocapitalize' => "on")) !!}
							        		<label class="input-group-addon" for="bio"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_bio') }}" aria-hidden="true"></i></label>
							      		</div>
							      	</div>
								</div>

								<div class="form-group has-feedback row">
									{!! Form::label('twitter_username', Lang::get('forms.create_user_label_twitter_username'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
							      		<div class="input-group">
							        		{!! Form::text('twitter_username', old('twitter_username'), array('id' => 'twitter_username', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_twitter_username'))) !!}
							        		<label class="input-group-addon" for="twitter_username"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_twitter_username') }}" aria-hidden="true"></i></label>
							      		</div>
							      	</div>
								</div>

								<div class="form-group has-feedback row">
									{!! Form::label('github_username', Lang::get('forms.create_user_label_github_username'), array('class' => 'col-md-3 control-label')); !!}
									<div class="col-md-9">
							      		<div class="input-group">
							        		{!! Form::text('github_username', old('github_username'), array('id' => 'github_username', 'class' => 'form-control', 'placeholder' => Lang::get('forms.create_user_ph_github_username'))) !!}
							        		<label class="input-group-addon" for="github_username"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_github_username') }}" aria-hidden="true"></i></label>
							      		</div>
							      	</div>
								</div>

















						</div>
					</div>
			    </div>

				<div class="mdl-card__actions mdl-card--border">

					{!! Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . Lang::get('forms.create_user_button_text'), array('class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect','type' => 'submit')) !!}

				</div>

			{!! Form::close() !!}

		    <div class="mdl-card__menu">

				<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
					<i class="material-icons">share</i>
				</button>

		    </div>
	    </div>
	</div>
</div>

@endsection

@section('template_scripts')

	@include('scripts.gmaps-address-lookup-api3')

@endsection