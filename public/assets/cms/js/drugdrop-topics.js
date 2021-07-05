$(document).ready(function (){

    $('.stage-topics').each(function (){
        $(this).sortable({
            update: function (event, ui) {
                $(this).children('.stage-topic').each(function (i){
                    $(this).attr('data-id', i+1).addClass('updated');
                });
            }
        });
    });

    function saveIndex()
    {
        let indexes = [];

        $('.updated').each(function (){
            indexes.push([$(this).attr('data-id'), $(this).attr('data-topic')]);
            $(this).removeClass('updated');
        });

        /*$.ajax({
            url: '',
            method: 'POST',
            dataType: 'text',
            data: {
                update: 1,
                indexes: indexes
            },
            success: function (res){
                console.log(res);
            }
        });*/
    }

});