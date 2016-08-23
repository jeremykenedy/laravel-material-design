<script type="text/javascript">

    'use strict';
    window.onload = function () {
        mdlSelect.init('.mdl-select');
        document.addEventListener("DOMNodeInserted", function (ev) {
            componentHandler.upgradeDom();
        }, false);
    };

    var mdlSelect = {
        addEventListeners: function (dropdown) {
            var input = dropdown.querySelector('input');
            var list = dropdown.querySelectorAll('li');

            [].forEach.call(list, function (li) {
                li.onclick = function () {
                    input.value = li.textContent;
                    if ("createEvent" in document) {
                        var evt = document.createEvent("HTMLEvents");
                        evt.initEvent("change", false, true);
                        input.dispatchEvent(evt);
                    } else {
                        input.fireEvent("onchange");
                    }
                }
            });
        },
        init: function (selector) {
            var dropdowns = document.querySelectorAll(selector);
            [].forEach.call(dropdowns, function (i) {
                mdlSelect.addEventListeners(i);
            });

        }
    };

</script>