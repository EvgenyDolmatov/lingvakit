
"use strict";

let $ = jQuery.noConflict();

window.LK_Draggable = {};

(function (){

    LK_Draggable.$window = $(window);

    /**
     * Get jQuery object
     * @param {string|jQuery} selector
     */
    LK_Draggable.$ = function (selector) {
        return selector instanceof jQuery ? selector : $(selector);
    }

    LK_Draggable.moveElem = function (draggable) {

        let activeElem = null;

        draggable.on('click', '.list-item', function (){
            let elem = $(this);
            let elements = draggable.find('.list-item');

            if(elem.parent().hasClass('draggable-field')) {

            }
            elements.css({
                fontWeight:500
            });
            elem.css({
                fontWeight:900
            });
            activeElem = elem;
        });

        draggable.on('click', '.draggable-field', function (){
            let elements = draggable.find('.list-item');
            let draggableEmpty = true;

            if ($(this).children().length > 0) {
                draggableEmpty = false;
            }

            if (activeElem && draggableEmpty) {
                $(this).append(activeElem);
                elements.css({
                    fontWeight:500
                });
                $(this).next('input').val(activeElem.attr('data-option'));
                activeElem = null;
            }
        });

        draggable.on('click', '.source', function (){
            if (activeElem && !activeElem.parent().hasClass('source') ) {
                $(this).append(activeElem);
            }
        });
    }

    LK_Draggable.init = function () {
        LK_Draggable.moveElem($('.draggable'));
    };

    window.onload = function (){
        LK_Draggable.init();
    }
})();
