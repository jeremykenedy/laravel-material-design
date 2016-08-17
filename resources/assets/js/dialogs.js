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