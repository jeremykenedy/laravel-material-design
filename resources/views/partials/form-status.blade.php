@if (session('message'))
  <div class="message message dismissible">
    <i class="material-icons status">&#xE876;</i>
    <h4>
        {{ trans('auth.message') }}
    </h4>
    <p>
        {{ session('message') }}
    </p>
  </div>
@endif

@if (session('success'))
  <div class="success message dismissible">
    <i class="material-icons status">&#xE876;</i>
    <h4>
        {{ trans('auth.success') }}
    </h4>
    <p>
        {{ session('success') }}
    </p>
  </div>
@endif

@if (session('status'))
  @if(session()->get('status') == 'wrong')
    <div class="warning message dismissible">
      <i class="material-icons status">&#xE645;</i>
      <h4>
          {{ trans('auth.someProblems') }}
      </h4>
      <p>
          {{ session('message') }}
      </p>
    </div>
  @else
    <div class="success message dismissible">
      <i class="material-icons status">&#xE876;</i>
      <h4>
          {{ trans('auth.success') }}
      </h4>
      <p>
          {{ session('status') }}
      </p>
    </div>
  @endif
@endif

@if (session('notice'))
  <div class="warning message dismissible">
    <i class="material-icons status">&#xE645;</i>
    <h4>
        {{ trans('auth.noticeTitle') }}
    </h4>
    <p>
        {{ session('notice') }}
    </p>
  </div>
@endif

@if (session('anError'))
  <div class="warning message dismissible">
    <i class="material-icons status">&#xE645;</i>
    <h4>
        {{ trans('auth.someProblems') }}
    </h4>
    <p>
        {{ session('anError') }}
    </p>
  </div>
@endif

@if (session('error'))
  <div class="warning message dismissible">
    <i class="material-icons status">&#xE645;</i>
    <h4>
        {{ trans('auth.someProblems') }}
    </h4>
    <p>
        {{ session('error') }}
    </p>
  </div>
@endif

@if (count($errors) > 0)
  <div class="error message dismissible">
    <i class="material-icons status">&#xE5CD;</i>
    <h4>
        {{ trans('auth.someProblems') }}
    </h4>
    <p>
      @foreach ($errors->all() as $error)
        {{ $error }} <br />
      @endforeach
    </p>
  </div>
@endif