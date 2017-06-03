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

@section('content')






<div id="color_select_panel">

<div id="style_plug"></div>

  <div class="image-preloader"></div>
  <div class="docs-layout mdl-layout mdl-js-layout">





    <main class="docs-layout-content mdl-layout__content mdl-color-text--grey-600">
      <div class="content mdl-grid mdl-grid--no-spacing" id="content">






          <div class="mdl-gen mdl-cell mdl-cell--12-col">
            <div class="mdl-grid">
              <div class="mdl-gen__panel mdl-gen__panel--left mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col">
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
                    <a href="#" id="download" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--fab"><i class="material-icons">file_download</i></a>
                  </div>
                </div>
              </div>
              <div class="mdl-gen__panel--right mdl-gen__panel mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col">
                <div class="mdl-gen__desc docs-text-styling">
                  <strong>Custom CSS theme builder</strong>
                  <p>Click on the color wheel to choose a primary (1) and accent (2) color to preview the theme below. When you’ve selected a color combination you like, either reference our <a href="#cdn-code">hosted CSS</a> or download the CSS by clicking the white button in the middle. You will need to include MDL’s JavaScript alongside your customised CSS to get the full experience. This is included in our default Download from the <a href="../started/index.html#download">Getting Started guide</a>.</p>
                </div>
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
                    <main class="mdl-layout__content">
                      <h3>Try it out</h3>
                      <p>
                        Lorem ipsum dolor sit amet.
                      </p>
                      <button class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">BUTTON</button>
                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect">
                        <i class="material-icons">email</i>
                      </button>
                    </main>
                  </div>
                </div>
              </div>
              <div class="mdl-gen__cdn mdl-cell mdl-cell--12-col">
                <div class="code-with-text" id="cdn-code">

                  MDL CSS Theme File:

                  <pre class="demo-code language-markup codepen-button-disabled"><code class="language-markup mdl-gen__cdn-link" data-language="markup">material.$primary-$accent.min.css</code></pre>
                </div>
              </div>
            </div>
          </div>



      </div>









    </main>
  </div>
</div>








{{--

	@if (Auth::user()->id == $user->id)

		<div class="mdl-grid full-grid margin-top-0 padding-0">
			<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">

				{!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name],  'class' => '', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
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
							<div class="mdl-grid full-grid padding-0">
								<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">

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

					@include('dialogs.dialog-save')

				{!! Form::close() !!}

			</div>
		</div>

	@else
		<p>{{ trans('profile.notYourProfile') }}</p>
	@endif


--}}









<style type="text/css">

html>body{font-family:'Roboto','Helvetica','Arial',sans-serif!important;background-color:#FAFAFA}.docs-layout .docs-layout-header.mdl-layout__header{height:560px;max-height:50%;-webkit-flex-shrink:0;-ms-flex-negative:0;background-size:auto;background-repeat:no-repeat;background-position:center center;box-shadow:none!important;-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start;padding:40px;flex-shrink:0;position:relative;display:-webkit-flex!important;display:-ms-flexbox!important;display:flex!important}body.about .docs-layout.is-small-screen .docs-layout-header.mdl-layout__header{height:280px;background-size:auto 58px,cover;background-repeat:no-repeat,no-repeat;background-position:center center,center center}.docs-layout-header .mdl-textfield{padding-top:0}.docs-layout-header>.mdl-layout__header-row{padding:0;-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start;height:auto}.docs-layout-header .docs-navigation .github,.docs-layout-header .docs-navigation .download{text-transform:none}.docs-layout-title{font-weight:500;text-transform:uppercase;line-height:1.5em;font-size:1rem}.docs-layout .docs-layout-title a{font-weight:inherit;color:#fff}.docs-layout-header .mdl-textfield .mdl-button{right:0}.docs-layout-header .mdl-textfield .mdl-textfield__expandable-holder{margin-right:32px}.docs-layout-header .mdl-textfield label:after{background-color:rgba(255,255,255,.12)}.about .docs-layout-header.mdl-layout__header{background-color:#37474f;background:url('logo.svg'),url('header.jpg');background-size:auto 118px,cover;background-repeat:no-repeat,no-repeat;background-position:center center,center center}@media (max-height:600px){.about .docs-layout-header.mdl-layout__header{background-size:auto 80px,cover}}body:not(.about) .docs-layout .docs-layout-header.mdl-layout__header{background-repeat:no-repeat;background-position:center center}.templates .docs-layout-header.mdl-layout__header{background-color:#263238;background-size:auto 29px}.showcase .docs-layout-header.mdl-layout__header{background-color:#3E82F7;background-size:auto 29px}.started .docs-layout-header.mdl-layout__header,.faq .docs-layout-header.mdl-layout__header{background-color:#2E2E2E;background-size:auto 32px}.components .docs-layout-header.mdl-layout__header{background-color:#C2185B;background-size:auto 34px}.styles .docs-layout-header.mdl-layout__header{background-color:#8E24AA;background-size:auto 41px}.customize .docs-layout-header.mdl-layout__header{background-color:#1A237E;background-size:auto 36px}body:not(.about) .docs-layout .docs-layout-header.mdl-layout__header{box-sizing:border-box;height:144px;background-position:40px 32px}body:not(.about) .docs-layout-title{display:none}.docs-navigation__container{overflow:hidden;position:absolute;height:64px;width:100%;bottom:0;left:0}.docs-navigation{box-shadow:none!important;border:0!important;width:100%;height:85px;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;padding:0 16px 0 24px;overflow-x:auto;overflow-y:hidden;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;margin-bottom:-16px}.docs-layout.is-small-screen .docs-navigation{padding:0}.docs-layout.is-small-screen .docs-navigation .mdl-navigation__link .material-icons{display:none}.docs-navigation::-webkit-scrollbar{display:none}body:not(.about) .docs-layout.is-small-screen .docs-layout-header{background-image:none}.docs-layout.mdl-layout.is-small-screen .docs-layout-header.mdl-layout__header{padding:0;height:64px}.docs-layout.is-small-screen .docs-layout-header .docs-layout-title,.docs-layout.is-small-screen .docs-layout-header .mdl-textfield{display:none}.docs-layout.is-small-screen .docs-navigation__container{top:0;bottom:auto;left:48px;width:calc(100% - 2 * 48px);padding:0!important}.docs-layout .scrollindicator{position:absolute;top:0;line-height:64px;height:64px;width:48px;display:none;margin-right:0;text-align:center;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.docs-layout .scrollindicator.disabled{opacity:.12;cursor:default}.docs-layout .scrollindicator.scrollindicator--right{right:0}.docs-layout .scrollindicator.scrollindicator--left{left:0}.docs-layout.is-small-screen .scrollindicator.scrollindicator.scrollindicator{display:block}.mdl-navigation__link--icon>span,.mdl-navigation__link--icon>.material-icons{line-height:64px;margin-right:8px;line-height:inherit}.docs-navigation .mdl-navigation__link{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;-webkit-user-select:inherit;-moz-user-select:inherit;-ms-user-select:inherit;user-select:inherit;height:64px}.docs-navigation .mdl-navigation__link:hover,.docs-navigation .mdl-navigation__link.download:hover>span,.docs-navigation .mdl-navigation__link.download:hover>.material-icons{background-color:inherit;opacity:1!important}.docs-navigation .mdl-navigation__link:not(.download),.docs-navigation .mdl-navigation__link.download>span,.docs-navigation .mdl-navigation__link.download>.material-icons{opacity:.65}.docs-navigation .mdl-navigation__link,section.download{font-weight:500;font-size:13px;text-transform:uppercase;line-height:64px;padding:0 16px;color:#fff;box-sizing:border-box;border-bottom:3px solid transparent}.docs-layout.is-small-screen .docs-navigation .mdl-navigation__link,.docs-layouy.is-small-screen section.download{padding:0 12px}.about .docs-layout:not(.is-small-screen) .mdl-navigation__link.download>.material-icons,.about .docs-layout.is-small-screen .mdl-navigation__link.download>button,body:not(.about) .mdl-navigation__link.download>button{display:none}.docs-navigation .download button .material-icons{color:#000;opacity:.54}.about .docs-navigation .about,.templates .docs-navigation .templates,.showcase .docs-navigation .showcase,.started .docs-navigation .started,.styles .docs-navigation .styles,.components .docs-navigation .components,.faq .docs-navigation .faq,.customize .docs-navigation .customize{opacity:1;border-bottom-color:#18FFFF}.mdl-layout__content.docs-layout-content{overflow:visible}.docs-layout-content>.download{width:100%;height:6rem;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center}.docs-layout-content>.download>a{font-weight:500;text-transform:uppercase}.docs-footer.mdl-mini-footer{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:stretch;-ms-flex-align:stretch;align-items:stretch;height:120px}.docs-footer.mdl-mini-footer,.docs-footer.mdl-mini-footer ul{-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.docs-footer.mdl-mini-footer ul{padding:0;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:center;-ms-flex-align:center;align-items:center}.docs-footer.mdl-mini-footer ul>li>a{margin:0 8px;font-weight:400;font-size:12px}.docs-footer .docs-link-list li{margin-left:.5em;margin-right:.5em}.about-panel{box-sizing:border-box;width:100%;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}.about-panel--text{padding:100px}.about-panel--text p{width:640px;margin:0 auto;line-height:2em}.about-panel--text dl{width:100%;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:stretch;-ms-flex-align:stretch;align-items:stretch}.about-panel--text dl dt{text-align:right;vertical-align:top;display:inline-table;margin-right:24px;line-height:2em}.about-panel--text dl dd{text-align:left;line-height:2em;vertical-align:top;width:700px;margin:0 0 0 24px}.docs-layout.is-small-screen .about-panel{padding:40px}.docs-layout.is-small-screen .about-panel--text:not(:first-of-type){display:none}.docs-layout.is-small-screen .about-panel--text dl{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}.docs-layout.is-small-screen .about-panel--text dd,.docs-layout.is-small-screen .about-panel--text dt{margin:0;padding:0;text-align:left;width:100%}.about-panel--components,.about-panel--styles{height:500px}.about-panel--components,.about-panel--styles,.about-panel--customize,.about-panel--templates{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-ms-flex-align:center;align-items:center;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;padding:40px;color:#fff;text-transform:uppercase;font-size:1.4rem;width:auto;background-repeat:no-repeat;background-position:center center;cursor:pointer}.about-panel--templates{height:500px}.docs-layout-content .about-panel--start>p{color:#424242;text-transform:uppercase;font-size:1.6rem;margin-top:20px;margin-bottom:0}.about-panel--templates{background-color:#B3E0E1;background-size:287px auto}.about-panel--templates:hover{}.about-panel--components{background-color:#E90974;background-image:url();background-size:174px auto}.about-panel--components:hover{background-image:url()}.about-panel--styles{background-color:#8F4099;background-image:url(styles.svg);background-size:252px auto}.about-panel--styles:hover{background-image:url();background-size:331px auto;background-position-x:calc(50% + 40px)}.about-panel--customize{height:400px;background-color:#191E80;background-image:url(customize.svg);background-size:156px auto}.about-panel--customize:hover{background-image:url()}.image-preloader{position:fixed;visibility:hidden;width:0;height:0;top:-100px;left:-100px;background-image:url(),url(),url(),url()}.templates .content{padding-left:24px!important;max-width:960px}.templates .docs-layout-content .content{padding:40px 0}.templates .docs-layout .template{margin-left:-16px}.showcase .content{padding-left:24px!important;max-width:960px}.showcase .docs-layout-content .content{padding:40px 0}.showcase .docs-layout .template{margin-left:-16px}.template{width:100%;margin-bottom:72px;-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start}.template>.template__meta{-webkit-align-content:flex-start;-ms-flex-line-pack:start;align-content:flex-start;padding-left:24px}.templates .docs-layout.is-small-screen .template>.template__meta,.showcase .docs-layout.is-small-screen .template>.template__meta{padding-left:0}.template>.template__meta.template__meta>*{margin-bottom:24px}.template>.template__meta>*:last-child{margin-bottom:0}.template>.template__meta a{color:inherit;margin-left:-8px!important}.template>.template__preview{height:auto}.docs-layout-content dd{font-size:13px}.docs-layout-content p{font-size:13px;margin-bottom:32px;max-width:640px}.docs-layout-content p,.docs-text-styling ol li{font-family:'Roboto','Helvetica','Arial',sans-serif}.docs-text-styling h1{color:#c2185b;margin:.67em 0}.docs-text-styling h2{padding-top:48px;line-height:32px;margin-bottom:30px;color:#c2185b}.docs-text-styling h1,.docs-text-styling h2,.docs-text-styling h3,.docs-text-styling h4{font-size:16px;color:rgba(0,0,0,.54);font-weight:500;text-transform:uppercase}.docs-layout-content h2.mdl-card__title-text{padding-top:0;margin-bottom:0}.docs-text-styling a{text-decoration:none}.docs-layout-content .mdl-download{color:#000;font-weight:400}.docs-layout-title a{color:inherit;text-decoration:none}.component-description{max-width:720px;padding:40px}.component-description .mdl-button:first-of-type{margin-top:8px}.docs-footer.mdl-mini-footer .mdl-mini-footer--social-btn{background-color:transparent;margin:0 16px;width:24px;height:24px}.docs-footer.mdl-mini-footer .social-btn{display:block;background-position:center;background-size:contain;background-repeat:no-repeat;width:24px;height:24px;cursor:pointer}.social-btn__twitter{background-image:url('https://www.gstatic.com/images/icons/material/system/2x/post_twitter_white_24dp.png')}.social-btn__github{background-image:url();width:22px;height:22px}.social-btn__gplus{background-image:url('https://www.gstatic.com/images/icons/material/system/2x/post_gplus_white_24dp.png')}.subpageheader{margin-top:60px;margin-bottom:40px;display:-webkit-flex;display:-ms-flexbox;display:flex;color:rgba(0,0,0,.54);-webkit-align-items:center;-ms-flex-align:center;align-items:center;-webkit-flex-shrink:0;-ms-flex-negative:0;flex-shrink:0;text-transform:uppercase;font-size:16px;font-weight:500}.about .subpageheader,.components .subpageheader{display:none}.started .subpageheader,.customize .subpageheader,.styles .subpageheader,.faq .subpageheader,.templates .subpageheader,.showcase .subpageheader{width:960px;margin:40px auto}.snippet-group{margin-left:-16px;margin-right:-16px;margin-bottom:84px}.snippet-group .snippet-header{display:table;border-collapse:collapse;border-spacing:0;width:100%}.snippet-group .snippet-demos,.snippet-group .snippet-captions{display:table-row}.snippet-group .snippet-demo .snippet-demo-container{text-align:left;display:inline-block}.snippet-group .snippet-captions{background-color:#fff;height:48px}.snippet-group .snippet-demo{display:table-cell;text-align:center;vertical-align:middle;margin:0}.snippet-group .snippet-demo-padding{text-align:center;padding:0}.snippet-group .snippet-demo-padding,.snippet-group .snippet-caption,.snippet-group .snippet-caption-padding{display:table-cell;vertical-align:middle;margin:0}.snippet-group .snippet-caption-padding{text-align:center;padding:0}.snippet-group .snippet-caption{font-size:13px;padding:0 40px;white-space:nowrap;text-align:center;position:relative}.snippet-group .snippet-demo{padding:0 40px 40px}.snippet-group .snippet-demos .snippet-demo-padding{width:50%}_:-ms-input-placeholder,:root .snippet-group .snippet-demo{width:1px}_:-ms-input-placeholder,:root .snippet-group .snippet-demos .snippet-demo-padding{width:auto}.snippet-group .snippet-code{position:relative;overflow:hidden}.snippet-group .snippet-code pre{margin:0;border-radius:0;display:block;padding:0;overflow:hidden}.snippet-group .snippet-code code{padding:8px 16px;position:relative;max-height:none;width:100%;box-sizing:border-box}.snippet-group .snippet-code pre[class*=language-]>code[data-language]{max-height:none}.snippet-group .snippet-code code:first-of-type{padding-top:16px}.snippet-group .snippet-code code:last-of-type{padding-bottom:16px}.snippet-group .snippet-code code:hover{background-color:rgba(0,0,0,.05)}.snippet-group .snippet-code code:hover:only-of-type{background-color:transparent}.snippet-group .snippet-code code::before,.snippet-group .snippet-code code::after{display:none}.snippet-group .snippet-code code:hover::before{display:inline-block;content:'click to copy';color:rgba(0,0,0,.5);font-size:13px;background-color:rgba(0,0,0,.1);border-top-left-radius:5px;position:absolute;right:0;bottom:0;padding:3px 10px}.snippet-group .snippet-code code:active::before{content:''}.snippet-group .snippet-code code.copied::before{content:'copied';color:rgba(255,255,255,.5);background-color:rgba(0,0,0,.6)}.snippet-group .snippet-code code.nosupport::before{content:"browser not supported :'(";color:rgba(255,255,255,.5);background-color:rgba(0,0,0,.6)}.snippet-group .snippet-code .codepen-extra-css{display:none}@media (max-width:850px){.snippet-group .snippet-demo{padding-left:5px;padding-right:5px}}.snippet-group.is-full-width .snippet-demo-container{width:100%}.snippet-group.is-full-width .snippet-demos>.snippet-demo{width:100%;padding-left:0;padding-right:0}.snippet-group.is-full-width .snippet-demo-padding{width:0;padding:8px;margin:0}.codepen-button{z-index:50;cursor:pointer;background-image:url('codepen-logo.png');background-repeat:no-repeat;background-position:5px center;background-size:26px 26px;position:absolute;top:0;right:-125px;width:165px;height:46px;display:none;opacity:.6;overflow:hidden;box-sizing:border-box;white-space:nowrap;color:#000;padding:13px 15px 5px 50px;transition:right .5s,background-color .5s,opacity .5s,background-size .3s}.codepen-button::after{content:'Open in CodePen'}.codepen-button:hover{opacity:1;right:0;background-size:36px 36px;background-color:#f8f8f8;border-bottom-left-radius:10px}.docs-layout .docs-text-styling pre[class*=language-markup]{max-width:calc(100vw - 32px)}.docs-layout pre[class*=language-markup]{max-width:100vw;box-sizing:border-box;overflow:hidden}.docs-layout pre[class*=language-markup].codepen-button-enabled{padding-right:0}.docs-layout pre[class*=language-markup].codepen-button-enabled code{padding-right:50px}.codepen-button-enabled .codepen-button{display:inline-block}.token.attr-name,.token.builtin,.token.selector,.token.string{color:#E91E63}.token.boolean,.token.constant,.token.number,.token.property,.token.symbol,.token.tag{color:#9D1DB3}.token.atrule,.token.attr-value,.token.keyword{color:#00BCD4}.docs-layout code{font-size:85%}.docs-layout code,.docs-layout pre{display:inline-block;background-color:rgba(0,0,0,.06);border-radius:3px;white-space:pre-wrap}.docs-layout pre{padding:16px;font-size:87%;box-sizing:border-box}.docs-layout code:before,.docs-layout code:after{letter-spacing:-.2em;content:"\00a0"}.docs-layout pre>code:before,.docs-layout pre>code:after{letter-spacing:0;content:""}.docs-layout pre>code{background-color:rgba(0,0,0,0);padding:0;font-size:100%;width:100%;box-sizing:border-box;word-break:break-word}.docs-layout pre[class*=language-]>code[data-language]{overflow:hidden}pre[class*=language-]>code[data-language]::before{content:"";background:0 0}.token.cr:before,.token.lf:before{display:none}.language-css .token.string,.style .token.string,.token.entity,.token.operator,.token.url,.token.variable{color:#9D1DB3;background:0 0}code[class*=language-],pre[class*=language-]{color:rgba(0,0,0,.87);text-shadow:none}.token.function{color:#009688}.code-with-text{position:relative;width:auto;display:block;border-spacing:0;border-collapse:collapse;background-color:#fff;padding:15px;border-radius:3px;font-size:13px}.code-with-text pre{margin:15px -15px -15px;border-top-left-radius:0;border-top-right-radius:0;display:block;width:auto}.docs-toc ul{border-left:solid 3px #C0EbF1;padding-left:20px;line-height:28px}.docs-toc a{font-weight:400;color:#00BCD4}.docs-toc li{font-size:16px;list-style:none}.started .mdl-tabs__tab-bar{-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;border-bottom:0}.started .download-button-container{text-align:center;margin-bottom:20px}.started .mdl-tabs.is-upgraded .mdl-tabs__tab.is-active{color:#00ACC1}.started .mdl-tabs.is-upgraded .mdl-tabs__tab.is-active:after{background-color:#00ACC1}.started .docs-layout-content{text-align:center}.started .chapter-toc{display:table}.started .code-with-text{width:640px;box-sizing:border-box}.started .docs-layout .content section{max-width:960px;margin:0 auto}.started a,.about a,.faq a,.customize a{color:#00BCD4}.customize .docs-layout .content{max-width:960px;display:block;margin:0 auto 120px;padding:40px}.started .content h3,.started .content h4{display:table-cell;font-size:15px;padding-right:60px;line-height:25px;text-transform:none}.started .content h3{width:140px}.started .content section{margin-bottom:30px}.started .section-content{display:table-cell}.started .content,.styles .content,.faq .content{padding:40px;display:inline-block;text-align:left;width:100%;box-sizing:border-box}.docs-layout ul{list-style-type:none}.docs-layout li{position:relative}.styles .content li:before,.docs-readme .content li:before{position:absolute;top:2px;left:-28px;content:'•';font-size:32px}.started .content p{margin-top:10px;margin-bottom:15px}.started .mdl-tabs{margin-bottom:22px}.started .content .mdl-tabs__panel{padding-top:10px}.started .caption{font-size:13px;max-width:640px;box-sizing:border-box;margin-top:15px;padding:15px;background-color:#fff;border-radius:3px}.started .caption h4{font-size:13px;font-weight:400;font-style:italic;margin-top:0}.started .use-components pre{margin-top:0}.started .component-example{margin:30px 0}.started ol{padding-left:18px;font-size:13px;max-width:640px;box-sizing:border-box}.started pre{width:640px;box-sizing:border-box;position:relative}.started .snippet-group{max-width:640px;margin:60px 0 40px}@media (max-width:850px){.started .chapter-toc{display:block}.started .content h3,.started .content h4{display:block;width:auto}.started .section-content,.started pre{display:block}.started pre{width:auto}.started pre,.started .caption{margin-left:-40px;margin-right:-40px;max-width:none;box-sizing:content-box;padding:15px 40px}.started .mdl-tabs__tab-bar{margin-left:-40px;margin-right:-40px;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.started .mdl-tabs__tab{padding:0 3%}.started .content{display:block}.started .snippet-group{margin-left:-40px;margin-right:-40px;max-width:none}.started .snippet-group code{padding-left:40px;padding-right:40px}}.styles a{color:#00BCD4}.styles .styles__content h2{text-transform:none}.styles .typo-styles{margin-bottom:40px}.styles .typo-styles dt{display:block;float:left;color:#fff;background-color:rgba(0,0,0,.24);width:32px;height:32px;border-radius:16px;line-height:32px;text-align:center;font-weight:500;margin-top:5px}.styles .typo-styles dd{display:block;margin-left:60px;margin-bottom:20px}.styles .typo-styles .typo-styles__demo{margin-bottom:8px}.styles .typo-styles .typo-styles__desc{font-weight:300}.styles .typo-styles .typo-styles__desc .typo-styles__name{margin-right:8px;font-weight:400}.styles .download-btn{color:rgba(0,0,0,.54);line-height:20px;display:-webkit-flex;display:-ms-flexbox;display:flex;font-weight:300;margin-bottom:20px}.styles .download-btn.download-btn--customizer .material-icons{margin-top:-2px}.styles .download-btn>*{margin-right:8px}.styles .styles__ribbon{background-color:#4A148C;width:100vw;margin:80px 0 80px -40px;height:320px;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:stretch;-ms-flex-align:stretch;align-items:stretch}.styles .styles__ribbon,.styles .styles__ribbon>.ribbon__imagecontainer{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.styles .styles__ribbon>.ribbon__imagecontainer{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-ms-flex-align:center;align-items:center}.styles .styles__ribbon>.ribbon__imagecontainer>.ribbon__image{display:block;margin-bottom:48px;border:0}.styles .styles__ribbon>.ribbon__imagecontainer>.ribbon__caption{color:#fff;text-transform:uppercase;font-size:16px;font-weight:500;height:24px;line-height:24px;text-align:center}.styles .styles__ribbon>.ribbon__imagecontainer>.ribbon__caption.ribbon__caption--split{width:100%;text-align:left}.styles .styles__ribbon>.ribbon__imagecontainer>.ribbon__caption>.material-icons{height:24px;line-height:24px;vertical-align:middle;margin-top:-1px}.styles .styles__ribbon>.ribbon__imagecontainer>.ribbon__caption.ribbon__caption--split>.material-icons{float:right}.styles .content .docs-text-styling h3{text-transform:none;margin:0;font-size:14px;font-weight:700}.styles .content .docs-text-styling p{margin-top:0}.styles img.customizer{max-width:450px}.styles .code-with-text{margin-right:40px}.styles .docs-layout.is-small-screen .code-with-text pre[class*=language-markup]{width:100vw;max-width:none}.styles .content ul,.components .content ul{font-size:13px}.styles .content li:before{font-size:16px}.styles .content .mdl-cell.left-col{padding-right:40px}.styles .content .mdl-cell.right-col{margin-bottom:40px}.styles .code-with-text{margin-bottom:20px}.styles .content .styles__content{max-width:960px;margin:0 auto}.styles .styles__download{display:-webkit-flex;display:-ms-flexbox;display:flex}.styles .styles__download a{font-weight:500;margin-right:16px}.styles .styles__content a .customizer{border:0}@media (max-width:850px){.started .docs-layout .docs-text-styling pre[class*=language-markup]{max-width:none}.docs-layout .code-with-text{width:100%;margin-left:-40px;margin-right:-40px;padding:15px 40px;display:block;box-sizing:content-box}.docs-layout .code-with-text pre{width:auto;padding-left:40px;padding-right:40px;margin-left:-40px;margin-right:-40px}}@media (-webkit-min-device-pixel-ratio:2),(min--moz-device-pixel-ratio:2),(min-resolution:2dppx),(min-resolution:192dpi){.social-btn__twitter{background-image:url('https://www.gstatic.com/images/icons/material/system/2x/post_twitter_white_24dp.png')}.social-btn__gplus{background-image:url('https://www.gstatic.com/images/icons/material/system/2x/post_gplus_white_24dp.png')}.templates .docs-layout-header,.showcase .docs-layout-header{background-image:url('templates_2x.png')}.components .docs-layout-header{background-image:url('components_2x.png')}.styles .docs-layout-header{background-image:url('styles_2x.png')}.customize .docs-layout-header{background-image:url('customize_2x.png')}.about .docs-layout-header{background:url('logo.svg'),url('header_2x.jpg');background-size:auto 30%,cover;background-repeat:no-repeat,no-repeat;background-position:center center,center center}}.docs-navigation .spacer{-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}.components .docs-layout.is-small-screen .docs-text-styling pre{margin:0 -16px;width:100vw;max-width:640px}.docs-text-styling p{margin-top:16px;margin-bottom:16px}.components .content blockquote{font-size:13px;max-width:640px;box-sizing:border-box;margin-top:15px;padding:15px;background-color:#fff;border-radius:3px;margin-left:0}.components .content blockquote:before,.components .content blockquote:after{display:none}.faq .docs-text-styling>section{max-width:960px;margin:0 auto}.faq img{max-width:100%}.faq .mdl-tabs__tab-bar{-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;border-bottom:0}.faq .mdl-tabs.is-upgraded .mdl-tabs__tab.is-active{color:#00ACC1}.faq .mdl-tabs.is-upgraded .mdl-tabs__tab.is-active:after{background-color:#00ACC1}.faq .docs-layout-content{text-align:center}.faq .chapter-toc{display:table}.faq .content h3{display:table-cell;width:140px;font-size:15px;font-weight:700;padding-right:60px;line-height:25px}.faq .content section{margin-bottom:30px}.faq .section-content{display:table-cell}.faq .content p{margin-top:10px;margin-bottom:15px}.faq .mdl-tabs{margin-bottom:22px}.faq .content h4{font-size:15px;font-weight:700;margin-bottom:5px;margin-top:20px}.faq .content .mdl-tabs__panel{padding-top:10px}.faq .docs-layout.is-small-screen .docs-toc>*{display:block}.faq .caption{font-size:13px;max-width:640px;box-sizing:border-box;margin-top:15px;padding:15px;background-color:#fff;border-radius:3px}.faq .caption h4{font-size:13px;font-weight:400;font-style:italic;margin-top:0}.faq ol{padding-left:18px;font-size:13px;max-width:640px}.faq ol,.faq pre{box-sizing:border-box}.faq pre{width:640px;word-wrap:break-word}.faq .snippet-group{max-width:640px;margin:60px 0 40px}


#wheel{position:relative;height:100%;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center}.is-small-screen .mdl-gen #wheel{min-height:100vw}#wheel svg{width:100%;height:100%}@media (min-width:840px){#wheel svg{max-width:100%;width:100%}}#wheel .mdl-gen-download{position:absolute;left:50%;top:50%}#wheel .mdl-gen-download .mdl-button{-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}#wheel g[data-color]{opacity:1;transition:opacity .2s cubic-bezier(.4,0,1,1)}#wheel .selector{opacity:0;transition:opacity .4s cubic-bezier(.4,0,1,1);fill:#BDBDBD}#wheel .selected .selector{opacity:1}#wheel .label{text-anchor:middle;opacity:0;transition:opacity .4s cubic-bezier(.4,0,1,1);fill:#fff;font-size:24px}#wheel .selected--1 .label--1,#wheel .selected--2 .label--2{opacity:1}#wheel svg.hide-nonaccents g[data-color="Blue Grey"]:not(.selected),#wheel svg.hide-nonaccents g[data-color="Brown"]:not(.selected),#wheel svg.hide-nonaccents g[data-color="Grey"]:not(.selected){opacity:.12}#wheel .selected{opacity:1!important}.mdl-gen>.mdl-grid{max-width:1280px;padding:0}.mdl-gen__preview{position:relative;height:350px}.mdl-gen__preview .mdl-layout__container{height:auto}.mdl-gen__preview .mdl-layout__content{padding:32px;background-color:#EFEFEF;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start}.mdl-gen__preview .mdl-layout__content .mdl-button{margin:0}.mdl-gen__preview .mdl-layout__content .mdl-button--fab{-webkit-align-self:flex-end;-ms-flex-item-align:end;align-self:flex-end}.mdl-gen__preview .mdl-layout__content h3{margin-top:0}.mdl-gen__panel--right{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:stretch;-ms-flex-align:stretch;align-items:stretch;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding-bottom:0}.mdl-gen__desc strong,.mdl-gen__desc p{display:block;margin-bottom:32px;color:rgba(0,0,0,.54)}.mdl-gen__cdn .demo-code{box-sizing:border-box}.content{margin-left:auto;margin-right:auto;max-width:1280px;margin-bottom:80px}



code[class*="language-"],pre[class*="language-"]{color:#000;text-shadow:0 1px #fff;font-family:Consolas,Monaco,'Andale Mono',monospace;direction:ltr;text-align:left;white-space:pre;word-spacing:normal;word-break:normal;line-height:1.5;-moz-tab-size:4;tab-size:4;-webkit-hyphens:none;-moz-hyphens:none;-ms-hyphens:none;hyphens:none}pre[class*="language-"]::-moz-selection,pre[class*="language-"] ::-moz-selection,code[class*="language-"]::-moz-selection,code[class*="language-"] ::-moz-selection{text-shadow:none;background:#b3d4fc}pre[class*="language-"]::selection,pre[class*="language-"] ::selection,code[class*="language-"]::selection,code[class*="language-"] ::selection{text-shadow:none;background:#b3d4fc}@media print{code[class*="language-"],pre[class*="language-"]{text-shadow:none}}pre[class*="language-"]{padding:1em;margin:.5em 0;overflow:auto}:not(pre)>code[class*="language-"],pre[class*="language-"]{background:#f5f2f0}:not(pre)>code[class*="language-"]{padding:.1em;border-radius:.3em}.token.comment,.token.prolog,.token.doctype,.token.cdata{color:slategray}.token.punctuation{color:#999}.namespace{opacity:.7}.token.property,.token.tag,.token.boolean,.token.number,.token.constant,.token.symbol,.token.deleted{color:#905}.token.selector,.token.attr-name,.token.string,.token.char,.token.builtin,.token.inserted{color:#690}.token.operator,.token.entity,.token.url,.language-css .token.string,.style .token.string{color:#a67f59;background:hsla(0,0%,100%,.5)}.token.atrule,.token.attr-value,.token.keyword{color:#07a}.token.function{color:#DD4A68}.token.regex,.token.important,.token.variable{color:#e90}.token.important,.token.bold{font-weight:700}.token.italic{font-style:italic}.token.entity{cursor:help}


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


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/prism.min.js"></script>

<script type="text/javascript">




function init() {
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
        a.template = this.responseText, a.highlightField("Indigo"), a.highlightField("Pink"), window.requestAnimationFrame(function() {
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
                        this.updateCDN(), this.updateStylesheet()
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
                }), Prism.highlightElement(this.cdn)
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
                })
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
            var a = this.processTemplate(this.getSelectedPrimary(), this.getSelectedSecondary());
            e && e.parentNode && e.parentNode.removeChild(e), t.textContent = a, document.head.appendChild(t), this.prepareDownload(a)
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









// function init(){"use strict";var e=document.querySelector("#wheel > svg"),t=document.querySelector(".mdl-gen__cdn .mdl-gen__cdn-link"),a=new MaterialCustomizer(e,t),r=document.querySelector("#download");r.addEventListener("click",function(){window.navigator.msSaveBlob&&window.navigator.msSaveBlob(this.blob,"material.min.cssffffff")}.bind(a)),r.addEventListener("click",function(){ga("send",{hitType:"event",eventCategory:"customizer",eventAction:"download",eventLabel:a.getSelectedPrimary()+"-"+a.getSelectedSecondary()})});var n=0;t.addEventListener("click",function(){var e=window.getSelection();e.removeAllRanges();var a=document.createRange();if(0===n){var r=t.querySelectorAll(".token.attr-value")[1];a.setStart(r,2),a.setEnd(r,3)}else a.setStart(t,1),a.setEnd(t,2);e.addRange(a),n=(n+1)%2}),t.addEventListener("mouseup",function(e){e.preventDefault()}),t.addEventListener("mousedown",function(e){e.preventDefault()}),document.addEventListener("mouseup",function(){window.getSelection().toString().indexOf(".min.css")!==-1&&ga("send",{hitType:"event",eventCategory:"customizer",eventAction:"copy",eventLabel:a.getSelectedPrimary()+"-"+a.getSelectedSecondary()})});var i=new XMLHttpRequest;i.onload=function(){a.template=this.responseText,a.highlightField("Indigo"),a.highlightField("Pink"),window.requestAnimationFrame(function(){a.updateCDN(),a.updateStylesheet()})},i.open("get","../../material.min.css.template",!0),i.send()}MaterialCustomizer=function(){"use strict";function e(e){return e.parentElement||e.parentNode}var t=["Cyan","Teal","Green","Light Green","Lime","Yellow","Amber","Orange","Brown","Blue Grey","Grey","Deep Orange","Red","Pink","Purple","Deep Purple","Indigo","Blue","Light Blue"],a=["Blue Grey","Brown","Grey"],r=["Red","Pink","Purple","Deep Purple","Indigo","Blue","Light Blue","Cyan","Teal","Green","Light Green","Lime","Yellow","Amber","Orange","Deep Orange","Brown","Grey","Blue Grey"],n=["50","100","200","300","400","500","600","700","800","900","A100","A200","A400","A700"],i=[["255,235,238","255,205,210","239,154,154","229,115,115","239,83,80","244,67,54","229,57,53","211,47,47","198,40,40","183,28,28","255,138,128","255,82,82","255,23,68","213,0,0"],["252,228,236","248,187,208","244,143,177","240,98,146","236,64,122","233,30,99","216,27,96","194,24,91","173,20,87","136,14,79","255,128,171","255,64,129","245,0,87","197,17,98"],["243,229,245","225,190,231","206,147,216","186,104,200","171,71,188","156,39,176","142,36,170","123,31,162","106,27,154","74,20,140","234,128,252","224,64,251","213,0,249","170,0,255"],["237,231,246","209,196,233","179,157,219","149,117,205","126,87,194","103,58,183","94,53,177","81,45,168","69,39,160","49,27,146","179,136,255","124,77,255","101,31,255","98,0,234"],["232,234,246","197,202,233","159,168,218","121,134,203","92,107,192","63,81,181","57,73,171","48,63,159","40,53,147","26,35,126","140,158,255","83,109,254","61,90,254","48,79,254"],["227,242,253","187,222,251","144,202,249","100,181,246","66,165,245","33,150,243","30,136,229","25,118,210","21,101,192","13,71,161","130,177,255","68,138,255","41,121,255","41,98,255"],["225,245,254","179,229,252","129,212,250","79,195,247","41,182,246","3,169,244","3,155,229","2,136,209","2,119,189","1,87,155","128,216,255","64,196,255","0,176,255","0,145,234"],["224,247,250","178,235,242","128,222,234","77,208,225","38,198,218","0,188,212","0,172,193","0,151,167","0,131,143","0,96,100","132,255,255","24,255,255","0,229,255","0,184,212"],["224,242,241","178,223,219","128,203,196","77,182,172","38,166,154","0,150,136","0,137,123","0,121,107","0,105,92","0,77,64","167,255,235","100,255,218","29,233,182","0,191,165"],["232,245,233","200,230,201","165,214,167","129,199,132","102,187,106","76,175,80","67,160,71","56,142,60","46,125,50","27,94,32","185,246,202","105,240,174","0,230,118","0,200,83"],["241,248,233","220,237,200","197,225,165","174,213,129","156,204,101","139,195,74","124,179,66","104,159,56","85,139,47","51,105,30","204,255,144","178,255,89","118,255,3","100,221,23"],["249,251,231","240,244,195","230,238,156","220,231,117","212,225,87","205,220,57","192,202,51","175,180,43","158,157,36","130,119,23","244,255,129","238,255,65","198,255,0","174,234,0"],["255,253,231","255,249,196","255,245,157","255,241,118","255,238,88","255,235,59","253,216,53","251,192,45","249,168,37","245,127,23","255,255,141","255,255,0","255,234,0","255,214,0"],["255,248,225","255,236,179","255,224,130","255,213,79","255,202,40","255,193,7","255,179,0","255,160,0","255,143,0","255,111,0","255,229,127","255,215,64","255,196,0","255,171,0"],["255,243,224","255,224,178","255,204,128","255,183,77","255,167,38","255,152,0","251,140,0","245,124,0","239,108,0","230,81,0","255,209,128","255,171,64","255,145,0","255,109,0"],["251,233,231","255,204,188","255,171,145","255,138,101","255,112,67","255,87,34","244,81,30","230,74,25","216,67,21","191,54,12","255,158,128","255,110,64","255,61,0","221,44,0"],["239,235,233","215,204,200","188,170,164","161,136,127","141,110,99","121,85,72","109,76,65","93,64,55","78,52,46","62,39,35"],["250,250,250","245,245,245","238,238,238","224,224,224","189,189,189","158,158,158","117,117,117","97,97,97","66,66,66","33,33,33"],["236,239,241","207,216,220","176,190,197","144,164,174","120,144,156","96,125,139","84,110,122","69,90,100","55,71,79","38,50,56"]],l=function(e,t){this.wheel=e,this.cdn=t,this.cdn&&(this.cdnTpl=t.textContent),this.paletteIndices=r,this.lightnessIndices=n,this.palettes=i,this.init_()};return l.prototype.init_=function(){this.config={width:650,height:650,r:250,ri:100,hd:40,c:40,mrs:.5,alphaIncr:.005,colors:t},this.forbiddenAccents=a,this.calculateValues_(),this.wheel&&this.buildWheel_()},l.prototype.calculateValues_=function(){var e=this.config;e.alphaDeg=360/e.colors.length,e.alphaRad=e.alphaDeg*Math.PI/180,e.rs=(e.c+e.r)*Math.sin(e.alphaRad/2),e.rs*=e.mrs,e.selectorAlphaRad=2*Math.atan(e.rs/e.c),e.gamma1=e.alphaRad/2-e.selectorAlphaRad/2,e.gamma2=e.alphaRad/2+e.selectorAlphaRad/2,e.cx=(e.c+e.r)*Math.sin(e.alphaRad)/2,e.cy=-(e.c+e.r)*(1+Math.cos(e.alphaRad))/2,this.config=e},l.prototype.buildWheel_=function(){var e=this.config,t=this.wheel.querySelector("g.wheel--maing"),a=this.wheel.parentNode;this.wheel.setAttribute("viewBox","0 0 "+this.config.width+" "+this.config.height),this.wheel.setAttribute("preserveAspectRatio","xMidYMid meet"),this.wheel.setAttribute("width",this.config.width),this.wheel.setAttribute("height",this.config.height);var r=this.generateFieldTemplate_(),n="http://www.w3.org/2000/svg";e.colors.forEach(function(i,l){for(var o=r.cloneNode(!0),s=document.createElement("div"),c=1;c<=2;c++){var h=document.createElementNS(n,"g"),d=document.createElementNS(n,"text");d.setAttribute("class","label label--"+c),d.setAttribute("transform","rotate("+-e.alphaDeg*l+")"),d.setAttribute("dy","0.5ex"),d.textContent=""+c,h.appendChild(d),h.setAttribute("transform","translate("+e.cx+","+e.cy+")"),o.appendChild(h)}o.setAttribute("data-color",i),o.id=i,o.querySelector(".polygons > *:nth-child(1)").style.fill="rgb("+this.getColor(i,"500")+")",o.querySelector(".polygons > *:nth-child(2)").style.fill="rgb("+this.getColor(i,"700")+")",o.querySelector(".polygons").addEventListener("click",this.fieldClicked_.bind(this)),o.setAttribute("transform","rotate("+e.alphaDeg*l+")"),t.appendChild(o),s.setAttribute("for",i),s.className="mdl-tooltip mdl-tooltip--large",s.innerHTML=i,a.appendChild(s)}.bind(this)),t.setAttribute("transform","translate("+e.width/2+","+e.height/2+")")},l.prototype.generateFieldTemplate_=function(){var e="http://www.w3.org/2000/svg",t=this.config,a=document.createElementNS(e,"g"),r=document.createElementNS(e,"g"),n=document.createElementNS(e,"polygon");n.setAttribute("points",[[t.ri*Math.sin(t.alphaRad+t.alphaIncr),-t.ri*Math.cos(t.alphaRad+t.alphaIncr)].join(","),[t.r*Math.sin(t.alphaRad+t.alphaIncr),-t.r*Math.cos(t.alphaRad+t.alphaIncr)].join(","),[0,-t.r].join(","),[0,-(t.ri+t.hd)].join(",")].join(" "));var i=document.createElementNS(e,"polygon");i.setAttribute("points",[[t.ri*Math.sin(t.alphaRad+t.alphaIncr),-t.ri*Math.cos(t.alphaRad+t.alphaIncr)].join(","),[(t.ri+t.hd)*Math.sin(t.alphaRad+t.alphaIncr),-(t.ri+t.hd)*Math.cos(t.alphaRad+t.alphaIncr)].join(","),[0,-(t.ri+t.hd)].join(","),[0,-t.ri].join(",")].join(" ")),r.appendChild(n),r.appendChild(i),r.setAttribute("class","polygons"),a.appendChild(r);var l=document.createElementNS(e,"path");return l.setAttribute("class","selector"),l.setAttribute("d"," M "+t.r*Math.sin(t.alphaRad)/2+" "+-(t.r*(1+Math.cos(t.alphaRad))/2)+" L "+(t.cx-t.rs*Math.cos(t.gamma1))+" "+(t.cy-t.rs*Math.sin(t.gamma1))+" A "+t.rs+" "+t.rs+" "+t.alphaDeg+" 1 1 "+(t.cx+t.rs*Math.cos(t.gamma2))+" "+(t.cy+t.rs*Math.sin(t.gamma2))+" z "),a.appendChild(l),a},l.prototype.getNumSelected=function(){return this.wheel.querySelector(".selected--2")?2:this.wheel.querySelector(".selected--1")?1:0},l.prototype.fieldClicked_=function(t){var a=e(e(t.target)),r=a.getAttribute("data-color"),n=this.getNumSelected();if((a.getAttribute("class")||"").indexOf("selected--1")===-1||1!==n)switch(n){case 1:if(this.forbiddenAccents.indexOf(r)!==-1)return;this.highlightField(a.getAttribute("data-color")),this.wheel.setAttribute("class",""),window.requestAnimationFrame(function(){this.updateCDN(),this.updateStylesheet()}.bind(this));break;case 2:Array.prototype.forEach.call(this.wheel.querySelector("g.wheel--maing").childNodes,function(e){e.setAttribute("class",""),e.querySelector(".polygons").setAttribute("filter","")});case 0:this.highlightField(a.getAttribute("data-color")),window.requestAnimationFrame(function(){this.wheel.setAttribute("class","hide-nonaccents")}.bind(this))}},l.prototype
// 	.replaceDict=function(e,t){for(var a in t)e=e
// 	.replace(new RegExp(a,"g"),t[a]);return e},l.prototype.urlsafeName=function(e){return e.toLowerCase()
// 	.replace(" ","_")},l.prototype.getSelectedPrimary=function(){return this.wheel.querySelector(".selected--1").getAttribute("data-color")},l.prototype.getSelectedSecondary=function(){return this.wheel.querySelector(".selected--2").getAttribute("data-color")},l.prototype.updateCDN=function(){var e=this.getSelectedPrimary(),t=this.getSelectedSecondary();this.cdn.textContent=this
// 	.replaceDict(this.cdnTpl,{"\\$primary":this.urlsafeName(e),"\\$accent":this.urlsafeName(t)}),Prism.highlightElement(this.cdn)},l.prototype.highlightField=function(t){var a=this.wheel.querySelector('[data-color="'+t+'"]'),r=e(a);r.removeChild(a),r.appendChild(a),a.setAttribute("class","selected selected--"+(this.getNumSelected()+1));var n=window.navigator.msPointerEnabled;n||a.querySelector(".polygons").setAttribute("filter","url(#drop-shadow)")},l.prototype.getColor=function(e,t){var a=this.palettes[this.paletteIndices.indexOf(e)];return a?a[this.lightnessIndices.indexOf(t)]:null},l.prototype.processTemplate=function(e,t){var a=this.getColor(e,"500"),r=this.getColor(e,"700"),n=this.getColor(t,"A200");return this
// 	.replaceDict(this.template,{"\\$color-primary-dark":r,"\\$color-primary-contrast":this.calculateTextColor(a),"\\$color-accent-contrast":this.calculateTextColor(n),"\\$color-primary":a,"\\$color-accent":n})},l.prototype.calculateChannel=function(e){return e/=255,e<.03928?e/12.92:Math.pow((e+.055)/1.055,2.4)},l.prototype.calculateLuminance=function(e){var t=e.split(","),a=this.calculateChannel(parseInt(t[0])),r=this.calculateChannel(parseInt(t[1])),n=this.calculateChannel(parseInt(t[2]));return.2126*a+.7152*r+.0722*n},l.prototype.calculateContrast=function(e,t){var a=this.calculateLuminance(e)+.05,r=this.calculateLuminance(t)+.05;return Math.max(a,r)/Math.min(a,r)},l.prototype.calculateTextColor=function(e){var t=3.1,a="255,255,255",r="66,66,66",n=this.calculateContrast(e,a);if(n>=t)return a;var i=this.calculateContrast(e,r);return i>n?r:a},l.prototype
// 	.replaceKeyword=function(e,t,a){return e
// 	.replace(new RegExp(t,"g"),a)},l.prototype.updateStylesheet=function(){var e=document.getElementById("main-stylesheet"),t=document.createElement("style");t.id="main-stylesheet";var a=this.processTemplate(this.getSelectedPrimary(),this.getSelectedSecondary());e&&e.parentNode&&e.parentNode.removeChild(e),t.textContent=a,document.head.appendChild(t),this.prepareDownload(a)},l.prototype.prepareDownload=function(e){var t=document.getElementById("download"),a=new Blob([e],{type:"text/css"});this.blob=a;var r=URL.createObjectURL(a);t.setAttribute("href",r),t.setAttribute("download","material.min.css")},l}(),"undefined"!=typeof module&&(module.exports=MaterialCustomizer);

	// color_select_panel
	// style_plug

	$('#wheel').click(function(){
		// var theText = $('.token.attr-value').text();
		// alert(theText);

		$('html').addClass('demo_colors');

	});

</script>

          <script>init();</script>

@endsection
