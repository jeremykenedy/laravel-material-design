{{--

	1. INCLUDE "@include('scripts.mdl-snackbar')" CALL IN "@section('footer_scripts')" SECTION:

	2. INCLUDE "@include('partials.mdl-snackbar')" IN YOUR TEMPLATE

	3. CALL USING JAVASCRIPT: EXAMPLES BELOW

	// EXAMPLE ACTION CALL - MAKING IT A SNACKBAR

	var someActions = function(event) {
	    document.querySelector('.mdl-snackbar-trigger').style.backgroundColor = 'red';
	};

	// SNACKBAR - HAS ACTION
	mdl_snackbar({
		msg: 'Profile Updated',
		timout: 4000,								// OPTIONAL
		snackBarTrigger: '.mdl-snackbar-trigger', 	// OPTIONAL
		actionText: 'Undo',  						// OPTIONAL
		actionHandler: someActions,					// OPTIONAL
	});

	// TOAST - HAS NO ACTION
	mdl_snackbar({
		msg: 'Profile Updated',
		timout: 4000,
		snackBarTrigger: '.mdl-snackbar-trigger'
	});

	// EXAMPLE CTA TO SNACKBAR/TOAST
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-snackbar-trigger" type="button">Show Toast</button>

 --}}
<script type="text/javascript">

	function mdl_snackbar(args) {

		args.msg 				= args.msg || 'SnackBar Activated';
		args.timeout 			= args.timout || 2000;
		args.snackBarTrigger 	= document.querySelector(args.snackBarTrigger) || document.querySelector('.mdl-snackbar-trigger');
		args.actionText 		= args.actionText || '';
		args.actionHandler 		= args.actionHandler || '';

		var snackbarContainer 	= document.querySelector('.mdl-snackbar');
		var snackBarActions  	= document.querySelector('.mdl-snackbar__action');

		args.snackBarTrigger.addEventListener('click', function() {
			var data = {
				message: args.msg,
				timeout: args.timeout,
				actionHandler: args.actionHandler,
				actionText: args.actionText
			};
			snackbarContainer.MaterialSnackbar.showSnackbar(data);
		});

	}

</script>