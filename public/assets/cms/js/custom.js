(function ($) {
    "use strict";

    /* Add Option for Question */
    function addOption(button) {

        let $is_correct = $('input.input-is-correct');
        let lastInput = $is_correct.length;

        button.on('click', function () {
            lastInput++;

            let input = '<div class="form-group row d-flex align-items-center mb-3">' +
                            '<div class="col-xl-10">' +
                                '<input type="text" name="question_option[]" class="form-control">' +
                            '</div>' +
                            '<div class="col-xl-2">' +
                                '<div class="mt-2">' +
                                    '<div class="styled-radio">' +
                                        '<input class="input-is-correct" type="radio" name="is_correct_' + lastInput + '" id="is_correct_' + lastInput + '" value="1">' +
                                        '<label for="is_correct_' + lastInput + '"></label>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>';

            $(this).parent().before(input);
        });
    }
    addOption($('#add_option'));

    $('input.input-is-correct').click(function () {
        $('input.input-is-correct').prop('checked', false);
        $(this).prop('checked', true);
    });

    /* Add Option for Question */
    function addOptionWithCheckbox(button) {

        let $is_correct = $('input.checkbox-is-correct');
        let lastInput = $is_correct.length;

        button.on('click', function () {
            lastInput++;

            let input = '<div class="form-group row d-flex align-items-center mb-3">' +
                            '<div class="col-xl-10">' +
                                '<input type="text" name="question_option[]" class="form-control">' +
                            '</div>' +
                            '<div class="col-xl-2">' +
                                '<div class="mt-2">' +
                                    '<div class="styled-checkbox">' +
                                        '<input class="checkbox-is-correct" type="checkbox" name="is_correct_' + lastInput + '" id="is_correct_' + lastInput + '" value="1">' +
                                        '<label for="is_correct_' + lastInput + '"></label>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>';

            $(this).parent().before(input);
        });
    }
    addOptionWithCheckbox($('#add_option_checkbox'));

    /* Active menu in Sidebar */
    function sidebarMenu() {
        $('.side-navbar li a').each(function (){
            let path = location.pathname;
            let array = path.split('/');

            if (array.length > 2) {
                let target = array[2];

                $(this).closest('a[href=#dropdown-' + target + ']').attr('aria-expanded', true);
                $(this).closest('ul#dropdown-' + target).addClass('show');

                if (this.href === window.location.href) {
                    $(this).addClass('active');
                }
            } else {
                $('.dashboard').addClass('active');
            }
        });
    }
    sidebarMenu();

    /* PROMO CODES: Change sign by type of discount */
    $('#percent').change(function (){
        if ($(this).is(':checked')) {
            $('#discount-sign').html('%');
        }
    });
    $('#amount').change(function (){
        if ($(this).is(':checked')) {
            $('#discount-sign').html('₽');
        }
    });

    /* Input Mask */
    $('#phone').inputmask("+7 (999) 999-99-99");
    $('#itn, #company_itn').inputmask("999999999999");
    $('#passport').inputmask("9999 999999");

    // Popup for changing quantity of Products
    $('.product-quantity').on('click', function (){
        let id = $(this).attr('data-id');
        let origin = window.location.origin;
        let href = origin + '/dashboard/orders/details'
        let action = href + '/' + id + '/quantity';

        $('#change-product-quantity .modal-body form').attr('action', action);
    });

    $('#company_id').change(function (){
        if ($(this).val() === 'other') {
            $('#company').removeClass('hide');
        } else {
            $('#company').addClass('hide');
        }
    });

    $('#add_dimensions').change(function (){
        if ($(this).prop('checked')) {
            $('#dimensions').removeClass('hide');
        } else {
            $('#dimensions').addClass('hide');
        }
    });

    $('#paid').change(function (){
        if ($(this).prop('checked')) {
            $('#price').removeClass('hide');
            $('#sale_price').removeClass('hide');
        } else {
            $('#price').addClass('hide');
            $('#sale_price').addClass('hide');
        }
    });

    $('#free').change(function (){
        if ($(this).prop('checked')) {
            $('#price').addClass('hide');
            $('#sale_price').addClass('hide');
        } else {
            $('#price').removeClass('hide');
            $('#sale_price').removeClass('hide');
        }
    });

    /* Switch if container exists */
    function checkContainer($switcher, $input) {
        if ($switcher.prop('checked')) {
            return $input.removeClass('hide')
        }
        return $input.addClass('hide');
    }
    /* Switch additional container */
    function switchContainer($switcher, $input) {
        $switcher.change(function (){
            if ($(this).prop('checked')) {
                return $input.removeClass('hide');
            } else {
                return $input.addClass('hide');
            }
        });
    }

    let switcherSale = $('#add_sale'),
        containerSale = $('#sale'),
        switcherDimensions = $('#add_dimensions'),
        containerDimensions = $('#dimensions');

    // Function for Sale
    checkContainer(switcherSale, containerSale);
    switchContainer(switcherSale, containerSale);
    // Function for Dimensions
    checkContainer(switcherDimensions, containerDimensions);
    switchContainer(switcherDimensions, containerDimensions);



    function addWordNumberContainer(button) {
        button.on('click', function () {
            let input = '<div class="form-group row d-flex align-items-center mb-3">' +
                            '<div class="col-xl-12">' +
                                '<input type="number" name="numbers[]" class="form-control" placeholder="1">' +
                            '</div>' +
                        '</div>';

            $(this).parent().before(input);
        });
    }
    addWordNumberContainer($('#add_word_number'));


    /* Enable Input For New Category */
    function unblockCategoryField(select)
    {
        select.change(function (){
            let input = $(this).parent().next('#new_category').children('input');

            if (select.val() === '0') {
                input.prop('disabled', false)
            } else {
                input.prop('disabled', true)
            }

            console.log(select.val());
        });
    }
    unblockCategoryField($('#category_select'));

    /* Add audio to question */
    $('#add_audio').on('click', function (){

        let input = '<div class="form-group">' +
                        '<input type="file" name="question_audios[]" class="form-control">' +
                    '</div>';
        $('#audios').append(input);
    });

    /* Add sentence field for Make Text question */
    $('#add_sentence').on('click', function (){

        let input = '<div class="form-group">' +
                        '<input type="text" name="matching_title[]" class="form-control">' +
                    '</div>';
        $('#sentences').append(input);
    });

})(jQuery)
