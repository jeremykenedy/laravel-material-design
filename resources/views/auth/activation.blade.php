@extends('layouts.auth')

@section('template_title')
	{{ trans('titles.activation') }}
@endsection

@section('template_styles')
	<style type="text/css">
		.mdl-grid.mdl-grid--no-spacing {
			display: block;
			margin: 1em;
		}
	</style>
@endsection

@section('content')

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
        <main class="mdl-layout__content margin-top-3-tablet">
			<div class="mdl-grid mdl-grid--no-spacing">
			  	<div class="mdl-cell--6-col-tablet mdl-cell--1-offset-tablet mdl-cell--6-col-desktop mdl-cell--3-offset-desktop ">
			       	<div class="demo-card-full mdl-card mdl-shadow--2dp">
		                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
		                    <h2 class="mdl-card__title-text text-center full-span block">

		                        {{ trans('auth.confirmation') }}

		                    </h2>
		                </div>
		                <div class="mdl-card__supporting-text ">
			                <p>{{ trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
							<p>{{ trans('auth.clickInEmail') }}</p>
							<p><a href='/activation' class="mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-2">{{ trans('auth.clickHereResend') }}</a></p>
		                </div>
		                <div class="mdl-card__actions mdl-card--border">

		                    {!! HTML::link(url('/logout'), trans('auth.logout'), array('id' => 'logout', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect right')) !!}

		                </div>
			        </div>
			  	</div>
			</div>
        </main>
    </div>

@endsection