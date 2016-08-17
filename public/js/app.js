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
(function(window, document, undefined) {
  var factory = function($, DataTable) {
    "use strict";

    /* Set the defaults for DataTables initialisation */
    $.extend(true, DataTable.defaults, {
      dom: "<'hiddensearch'f'>" +
        "tr" +
        "<'table-footer'lip'>",
      renderer: 'material'
    });

    /* Default class modification */
    $.extend(DataTable.ext.classes, {
      sWrapper: "dataTables_wrapper",
      sFilterInput: "form-control input-sm",
      sLengthSelect: "form-control input-sm"
    });

  }; // /factory

  // Define as an AMD module if possible
  if (typeof define === 'function' && define.amd) {
    define(['jquery', 'datatables'], factory);
  } else if (typeof exports === 'object') {
    // Node/CommonJS
    factory(require('jquery'), require('datatables'));
  } else if (jQuery) {
    // Otherwise simply initialise as normal, stopping multiple evaluation
    factory(jQuery, jQuery.fn.dataTable);
  }

})(window, document);

$(document).ready(function() {
  $('.data-table').dataTable({
	"pagingType": "full_numbers",
    "oLanguage": {
      "sStripClasses": "",
      "sSearch": "",
      "sSearchPlaceholder": "Enter Keywords Here",
      "sInfo": "_START_ -_END_ of _TOTAL_",
      "sLengthMenu": '<span>Rows per page:</span><select class="browser-default">' +
        '<option value="10">10</option>' +
        '<option value="20">20</option>' +
        '<option value="30">30</option>' +
        '<option value="40">40</option>' +
        '<option value="50">50</option>' +
        '<option value="-1">All</option>' +
        '</select></div>'
    },
    bAutoWidth: false
  });
});
$(document).on('input', "#search_table", function(){
    var oTable = $('.dataTable').dataTable();
    oTable.fnFilter($(this).val());
});
//# sourceMappingURL=app.js.map
