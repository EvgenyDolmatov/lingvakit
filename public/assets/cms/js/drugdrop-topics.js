$(document).ready(function (){



    function setTopicByStage(id) {

        let stage = $('#stage_' + id);
        let topics = stage.find('.stage-topic');

        let originTopics = new Map();
        let newTopics = new Map();

        topics.each(function (i){
            originTopics.set(i, $(this).attr('data-topic'));
        });



        stage.sortable({
            update: function (event, ui) {
                topics.each(function (i){
                    newTopics.set(i, $(this).attr('data-topic'));

                })
            }
        });
        console.log(originTopics);
        console.log(newTopics);

    }

    $('.stage-topics').each(function (){
        setTopicByStage($(this).attr('data-id'));
    });





    /*let stages = $('.stage-topics');

    stages.each(function (){

        // let $this = $(this);




        $(this).sortable({
            update: function (e, ui) {
                $('.stage-topic').each(function (i){

                    // let arr = [];

                    // arr.push($(this).attr('data-id'));

                    // $(this).data('id', i+1);
                    // $(this).find('input').val(i+1);
                    // $(this).attr('data-id', i+1);
                    console.log($(this).attr('data-id'));

                })
            }
        })


    });*/

});