(function ($) {
    "use strict";

    $(window).on('load', function () {
        let width = $(this).width();
        if (width < 768) {
            $('#toggle-btn').click();

            /* Player's Container Width */
            $('#player').attr('width', "100%");
            $('.about-text img').css({
                width: '100%',
                height: 'auto',
            });
        }
    });

    /* Active menu in Sidebar */
    function sidebarMenu() {
        $('.side-navbar li a').each(function () {
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

    /* Input Mask */
    $('#phone').inputmask("+7 (999) 999-99-99");
    $('#itn, #company_itn').inputmask("999999999999");
    $('#passport').inputmask("9999 999999");

    // Popup for changing quantity of Products
    $('.product-quantity').on('click', function () {
        let id = $(this).attr('data-id');
        let origin = window.location.origin;
        let href = origin + '/dashboard/orders/details'
        let action = href + '/' + id + '/quantity';

        $('#change-product-quantity .modal-body form').attr('action', action);
    })

    $('#company_id').change(function () {
        if ($(this).val() === 'other') {
            $('#company').removeClass('hide');
        } else {
            $('#company').addClass('hide');
        }
    });

    $('#add_dimensions').change(function () {
        if ($(this).prop('checked')) {
            $('#dimensions').removeClass('hide');
        } else {
            $('#dimensions').addClass('hide');
        }
    });

    /* Switch if container exists */
    function checkContainer($switcher, $input) {
        if ($switcher.prop('checked')) {
            return $input.removeClass('hide')
        }
        return $input.addClass('hide');
    }

    /* Switch additional container*/
    function switchContainer($switcher, $input) {
        $switcher.change(function () {
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

    /*    ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );*/


    // Grade stars hover
    $('.review-form-container .la-star').mouseover(function () {
        $('.review-form-container .la-star').removeClass('gold')
        $(this).addClass('gold');
        $(this).prevAll('.la-star').addClass('gold');
    });

    $('.review-form-container .la-star').mouseout(function () {
        $('.review-form-container .la-star').removeClass('gold')
    });

    $('.review-form-container .la-star').on('click', function () {
        let grade = $(this).attr('data-grade');

        $('.review-form-container .la-star').removeClass('active');
        $(this).parent().parent().find('input#grade').val(grade);
        $(this).addClass('active');
        $(this).prevAll('.la-star').addClass('active');
    });


    $('.presentation').owlCarousel({
        items: 1,
        margin: 13,
    });

    $('.presentation-thumbs .thumb').on('click', function (){
        let index = $(this).attr('data-slide-index');
        $('.presentation').trigger('to.owl.carousel', index);
    });

})(jQuery)
