@extends('layouts.auth')

@section('template_title')
	{!! trans('titles.exceeded') !!}
@endsection

@section('content')

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
        <main class="mdl-layout__content margin-top-3-tablet">
			<div class="mdl-grid mdl-grid--no-spacing">
			  	<div class="mdl-cell--6-col-tablet mdl-cell--1-offset-tablet mdl-cell--6-col-desktop mdl-cell--3-offset-desktop ">
			       	<div class="demo-card-full mdl-card mdl-shadow--2dp">
		                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
		                    <h2 class="mdl-card__title-text text-center full-span block">

		                        {{ trans('titles.exceeded') }}

		                    </h2>
		                </div>
		                <div class="mdl-card__supporting-text ">
							<p>
								{!! trans('auth.tooManyEmails', ['email' => $email, 'hours' => $hours]) !!}
							</p>
		                </div>
			        </div>
			  	</div>
			</div>
        </main>
    </div>

@endsection