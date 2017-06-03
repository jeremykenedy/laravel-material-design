@extends('layouts.auth')

@section('template_title')
    {{ trans('auth.register') }}
@endsection

@section('content')

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
        <main class="mdl-layout__content padding-top-2-tablet padding-bottom-2-tablet">
            <div class="mdl-grid mdl-grid--no-spacing">
                <div class="mdl-cell--6-col-tablet mdl-cell--1-offset-tablet mdl-cell--6-col-desktop mdl-cell--3-offset-desktop ">
                    <div class="demo-card-full mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                            <h2 class="mdl-card__title-text text-center full-span block">
                                {{ trans('titles.register') }}
                            </h2>
                        </div>
                        <div class="mdl-card__supporting-text ">
                            {!! Form::open(['route' => 'register', 'id' => 'register', 'role' => 'form', 'method' => 'POST'] ) !!}

                                {{ csrf_field() }}

                                <div class="mdl-grid ">

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                                            {!! Form::text('name', null, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*')) !!}
                                            {!! Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label')); !!}
                                            <span class="mdl-textfield__error">@if ($errors->has('name')){{{ $errors->first('name') }}} @endif</span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                                            {!! Form::email('email', null, array('id' => 'email', 'class' => 'mdl-textfield__input' )) !!}
                                            {!! Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label')); !!}
                                            <span class="mdl-textfield__error">@if ($errors->has('email')){{{ $errors->first('email') }}} @endif</span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
                                            {!! Form::text('first_name', null, array('id' => 'first_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
                                            {!! Form::label('first_name', trans('auth.first_name') , array('class' => 'mdl-textfield__label')); !!}
                                            <span class="mdl-textfield__error">@if ($errors->has('first_name')){{{ $errors->first('first_name') }}} @endif </span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('last_name') ? 'is-invalid' :'' }}">
                                            {!! Form::text('last_name', null, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
                                            {!! Form::label('last_name', trans('auth.last_name') , array('class' => 'mdl-textfield__label')); !!}
                                            <span class="mdl-textfield__error">@if ($errors->has('last_name')){{{ $errors->first('last_name') }}} @endif </span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? 'is-invalid' :'' }}">
                                            {!! Form::password('password', array('id' => 'password', 'class' => 'mdl-textfield__input', 'required' => 'required' )) !!}
                                            {!! Form::label('password', trans('auth.password') , array('class' => 'mdl-textfield__label')); !!}
                                            <span class="mdl-textfield__error">@if ($errors->has('password')){{{ $errors->first('password') }}} @endif</span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password_confirmation') ? 'is-invalid' :'' }}">
                                            {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'mdl-textfield__input', 'required' => 'required' )) !!}
                                            {!! Form::label('password_confirmation', trans('auth.confirmPassword') , array('class' => 'mdl-textfield__label')); !!}
                                            <span class="mdl-textfield__error">@if ($errors->has('password_confirmation')){{{ $errors->first('password_confirmation') }}} @endif</span>
                                        </div>
                                    </div>

                                    @if(config('settings.reCaptchStatus'))
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
                                        </div>
                                    @endif

                                    <div class="mdl-cell mdl-cell--12-col">
                                        {!! Form::button('<span class="mdl-spinner-text">'.trans('auth.register').'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--primary mdl-color-text--white mdl-button--raised full-span margin-bottom-1 margin-top-2','type' => 'submit','id' => 'submit')) !!}
                                    </div>
                                </div>

                            {!! Form::close() !!}
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            @include('partials.socials-icons')
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            {!! HTML::link(route('password.request'), trans('auth.forgot'), array('id' => 'forgot', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect left')) !!}
                            {!! HTML::link(url('/login'), trans('auth.login'), array('id' => 'login', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect right')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection

@section('footer_scripts')

    @include('scripts.mdl-required-input-fix')
    @include('scripts.html5-password-match-check')
    {!! HTML::script('https://www.google.com/recaptcha/api.js', array('type' => 'text/javascript')) !!}

@endsection
