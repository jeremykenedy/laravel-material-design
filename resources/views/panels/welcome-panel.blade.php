@php

    $levelAmount      = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';
    }

@endphp

<div class="{{ $userCardBg }} mdl-card__title @if (Auth::user()->profile->user_profile_bg == NULL) @endif" @if (Auth::user()->profile->user_profile_bg != NULL) style="background: url('{{Auth::user()->profile->user_profile_bg}}') center/cover;" @endif>
    <h2 class="mdl-card__title-text mdl-title-username mdl-color-text--white text-center">
        Hi {{ Auth::user()->name }}
    </h2>
</div>
<div class="mdl-card__supporting-text mdl-color-text--grey-600">
    <p>
        <em>Thank you</em> for checking out this Laravel Material Design Lite project. <strong>Please remember to star this repository!</strong>
    </p>
    <p>
        This page route is protected by <code>activated</code> middleware. Only accounts with activated emails are able pass this middleware.
    </p>
    <p>
        <small>
            <i class="material-icons md-18 vertical-align-minus-4">verified_user</i> Users registered via Social providers are by default activated.
        </small>
    </p>
    <hr>
    <p>
        You have
        <span class="mdl-chip mdl-chip--contact {{ $levelBgClass }} mdl-color-text--white md-chip">
            <span class="mdl-chip__contact {{ $leveIconlBgClass }} mdl-color-text--white">
                <i class="material-icons">{{ $levelIcon }}</i>
            </span>
            <span class="mdl-chip__text">{{ $levelName }}</span>
        </span>
    </p>
    <hr>
    <p>
        You have access to {{ $levelAmount }}:
        @level(5)
            <span class="mdl-chip sm-chip {{ $accessLevel5Bg }} mdl-color-text--white">
                <span class="mdl-chip__text">5</span>
            </span>
        @endlevel

        @level(4)
            <span class="mdl-chip sm-chip {{ $accessLevel4Bg }} mdl-color-text--white">
                <span class="mdl-chip__text">4</span>
            </span>
        @endlevel

        @level(3)
            <span class="mdl-chip sm-chip {{ $accessLevel3Bg }} mdl-color-text--white">
                <span class="mdl-chip__text">3</span>
            </span>
        @endlevel

        @level(2)
            <span class="mdl-chip sm-chip {{ $accessLevel2Bg }} mdl-color-text--white">
                <span class="mdl-chip__text">2</span>
            </span>
        @endlevel

        @level(1)
            <span class="mdl-chip sm-chip {{ $accessLevel1Bg }} mdl-color-text--white">
                <span class="mdl-chip__text">1</span>
            </span>
        @endlevel
    </p>

   @permission('view.users', 'create.users', 'edit.users', 'delete.users')
        <hr>
        <p>
            You have permissions:
            @permission('view.users')
                <span class="mdl-chip mdl-chip--contact {{ $userPermDetails['view']['bg'] }} mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact {{ $userPermDetails['view']['iconBg'] }} mdl-color-text--white">
                        <i class="material-icons">{{ $userPermDetails['view']['icon'] }}</i>
                    </span>
                    <span class="mdl-chip__text">{{ trans('permsandroles.permissionView') }}</span>
                </span>
            @endpermission

            @permission('create.users')
                <span class="mdl-chip mdl-chip--contact {{ $userPermDetails['create']['bg'] }} mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact {{ $userPermDetails['create']['iconBg'] }} mdl-color-text--white">
                        <i class="material-icons">{{ $userPermDetails['create']['icon'] }}</i>
                    </span>
                    <span class="mdl-chip__text">{{ trans('permsandroles.permissionCreate') }}</span>
                </span>
            @endpermission

            @permission('edit.users')
                <span class="mdl-chip mdl-chip--contact {{ $userPermDetails['edit']['bg'] }} mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact {{ $userPermDetails['edit']['iconBg'] }} mdl-color-text--white">
                        <i class="material-icons">{{ $userPermDetails['edit']['icon'] }}</i>
                    </span>
                    <span class="mdl-chip__text">{{ trans('permsandroles.permissionEdit') }}</span>
                </span>
            @endpermission

            @permission('delete.users')
                <span class="mdl-chip mdl-chip--contact {{ $userPermDetails['delete']['bg'] }} mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact {{ $userPermDetails['delete']['iconBg'] }} mdl-color-text--white">
                        <i class="material-icons">{{ $userPermDetails['delete']['icon'] }}</i>
                    </span>
                    <span class="mdl-chip__text">{{ trans('permsandroles.permissionDelete') }}</span>
                </span>
            @endpermission
        </p>

    @endpermission

    <br />
    <br />

    <iframe src="https://ghbtns.com/github-btn.html?user=jeremykenedy&repo=laravel-material-design&type=star&count=true" frameborder="0" scrolling="0" class="star-count"></iframe>

</div>
