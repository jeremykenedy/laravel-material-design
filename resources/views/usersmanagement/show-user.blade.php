@extends('layouts.dashboard')

@section('template_title')
  Showing User {{ $user->name }}
@endsection

@section('header')
  Showing {{ $user->name }}
@endsection

@php
  $levelAmount = trans('usersmanagement.labelUserLevel');
  if ($user->level() >= 2) {
      $levelAmount = trans('usersmanagement.labelUserLevels');
  }
@endphp

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
    <a itemprop="item" href="/users">
      <span itemprop="name">
        Users List
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="/users/{{ $user->id }}">
      <span itemprop="name">
        {{ $user->name }}
      </span>
    </a>
    <meta itemprop="position" content="3" />
  </li>
@endsection

@section('content')

{{--



@if ($user->hasRole('user'))
  @php
        $access_level   = 'User';
        $access_class   = 'mdl-color--green-200 mdl-color-text--white';
        $access_icon  = 'lock';
  @endphp
@elseif ($user->hasRole('editor'))
  @php
        $access_level   = 'Editor';
        $access_class   = 'mdl-color--green-400 mdl-color-text--white';
        $access_icon  = 'lock_outline';
  @endphp
@elseif ($user->hasRole('administrator'))
  @php
        $access_level   = 'Administrator';
        $access_class   = 'mdl-color--green-600 mdl-color-text--white';
        $access_icon  = 'verified_user';
  @endphp
@endif

--}}

@foreach ($roles as $role)
    @if ($role->name == 'User')
        @php
            $levelIcon        = 'person';
            $levelName        = 'User';
            $levelBgClass     = 'mdl-color--blue-200';
            $leveIconlBgClass = 'mdl-color--blue-500';
        @endphp
    @elseif ($role->name == 'Admin')
        @php
            $levelIcon        = 'supervisor_account';
            $levelName        = 'Admin';
            $levelBgClass     = 'mdl-color--red-200';
            $leveIconlBgClass = 'mdl-color--red-500';
        @endphp
    @elseif ($role->name == 'Unverified')
        @php
            $levelIcon        = 'person_outline';
            $levelName        = 'Unverified';
            $levelBgClass     = 'mdl-color--orange-200';
            $leveIconlBgClass = 'mdl-color--orange-500';
        @endphp
    @else
        @php
            $levelIcon        = 'person_outline';
            $levelName        = 'Unverified';
            $levelBgClass     = 'mdl-color--orange-200';
            $leveIconlBgClass = 'mdl-color--orange-500';
        @endphp
    @endif
@endforeach




<div class="mdl-grid full-grid margin-top-0 padding-0">
  <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
      <div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
      <div class="mdl-user-avatar">
        <img src="{{ Gravatar::get($user->email) }}" alt="{{ $user->name }}">
        <span itemprop="image" style="display:none;">{{ Gravatar::get($user->email) }}</span>
      </div>
{{--
        <div class="mdl-card__title" @if ($user->profile->user_profile_bg != NULL) style="background: url('{{$user->profile->user_profile_bg}}') center/cover;" @endif>
            <h3 class="mdl-card__title-text mdl-title-username">
              {{ $user->name }}
            </h3>
        </div>
    --}}
        <div class="mdl-card__supporting-text">
        <div class="mdl-grid full-grid padding-0">
          <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">
              <ul class="demo-list-icon mdl-list">
                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-icon">security</i>
                      <span class="mdl-chip mdl-chip--contact {{ $levelBgClass }} mdl-color-text--white md-chip">
                        <span class="mdl-chip__contact {{ $leveIconlBgClass }} mdl-color-text--white">
                            <i class="material-icons">{{ $levelIcon }}</i>
                        </span>
                        <span class="mdl-chip__text">{{ $levelName }}</span>
                      </span>
                    </div>
                  </li>

                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-icon">event</i>
                      Created: {{ $user->created_at }}
                    </div>
                  </li>

                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-icon">event</i>
                      Last Updated: {{ $user->updated_at }}
                    </div>
                  </li>

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
{{--
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



              </ul>
          </div>

          @if ($user->profile->location)
            <div class="mdl-cell mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop margin-top-0 margin-top-half-6-desktop">

              <ul class="demo-list-icon mdl-list padding-0 margin-bottom-half-1">
                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                      <i class="material-icons mdl-list__item-icon">location_on</i>
                    <span itemprop="streetAddress">
                      {{ $user->profile->location }}
                    </span>
                    </div>
                  </li>
              </ul>

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

--}}

        </div>
        </div>
        @if (Auth::user()->id == $user->id)
          <div class="mdl-card__actions">
          <div class="mdl-grid full-grid">
            <div class="mdl-cell mdl-cell--12-col">
              <a href="/profile/{{ Auth::user()->name }}/edit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white">
                <i class="material-icons padding-right-half-1">edit</i>
                {{ Lang::get('titles.editProfile') }}
              </a>
            </div>
          </div>
          </div>
        @endif
        <div class="mdl-card__menu">

        <a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
          <i class="material-icons">edit</i>
        </a>

        {!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'inline-block')) !!}
          {!! Form::hidden('_method', 'DELETE') !!}
          <a href="#" class="dialog-button-delete mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">delete</i>
          </a>
          @include('dialogs.dialog-delete')
        {!! Form::close() !!}

        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
          <i class="material-icons">share</i>
        </button>

        </div>
      </div>
  </div>
</div>






















{{--



  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="panel @if ($user->activated == 1) panel-success @else panel-danger @endif">

          <div class="panel-heading">
            <a href="/users/" class="btn btn-primary btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              <span class="hidden-xs">{{ trans('usersmanagement.usersBackBtn') }}</span>
            </a>
            {{ trans('usersmanagement.usersPanelTitle') }}
          </div>
          <div class="panel-body">

            <div class="well">
              <div class="row">
                <div class="col-sm-6">
                  <img src="@if ($user->profile && $user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" id="" class="img-circle center-block margin-bottom-2 margin-top-1 user-image">
                </div>

                <div class="col-sm-6">
                  <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                    {{ $user->name }}
                  </h4>
                  <p class="text-center text-left-tablet">
                    <strong>
                      {{ $user->first_name }} {{ $user->last_name }}
                    </strong>
                    <br />
                    {{ HTML::mailto($user->email, $user->email) }}
                  </p>

                  @if ($user->profile)
                    <div class="text-center text-left-tablet margin-bottom-1">

                      <a href="{{ url('/profile/'.$user->name) }}" class="btn btn-sm btn-info">
                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.viewProfile') }}</span>
                      </a>

                      <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.editUser') }} </span>
                      </a>

                      {!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'form-inline')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')) !!}
                      {!! Form::close() !!}

                    </div>
                  @endif

                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($user->name)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelUserName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->email)

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelEmail') }}
              </strong>
            </div>

            <div class="col-sm-7">
              {{ HTML::mailto($user->email, $user->email) }}
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @endif

            @if ($user->first_name)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelFirstName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->first_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->last_name)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelLastName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->last_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelRole') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @foreach ($user->roles as $user_role)

                @if ($user_role->name == 'User')
                  @php $labelClass = 'primary' @endphp

                @elseif ($user_role->name == 'Admin')
                  @php $labelClass = 'warning' @endphp

                @elseif ($user_role->name == 'Unverified')
                  @php $labelClass = 'danger' @endphp

                @else
                  @php $labelClass = 'default' @endphp

                @endif

                <span class="label label-{{$labelClass}}">{{ $user_role->name }}</span>

              @endforeach
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelStatus') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($user->activated == 1)
                <span class="label label-success">
                  Activated
                </span>
              @else
                <span class="label label-danger">
                  Not-Activated
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelAccessLevel')}} {{ $levelAmount }}:
              </strong>
            </div>

            <div class="col-sm-7">

              @if($user->level() >= 5)
                <span class="label label-primary margin-half margin-left-0">5</span>
              @endif

              @if($user->level() >= 4)
                 <span class="label label-info margin-half margin-left-0">4</span>
              @endif

              @if($user->level() >= 3)
                <span class="label label-success margin-half margin-left-0">3</span>
              @endif

              @if($user->level() >= 2)
                <span class="label label-warning margin-half margin-left-0">2</span>
              @endif

              @if($user->level() >= 1)
                <span class="label label-default margin-half margin-left-0">1</span>
              @endif

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                {{ trans('usersmanagement.labelPermissions') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if($user->canViewUsers())
                <span class="label label-primary margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionView') }}
                </span>
              @endif

              @if($user->canCreateUsers())
                <span class="label label-info margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionCreate') }}
                </span>
              @endif

              @if($user->canEditUsers())
                <span class="label label-warning margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionEdit') }}
                </span>
              @endif

              @if($user->canDeleteUsers())
                <span class="label label-danger margin-half margin-left-0"">
                  {{ trans('permsandroles.permissionDelete') }}
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($user->created_at)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelCreatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->updated_at)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelUpdatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->signup_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->signup_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->signup_confirmation_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->signup_confirmation_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->signup_sm_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->signup_sm_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->admin_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->admin_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->updated_ip_address)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->updated_ip_address }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

          </div>

        </div>
      </div>
    </div>
  </div>

--}}


@endsection

@section('footer_scripts')

  @include('scripts.google-maps-geocode-and-map')

  <script type="text/javascript">

    mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');

  </script>

@endsection