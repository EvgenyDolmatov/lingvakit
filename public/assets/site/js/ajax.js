(function ($) {
    "use strict";

    let promo_code = $('input[name="promocode"]');
    let apply_promo_code = $('#promo-btn');

    apply_promo_code.on('click', function (){

        let url = window.location.origin + '/ajax/promo/' + promo_code.val();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (res){
                let totalCost = $('#total-cost');

                console.log(res.discount);

                $('#price-promocode').removeClass('hide');
                $('#promo-discount').html('-'+res.discount+' ₽');
                totalCost.html((totalCost.attr('data-price') - res.discount) + ' ₽');
            },
            error: function () {
                $('#promo-error').removeClass('hide');
            }
        });
    });

})(jQuery)