@extends('auth')

@section('template_title')
	Activation Sent
@endsection


@section('template_fastload_css')

	.mdl-grid.mdl-grid--no-spacing {
		display: block;
		margin: 1em;
	}

@endsection

@section('content')

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
        <main class="mdl-layout__content margin-top-3-tablet">
			<div class="mdl-grid mdl-grid--no-spacing">
			  	<div class="mdl-cell--6-col-tablet mdl-cell--1-offset-tablet mdl-cell--6-col-desktop mdl-cell--3-offset-desktop ">
			       	<div class="demo-card-full mdl-card mdl-shadow--2dp">
		                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
		                    <h2 class="mdl-card__title-text text-center full-span block">

		                        Confimation Sent

		                    </h2>
		                </div>
		                <div class="mdl-card__supporting-text ">
							<p>
								{{ Lang::get('auth.sentEmail',['email' => $email] ) }}
							</p>
							<p>
								{{ Lang::get('auth.clickInEmail') }}
							</p>
		                </div>
		                <div class="mdl-card__actions mdl-card--border">

		                    {!! HTML::link(url('/password/email'), Lang::get('auth.forgot'), array('id' => 'forgot', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect left')) !!}

		                    {!! HTML::link(url('/login'), Lang::get('auth.login'), array('id' => 'login', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect right')) !!}

		                </div>
			        </div>
			  	</div>
			</div>
        </main>
    </div>

@endsection

@section('template_scripts')
@endsection