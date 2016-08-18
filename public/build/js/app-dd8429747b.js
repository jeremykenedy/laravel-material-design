$('.dismissible').on('click touchstart', function (event) {
	var trans_speed = 300;
	$(this).animate({
		opacity: 0,
		left: "-"+(trans_speed * 4)
	}, trans_speed, function() {});
});
function mdl_dialog(trigger,close,dialog) {
  'use strict';
	var trigger = trigger || document.querySelector('.dialog-button');
	var close = close || document.querySelector('.dialog-close');
	var dialog = dialog || document.querySelector('#dialog');
  if (! dialog.showModal) {
    	dialogPolyfill.registerDialog(dialog);
  }
  trigger.addEventListener('click', function(event) {
		event.preventDefault();
     	dialog.showModal();
  });
  close.addEventListener('click', function(event) {
  	event.preventDefault();
    	dialog.close();
  });
}
$("form").submit(function(event) {
	$('#submit .mdl-spinner-text').fadeOut(1, function() {
	  	$('form .mdl-spinner').addClass('is-active');
	});
});
//# sourceMappingURL=app.js.map
