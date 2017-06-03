<script type="text/javascript">

    $(document).ready(function() {
      var userLocation = '{{ Auth::user()->profile->location }}' ? '{{ Auth::user()->profile->location }}' : 'Portland, OR, United States';
      loadWeather(userLocation);
    });

    function loadWeather(location, woeid) {
      $.simpleWeather({
        location: location,
        woeid: woeid,
        unit: 'f',
        success: function(weather) {
          show_weather(weather);
        },
        error: function(error) {
          $('#weather').html('<p>'+error+'</p>');
        }
      });
    }

    // WEATHER HTML OUTPUT WITH ANIMATED BG
    function show_weather(weather) {

      var tempTransSpeed    = 500;
      var tempBgContainer   = $('.weather-container');
      var tempOutput        = $('#weather');
      var forcastOutput     = $('#forecast');
      var wCurrentTemp      = weather.temp;

      var wCurrentDesc = weather.currently;
      var wCurrentIcon  = '<i class="wi wi-fw icon-'+weather.code+'"></i>';
      var wCurrentUnits = '&deg; <i>'+weather.units.temp+'</i>';
      var wCurrentWindDirIcon = '<i class="wi wi-wind wi-towards-'+weather.wind.direction.toLowerCase()+'"></i>';
      var wCurrentWindDir = weather.wind.direction;
      var wCurrentWindSpeed = weather.wind.speed;
      var wCurrentWindSpeedUnits = weather.units.speed;
      var wCurrentLocation = weather.city+', '+weather.region;
      var wCurrentLocationIcon = '<i class="material-icons">place</i>';

      // CURRENT WEATHER HTML OUTPUT
      var html = '<div class="weather-widget">';
        html += '<div class="mdl-grid mdl-grid--no-spacing">';
          html += '<div class="mdl-cell mdl-cell--2-col mdl-cell--5-col-tablet mdl-cell--8-col-desktop">';
            html += '<div class="mdl-grid">';
              html += '<div class="weather-widget-location">';
                html += wCurrentLocation;
              html += '</div>';
              html += '<div class="weather-widget-desc">';
                html += wCurrentDesc;
              html += '</div>';
              html += '<div class="weather-widget-wind">';
                html += '<div class="weather-widget-wind">';
                  html += '<span class="wind-direction">'+wCurrentWindDirIcon+'</span>';
                  html += '<span class="wind-direction-text sr-only">'+wCurrentWindDir+'</span>';
                  html += '<span class="wind-speed">'+wCurrentWindSpeed+'</span>';
                  html += '<span class="wind-speed-units">'+wCurrentWindSpeedUnits+'</span>';
                  html += '<div class="current-temp">';
                    html += '<span class="temp-number">'+wCurrentTemp+'</span>';
                    html += '<span class="temp-unit">'+wCurrentUnits+'</span>';
                  html += '</div>';
                html += '</div>';
              html += '</div>';
            html += '</div>';
          html += '</div>';
          html += '<div class="mdl-cell mdl-cell--2-col mdl-cell--3-col-tablet mdl-cell--4-col-desktop" >';
            html += '<div class="weather-widget-icon">'+wCurrentIcon+'</div>';
          html += '</div>';
        html += '</div>';
      html += '</div>';

      // RENDER FORECAST HTML
      htmlForcast = '<ul class="mdl-weather">';
        htmlForcast += '<li><h4 class="margin-top-0"><i class="material-icons">place</i> '+weather.city+', '+weather.region+'</h4></li>';
        for(var i=0;i<weather.forecast.length;i++) {


          var hiTemp = weather.forecast[i].high;
          var weatherClass = '';

          if (hiTemp > 120) {
            weatherClass = 'extreme';
          } else if(hiTemp >= 100 && hiTemp <= 119) {
            weatherClass = 'superHot';
          } else if(hiTemp >= 90 && hiTemp  <= 99) {
            weatherClass = 'hot';
          } else if(hiTemp >= 80 && hiTemp  <= 89) {
            weatherClass = 'warm';
          } else if(hiTemp >= 70 && hiTemp  <= 79) {
            weatherClass = 'nice';
          } else if(hiTemp >= 60 && hiTemp  <= 69) {
            weatherClass = 'fair';
          } else if(hiTemp >= 50 && hiTemp  <= 59) {
            weatherClass = 'brisk';
          } else if(hiTemp >= 40 && hiTemp  <= 49) {
            weatherClass = 'cold';
          } else if(hiTemp >= 30 && hiTemp  <= 39) {
            weatherClass = 'veryCold';
          } else if(hiTemp >= 20 && hiTemp  <= 29) {
            weatherClass = 'superCold';
          } else {
            weatherClass = 'freezing';
          }


          htmlForcast += '<li class="forecast-item ' + weatherClass + '">';
          htmlForcast += '<span class="day">' + weather.forecast[i].day + '</span><i class="wi wi-fw icon-'+weather.forecast[i].code+'"></i> High: '+weather.forecast[i].high+'&deg;'+weather.units.temp+' | ';
          htmlForcast += ' Low: '+weather.forecast[i].low+'&deg;'+weather.units.temp;
          htmlForcast += '</li>';
        }
      htmlForcast += '</ul>';

      // OUTPUTS
      tempOutput.html(html);
      forcastOutput.html(htmlForcast);
      weatherAction();
      location_buttons();

      //var tempOutput        = $('#weather');
      //var forcastOutput     = $('#forecast');
      //$('#forcast').html(html);
      //$('#current').html(htmlForcast);

    }

    // WEATHER WIDGET ACTIONS
    function weatherAction() {

      var btnTransSpeed     = 200;
      var mdlBgClass        = '';
//'mdl-color--grey-700';
      var currentTrigger    = $('.show-weather');
      var forecastTrigger   = $('.show-forecast');
      var weatherContainer  = $('.weather-container');
      var currentWeather    = $('#weather');
      var forecastWeather   = $('#forecast');

      forecastTrigger.click(function(event) {
        weatherContainer.addClass(mdlBgClass);
        currentWeather.fadeOut(btnTransSpeed, function() {
          forecastWeather.fadeIn(btnTransSpeed, function() {});
        });
        $(this).fadeOut(btnTransSpeed, function() {
          currentTrigger.fadeIn(btnTransSpeed, function() {
            $(this).css('display', 'inline-block');
          });
        });
      });
      currentTrigger.click(function(event) {
        weatherContainer.removeClass(mdlBgClass);
        forecastWeather.fadeOut(btnTransSpeed, function() {
          currentWeather.fadeIn(btnTransSpeed, function() {});
        });
        $(this).fadeOut(btnTransSpeed, function() {
          forecastTrigger.fadeIn(btnTransSpeed, function() {
            $(this).css('display', 'inline-block');
          });
        });
      });
    }

    function location_buttons() {
      if ("geolocation" in navigator) {
        $('.js-geolocation').show();
      } else {
        $('.js-geolocation').hide();
      }
      $('.js-geolocation').on('click', function() {
        navigator.geolocation.getCurrentPosition(function(position) {
          loadWeather(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
        });
      });
      $('.js-user-location').on('click', function() {
          loadWeather('{{ Auth::user()->profile->location }}','');
      });
    }

</script>