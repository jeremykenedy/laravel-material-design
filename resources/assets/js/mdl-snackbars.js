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