  <script type="text/javascript">

    setTimeout(function(){

      $.simpleWeather({
        woeid: '',
        location: '{{ Auth::user()->profile->location }}',   // PORTLAND 2475687
        unit: 'f',
        success: function(weather) {

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
        var tempTransSpeed    = 6500;
        var tempBgContainer   = $('#weather');
        var tempElement       = weather.temp;

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

html = '<h3 class="margin-top-0"><small>Currently</small><i class="wi wi-fw icon-'+weather.code+'"></i> '+tempElement+'<sup><small>&deg;'+weather.units.temp+'</small></sup></h3>';
html += '<ul><li><i class="material-icons">person_pin_circle</i> '+weather.city+', '+weather.region+'</li>';
html += '<li class="currently"><i class="wi wi-fw icon-'+weather.code+'"></i>'+weather.currently+'</li>';
html += '<li><i class="wi wi-wind wi-towards-'+weather.wind.direction.toLowerCase()+'"></i>  '+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';

tempBgContainer.html(html);

        },
        error: function(error) {
          tempBgContainer.html('<p>'+error+'</p>');
        }
      });

    }, 200);

  </script>