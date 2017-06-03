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
    dialog = dialog || '#dialog';
    document.querySelector(dialog).showModal();
    document.querySelector(dialog).open=true;
  });
  document.querySelector(close).addEventListener('click', function(event) {
    event.preventDefault();
    dialog = dialog || '#dialog';
    document.querySelector(dialog).open=true;
    document.querySelector(dialog).close();
    document.querySelector(dialog).open=false;
  });
}