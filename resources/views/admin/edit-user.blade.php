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
							<div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">
								{{-- SAVE BUTTON--}}
								<span class="save-actions start-hidden">
									{!! Form::button('Save <span class="hide-mobile">Changes</span>', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 padding-left-2-tablet padding-right-2-tablet')) !!}
								</span>

								<a href="/profile/{{Auth::user()->name}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1" title="view profile">
									View <span class="hide-mobile">Profile</span>
								</a>

								{{-- DELETE USER BUTTON--}}
								{!! Form::button('Delete <span class="hide-mobile">User</span>', array('class' => 'dialog-button-delete mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--red mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop padding-left-1 padding-right-1 padding-left-2-tablet padding-right-2-tablet')) !!}

							</div>
						</div>
				    </div>
				    <div class="mdl-card__menu">
						{{-- SAVE ICON --}}
						<span class="save-actions start-hidden">
							{!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'save profile')) !!}
						</span>
						<a href="#" class="dialog-button-delete-icon dialiog-trigger-delete dialiog-trigger{{$user->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$user->id}}">
							<i class="material-icons">delete</i>
						</a>
						<a href="/profile/{{Auth::user()->name}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="view profile">
							<i class="material-icons">person_outline</i>
						</a>
				    </div>
				</div>

				@include('dialogs.dialog-save')

			{!! Form::close() !!}

			{!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'inline-block', 'id' => 'delete_'.$user->id)) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				@include('dialogs.dialog-delete')
			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('template_scripts')

	@include('scripts.mdl-required-input-fix')
	@include('scripts.gmaps-address-lookup-api3')
	@include('scripts.google-maps-geocode-and-map')
	@include('scripts.mdl-select')

	<script type="text/javascript">

		mdl_dialog('.dialog-button-save');
		mdl_dialog('.dialog-button-icon-save');
		mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');
		mdl_dialog('.dialog-button-delete-icon','.dialog-delete-close','#dialog_delete');

		$('form input, form select, form textarea').on('input', function() {
		    $('.save-actions').show();
		});
		$('.mdl-select-input').change(function(event) {
			$('.save-actions').show();
		});

	</script>

@endsection

