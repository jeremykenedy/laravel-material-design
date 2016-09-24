<div class="mdl-card mdl-color--grey-700" style="width: 100%">
    <div class="mdl-card__title mdl-color-text--white">
        <h2 class="mdl-card__title-text">
            Your Weather
        </h2>
    </div>
    <div class="mdl-card__supporting-text margin-top-0 padding-top-0 mdl-color-text--white">

        @if (Auth::user()->profile->location)

            @include('scripts.weather')

            <div id="weather"></div>

        @else

            No Location Set

        @endif

    </div>
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
            5 Day Forecast
        </a>
    </div>

    {{--
    <div class="mdl-card__menu">
        <button id="menu-lower-right" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">more_horiz</i>
        </button>
        <ul for="menu-lower-right" class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect">
            <li class="mdl-menu__item">5 Day Forecast</li>
            <li class="mdl-menu__item">Weather Now</li>
        </ul>
    </div>
    --}}
</div>



