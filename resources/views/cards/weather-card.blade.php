<div class="mdl-card mdl-shadow--2dp mdl-cell margin-top-0-tablet-important mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop weather-container">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text">
            Your Weather
        </h2>
    </div>

    <div class="mdl-card__supporting-text margin-top-0 padding-top-0">
        <div id="weather"></div>
        <div id="forecast"></div>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-forecast">
            Show Forecast
        </a>
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-weather">
            Show Current
        </a>
    </div>
    <div class="mdl-card__menu">
        <button id="menu-lower-right" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
            <i class="material-icons">more_vert</i>
        </button>
        <ul for="menu-lower-right" class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect">
            {{--
                <li class="mdl-menu__item show-forecast">Forecast</li>
                <li class="mdl-menu__item show-weather">Current</li>
            --}}
            <li class="mdl-menu__item js-geolocation">Current Location</li>
            <li class="mdl-menu__item js-user-location">User Location</li>

        </ul>
    </div>
</div>

@section('footer_scripts')
    @include('scripts.weather')
@endsection