<script type="text/javascript">

  $(document).ready(function() {

    // RENDER USER WEATHER WITH ANIMATED BG
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
      var tempTransSpeed    = 1500;
      var tempBgContainer   = $('#weather_container');
      var tempOutput        = $('#weather');
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

      html = '<h3 class="margin-top-0"><small>Currently</small><i class="wi wi-fw icon-'+weather.code+'"></i> '+tempElement+'<sup><small>&deg;'+weather.units.temp+'</small></sup></h3>';
      html += '<ul class="mdl-weather"><li><i class="material-icons">person_pin_circle</i> '+weather.city+', '+weather.region+'</li>';
      html += '<li class="currently"><i class="wi wi-fw icon-'+weather.code+'"></i>'+weather.currently+'</li>';
      html += '<li><i class="wi wi-wind wi-towards-'+weather.wind.direction.toLowerCase()+'"></i>  '+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';

      tempOutput.html(html);

      },
      error: function(error) {
        tempOutput.html('<p>'+error+'</p>');
      }
    });


    // RENDER FORECAST HTML
    $.simpleWeather({
      woeid: '',
      location: 'Portland, OR',
      unit: 'f',
      success: function(weather) {
        html = '<ul class="mdl-weather"><li>'+weather.city+', '+weather.region+'</li>';

        for(var i=0;i<weather.forecast.length;i++) {
          html += '<p>'+weather.forecast[i].day+' High: '+weather.forecast[i].high+'&deg;'+weather.units.temp+' / ';
          html += ' Low: '+weather.forecast[i].low+'&deg;'+weather.units.temp+'</p>';
        }
        $("#forecast").html(html);
      },
      error: function(error) {
        $("#forecast").html('<p>'+error+'</p>');
      }
    });

    // WEATHER WIDGET ACTIONS
    $('.show-forecast').click(function(event) {
        $('#weather_container').addClass('mdl-color--grey-700');
        $('#weather').fadeOut(200, function() {
            $('#forecast').fadeIn(200, function() {});
        });
        $(this).fadeOut(200, function() {
            $('.show-weather').fadeIn(200, function() {
                $(this).css('display', 'inline-block');
            });
        });
    });

    $('.show-weather').click(function(event) {
      $('#weather_container').removeClass('mdl-color--grey-700');
      $('#forecast').fadeOut(200, function() {
          $('#weather').fadeIn(200, function() {});
      });
      $(this).fadeOut(200, function() {
          $('.show-forecast').fadeIn(200, function() {
              $(this).css('display', 'inline-block');
          });
      });
    });

  });

</script>
