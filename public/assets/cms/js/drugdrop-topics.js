$(document).ready(function (){

    let stages = $('.stage-topics');

    stages.each(function (){

        let $this = $(this);

        $this.sortable({
            update: function (e, ui) {
                $('.stage-topic').each(function (i){

                    let arr;

                    arr.push($(this));

                    $(this).data('id', i+1);
                    $(this).find('input').val(i+1);
                    $(this).attr('data-id', i+1);
                })
            }
        })
    });

});