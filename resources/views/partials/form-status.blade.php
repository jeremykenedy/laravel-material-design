@if (session('status'))
	<div class="success message dismissible">
		<i class="material-icons status">&#xE876;</i>
		<h4>
		  	Success
		</h4>
		<p>
		  	{{ session('status') }}
		</p>
	</div>
@endif

@if (session('anError'))
	<div class="warning message dismissible">
		<i class="material-icons status">&#xE645;</i>
		<h4>
		  	{{ Lang::get('auth.someProblems') }}
		</h4>
		<p>
		  	{{ session('anError') }}
		</p>
	</div>
@endif

@if (count($errors) > 0)
	<div class="error message dismissible">
		<i class="material-icons status">&#xE5CD;</i>
		<h4>
		  	{{ Lang::get('auth.someProblems') }}
		</h4>
		<p>
			@foreach ($errors->all() as $error)
				{{ $error }} <br />
			@endforeach
		</p>
	</div>
@endif