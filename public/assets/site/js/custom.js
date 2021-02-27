(function ($) {
    "use strict";

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
    })

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

    /* Switch if container exists */
    function checkContainer($switcher, $input) {
        if ($switcher.prop('checked')) {
            return $input.removeClass('hide')
        }
        return $input.addClass('hide');
    }
    /* Switch additional container*/
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

/*    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );*/
})(jQuery)
