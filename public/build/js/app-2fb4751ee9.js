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
$("form").submit(function(event) {
	$('#submit .mdl-spinner-text').fadeOut(1, function() {
	  	$('form .mdl-spinner').addClass('is-active');
	});
});
'use strict';
window.onload = function () {
    mdlSelect.init('.mdl-select');
    document.addEventListener("DOMNodeInserted", function (ev) {
        if (ev.relatedNode.querySelectorAll(".mdl-select").length > 0) {
            componentHandler.upgradeDom();
        }
    }, false);
};

var mdlSelect = {
    addEventListeners: function (dropdown) {
        var input = dropdown.querySelector('input');
        var list = dropdown.querySelectorAll('li');
        var menu = dropdown.querySelector('.mdl-js-menu');

        //show menu on mouse down or mouse up
        input.onkeydown = function (event) {
            if (event.keyCode == 38 || event.keyCode == 40) {
                menu['MaterialMenu'].show();
            }
        };

        //return focus to input
        menu.onkeydown = function (event) {
            if (event.keyCode == 13) {
                input.focus();
            }
        };

        [].forEach.call(list, function (li) {
            li.onclick = function () {
                input.value = li.textContent;
                dropdown.MaterialTextfield.change(li.textContent); // handles css class changes
                setTimeout( function() {
                    dropdown.MaterialTextfield.updateClasses_(); //update css class
                }, 250 );

                // update input with the "id" value
                input.dataset.val = li.dataset.val || '';

                if ("createEvent" in document) {
                    var evt = document.createEvent("HTMLEvents");
                    evt.initEvent("change", false, true);
                    input.dispatchEvent(evt);
                } else {
                    input.fireEvent("onchange");
                }
            };
        });
    },
    init: function (selector) {
        var dropdowns = document.querySelectorAll(selector);
        [].forEach.call(dropdowns, function (i) {
            mdlSelect.addEventListeners(i);
            i.style.width = i.querySelector('.mdl-menu').clientWidth + 'px';
        });
    }
};
//# sourceMappingURL=app.js.map
