<style type="text/css">

.mdl-weather {
  list-style-type: none;
  padding: 1em;
}

.show-weather,
#forecast {
    display: none;
}

.mdl-weather .mdl-menu__item {
    width: 100%;
}






















</style>

<div class="mdl-card mdl-color--grey-700 weather-container" style="width: 100%; background-color: #616161;">
    <div class="mdl-card__title mdl-color-text--white">
        <h2 class="mdl-card__title-text">
            Your Weather
        </h2>
    </div>
    <div class="mdl-card__supporting-text margin-top-0 padding-top-0 mdl-color-text--white">
        @if (Auth::user()->profile->location)
            <div id="weather"></div>
            <div id="forecast"></div>
        @else
            No Location Set
        @endif
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white show-forecast">
            Forecast
        </a>
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white show-weather">
            Current
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









@section('template_scripts')

    @include('scripts.weather')



@endsection