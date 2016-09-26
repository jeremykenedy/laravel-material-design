<script type="text/javascript">

    $(document).ready(function() {
      loadWeather('{{ Auth::user()->profile->location }}',''); //@params location, woeid
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

      var tempBgColors = {
        'freezing'    : '#0091c2',
        'superCold'   : '#0091c2',
        'veryCold'    : '#0091c2',
        'cold'        : '#0091c2',
        'brisk'       : '#F7AC57',
        'fair'        : '#F7AC57',
        'nice'        : '#F7AC57',
        'warm'        : '#F7AC57',
        'hot'         : '#F7AC57',
        'superHot'    : '#F7AC57',
        'extreme'     : 'red',
      };
      var tempTransSpeed    = 500;
      var tempBgContainer   = $('.weather-container');
      var tempOutput        = $('#weather');
      var forcastOutput     = $('#forecast');
      var tempElement       = weather.temp;
      var mdlBgClass        = 'mdl-color--grey-700';

      tempBgContainer.removeClass(mdlBgClass);

      if (tempElement > 120) {
        tempBgContainer.animate({backgroundColor: tempBgColors['extreme']}, tempTransSpeed);
      } else if(tempElement >= 100 && tempElement <= 119) {
        tempBgContainer.animate({backgroundColor: tempBgColors['superHot']}, tempTransSpeed);
      } else if(tempElement >= 90 && tempElement  <= 99) {
        tempBgContainer.animate({backgroundColor: tempBgColors['hot']}, tempTransSpeed);
      } else if(tempElement >= 80 && tempElement  <= 89) {
        tempBgContainer.animate({backgroundColor: tempBgColors['warm']}, tempTransSpeed);
      } else if(tempElement >= 70 && tempElement  <= 79) {
        tempBgContainer.animate({backgroundColor: tempBgColors['nice']}, tempTransSpeed);
      } else if(tempElement >= 60 && tempElement  <= 69) {
        tempBgContainer.animate({backgroundColor: tempBgColors['fair']}, tempTransSpeed);
      } else if(tempElement >= 50 && tempElement  <= 59) {
        tempBgContainer.animate({backgroundColor: tempBgColors['brisk']}, tempTransSpeed);
      } else if(tempElement >= 40 && tempElement  <= 49) {
        tempBgContainer.animate({backgroundColor: tempBgColors['cold']}, tempTransSpeed);
      } else if(tempElement >= 30 && tempElement  <= 39) {
        tempBgContainer.animate({backgroundColor: tempBgColors['veryCold']}, tempTransSpeed);
      } else if(tempElement >= 20 && tempElement  <= 29) {
        tempBgContainer.animate({backgroundColor: tempBgColors['superCold']}, tempTransSpeed);
      } else {
        tempBgContainer.animate({backgroundColor: tempBgColors['freezing']}, tempTransSpeed);
      }



      // RENDER CURRENT WEATHER HTML
      html = '<h3 class="margin-top-0"><small>Currently</small>  <i class="wi wi-fw icon-'+weather.code+'"></i> '+tempElement+'<sup><small>&deg;'+weather.units.temp+'</small></sup> <small></small></h3>' ;
      html += '<i class="wi wi-wind wi-towards-'+weather.wind.direction.toLowerCase()+'"></i>  '+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed;
      html += '<ul class="mdl-weather"><li><i class="material-icons">place</i> '+weather.city+', '+weather.region+'</li>';
      html += '<li class="currently"><i class="wi wi-fw icon-'+weather.code+'"></i>'+weather.currently+'</li>';
      html += '<li><i class="wi wi-wind wi-towards-'+weather.wind.direction.toLowerCase()+'"></i>  '+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';


      // RENDER FORECAST HTML
      htmlForcast = '<ul class="mdl-weather">';
        htmlForcast += '<li><h4 class="margin-top-0"><i class="material-icons">place</i> '+weather.city+', '+weather.region+'</h4></li>';
        for(var i=0;i<weather.forecast.length;i++) {
          htmlForcast += '<li>';
          htmlForcast += weather.forecast[i].day+': <i class="wi wi-fw icon-'+weather.forecast[i].code+'"></i> High: '+weather.forecast[i].high+'&deg;'+weather.units.temp+' / ';
          htmlForcast += ' Low: '+weather.forecast[i].low+'&deg;'+weather.units.temp;
          htmlForcast += '</li>';
        }
      htmlForcast += '</ul>';

      // OUTPUTS
      tempOutput.html(html);
      forcastOutput.html(htmlForcast);
      weatherAction();
      location_buttons();
    }

    // WEATHER WIDGET ACTIONS
    function weatherAction() {

      var btnTransSpeed     = 200;
      var mdlBgClass        = 'mdl-color--grey-700';
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

