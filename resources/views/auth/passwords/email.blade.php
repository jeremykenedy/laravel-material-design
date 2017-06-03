@extends('layouts.auth')

@section('template_title')
    {{ trans('auth.resetPassword') }}
@endsection

@section('content')

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100 mdl-auth-form">
        <main class="mdl-layout__content_auth">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text text-center full-span block">

                        {{ trans('titles.resetPword') }}

                    </h2>
                </div>
                <div class="mdl-card__supporting-text">

                    {!! Form::open(array('url' => '/password/email', 'method' => 'POST', 'class' => 'auth-form', 'id' => 'reset')) !!}

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                            {!! Form::email('email', null, array('id' => 'email', 'class' => 'mdl-textfield__input', )) !!}
                            {!! Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label')); !!}
                            <span class="mdl-textfield__error">@if ($errors->has('email')){{{ $errors->first('email') }}} @endif</span>
                        </div>

                        @if(config('settings.reCaptchStatus'))
                            <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
                        @endif

                        {!! Form::button('<span class="mdl-spinner-text">'.trans('auth.sendResetLink').'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--primary mdl-color-text--white mdl-button--raised full-span margin-bottom-1 margin-top-2','type' => 'submit','id' => 'submit')) !!}

                    {!! Form::close() !!}

                </div>
                <div class="mdl-card__actions mdl-card--border">

                    {!! HTML::link(url('/register'), trans('auth.register'), array('id' => 'register', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect left')) !!}
                    {!! HTML::link(url('/login'), trans('auth.login'), array('id' => 'login', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect right')) !!}

                </div>
            </div>
        </main>
    </div>

@endsection

@section('footer_scripts')
    {!! HTML::script('https://www.google.com/recaptcha/api.js', array('type' => 'text/javascript')) !!}
@endsection