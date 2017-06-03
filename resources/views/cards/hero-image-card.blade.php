<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop" >
  <div class="mdl-card__title mdl-card--expand @if (Auth::user()->profile->user_profile_bg == NULL) mdl-color--teal-300 @endif" @if (Auth::user()->profile->user_profile_bg != NULL) style="background: url('{{Auth::user()->profile->user_profile_bg}}') center/cover;" @endif>
    <h2 class="mdl-card__title-text">Updates</h2>
  </div>
  <div class="mdl-card__supporting-text mdl-color-text--grey-600">
    Non dolore elit adipisicing ea reprehenderit consectetur culpa.
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
  </div>
</div>