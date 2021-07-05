$(document).ready(function (){

    $('.stage-topics').each(function (){
        $(this).sortable({
            update: function (event, ui) {
                $(this).children('.stage-topic').each(function (i){
                    if ($(this).attr('data-position') != i+1) {
                        $(this).attr('data-position', i+1).addClass('updated');
                    }
                });
                savePosition();
            }
        });
    });

    function savePosition()
    {
        /*let positions = [];

        $('.updated').each(function (){
            positions.push([$(this).attr('data-id'), $(this).attr('data-position')]);
            $(this).removeClass('updated');
        });*/

        $('.updated').each(function (){
            let id = $(this).attr('data-id');
            let input_number = $(this).attr('data-position');
            let url = $(this).children('form').attr('action');
            let form = $('form#topic_'+id);

           $('form#topic_'+id + ' input').val($(this).attr('data-position'));
           $(this).removeClass('updated');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (res){
                    console.log(res);
                }
            });
        });


        /*$.ajax({
            url: '',
            method: 'POST',
            dataType: 'text',
            data: {
                update: 1,
                positions: positions
            },
            success: function (res){
                console.log(res);
            }
        });*/
    }

});