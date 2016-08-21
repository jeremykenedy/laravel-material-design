$('.dismissible').on('click touchstart', function (event) {
	var trans_speed = 300;
	$(this).animate({
		opacity: 0,
		left: "-"+(trans_speed * 4)
	}, trans_speed, function() {});
});
function mdl_dialog(trigger,close,dialog) {
  'use strict';
  var trigger = trigger || '.dialog-button';
  var close = close || '.dialog-close';
  var dialog = dialog || '#dialog';
  if (! document.querySelector(dialog).showModal) {
      dialogPolyfill.registerDialog(document.querySelector(dialog));
  }
  document.querySelector(trigger).addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector(dialog).showModal();
    document.querySelector(dialog).open=true;
  });
  document.querySelector(close).addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector(dialog).open=true;
    document.querySelector(dialog).close();
    document.querySelector(dialog).open=false;
  });
}
//# sourceMappingURL=app.js.map
