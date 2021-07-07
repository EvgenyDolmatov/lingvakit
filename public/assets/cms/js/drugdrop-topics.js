$(document).ready(function (){

    $('.stage-topics').each(function (){
        $(this).sortable({
            update: function (event, ui) {
                $(this).children('.stage-topic').each(function (i){
                    if ($(this).attr('data-position') != i+1) {
                        $(this).attr('data-position', i+1).addClass('updated');
                        // $(this).find('form input[name=index_number]').val(i+1);

                        // console.log($(this).find('form input[name=index_number]').val());
                    }
                });
                savePosition();
            }
        });
    });

    function savePosition()
    {
        $('.updated').each(function (){

            let id = $(this).attr('data-id');
            let form = $('form#topic_'+id);
            let url = form.attr('action');
            let pos = $(this).attr('data-position');
            let token = $('meta[name="csrf-token"]').attr('content');

            $(this).find('form input[name=index_number]').val(pos);
            console.log(form.serialize());
            // $('form#topic_'+id + ' input[name=index_number]').val(pos);
            $(this).removeClass('updated');

            $.ajax({
                url: url,
                headers: { 'X-CSRF-TOKEN': token },
                method: 'PUT',
                dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,
                data: form.serialize(),
                success: function (res){
                    console.log(res);
                }
            });
        });
    }

});