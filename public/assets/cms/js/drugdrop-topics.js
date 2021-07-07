$(document).ready(function () {

    $('.stage-topics').each(function () {
        $(this).sortable({
            update: function (event, ui) {
                $(this).children('.stage-topic').each(function (i) {
                    if ($(this).attr('data-position') != i+1) {
                        $(this).attr('data-position', i+1).addClass('updated');
                    }
                });
                savePosition();
            }
        });
    });

    function savePosition() {
        $('.updated').each(function () {
            let url = $(this).attr('data-url');
            let position = $(this).attr('data-position');

            $(this).removeClass('updated');

            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                dataType: 'text',
                data: {
                    index_number: position
                },
                success: function (res) {
                    //
                }
            });
        });
    }
});