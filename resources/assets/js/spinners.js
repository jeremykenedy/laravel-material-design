$("form").submit(function(event) {
	$('#submit .mdl-spinner-text').fadeOut(1, function() {
	  	$('form .mdl-spinner').addClass('is-active');
	});
});