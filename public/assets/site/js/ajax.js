(function ($) {
    "use strict";

    /* Button names by site language */
    let lang = $('html')[0].lang;
    let lang_words = {
        'en':['Apply', 'Cancel'],
        'ru':['Принять', 'Отменить'],
    }

    let promo_code = $('input[name="promocode"]');
    let promo_code_applied = $('input[name="promocode_applied"]');
    let apply_promo_code = $('#apply-btn');
    let cancel_promo_code = $('#cancel-btn');

    /* Buttons */
    let apply_btn = '<button type="button" id="apply-btn" class="btn square btn-sm btn-dark">'+lang_words[lang][0]+'</button>';
    let cancel_btn = '<button type="button" id="cancel-btn" class="btn square btn-sm btn-light">'+lang_words[lang][1]+'</button>';


    let totalCost = $('#total-cost');

    /* Apply Promo Code */
    $(document).on('click', '#apply-btn', function (){
        let url = window.location.origin + '/ajax/promo/' + promo_code.val();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (res){
                promo_code.attr('disabled', true);
                promo_code_applied.val(promo_code.val());
                apply_promo_code.remove();
                $('#promo-btn-container').html(cancel_btn);

                $('#promo-error').addClass('hide');
                $('#price-promocode').removeClass('hide');
                $('#promo-discount').html('-'+res.discount+' ₽');
                totalCost.html((totalCost.attr('data-price') - res.discount) + ' ₽');
            },
            error: function () {
                $('#promo-error').removeClass('hide');
            }
        });
    });

    /* Cancel Promo Code */
    $(document).on('click', '#cancel-btn', function (){

        promo_code.removeAttr('disabled');
        promo_code.val('');
        promo_code_applied.val('');

        cancel_promo_code.remove();
        $('#promo-btn-container').html(apply_btn);

        $('#price-promocode').addClass('hide');
        $('#promo-discount').html('');
        totalCost.html(totalCost.attr('data-price') + ' ₽');
    });

})(jQuery)