(function ($) {
    "use strict";

    let uploadForm = $('#form-upload');
    let inputYoutube = $('input[name="youtube"]');
    let button = $('.btn-attach');
    let activeButton;
    let mediaLibrary = $('#media-library');

    function setContentByFile(file) {
        let id = file.id,
            title = file.title,
            alt = file.alt,
            path = '/uploads/' + file.path + '/' + file.filename,
            type = file.type,
            content;

        switch (type) {
            case 'image':
                content = '<div class="col-4">' +
                    '<div class="file-wrap exists-file mt-2 mb-2" data-type="'+ type +'">' +
                    '<img class="file" src="'+ path +'" style="width: 100%" alt="'+ alt +'" data-id="'+ id +'" data-title="'+ title +'">' +
                    '<h6 class="text-center">'+ title +'</h6>' +
                    '</div>' +
                    '</div>';
                break;
            case 'audio':
                content = '<div class="col-4">' +
                    '<div class="file-wrap exists-file audio mt-2 mb-2" data-type="'+ type +'">' +
                    '<div class="play-pause"></div>' +
                    '<audio class="file" src="'+ path +'" data-id="'+ id +'" data-title="'+ title +'"></audio>' +
                    '<h6 class="text-center">'+ title +'</h6>' +
                    '</div>' +
                    '</div>';
                break;
            case 'video':
                content = '<div class="col-4">' +
                    '<div class="file-wrap exists-file audio mt-2 mb-2" data-type="'+ type +'">' +
                    '<video class="file" src="'+ path +'" width="100%" data-id="'+ id +'" data-title="'+ title +'"></video>' +
                    '<h6 class="text-center">'+ title +'</h6>' +
                    '</div>' +
                    '</div>';
                break;
        }
        return content;
    }

    function fillFormByFile(div) {

        let file = div.children('.file'),
            type = div.attr('data-type'),
            id = file.attr('data-id'),
            src = file.attr('src'),
            method = 'PUT';

        if (activeButton.attr('data-var') === 'question_audio') {
            if (div.hasClass('active')) {
                div.removeClass('active');
            } else {
                div.addClass('active');
            }
        } else {
            $('.exists-file, .new-file').removeClass('active');
            div.addClass('active');
        }

        if (type === 'audio') {

            let input = '<input type="hidden" name="audio" value="'+ id +'">';

            if (activeButton.attr('data-var') === 'question_audio') {
                input = '<input type="hidden" name="question_audios[]" value="'+ id +'">';
                method = 'DELETE';
            }
            if (activeButton.attr('data-var') === 'matching_audio') {
                input = '<input type="hidden" name="matching_audio" value="'+ id +'">';
            }
            let mediaFile = '<div class="current-item">' +
                '<audio src="'+ src +'" controls></audio>' +
                '<div class="small file-remove" data-method="'+ method +'">Удалить</div>' + input + '</div>';

            activeButton.parent().find('.preview').append(mediaFile);
        }

        if (type === 'image') {
            let input = '<input type="hidden" name="image" value="'+ id +'">',
                url = '/assets/cms/img/no-image.jpg';

            if (src != null) { url = src; }

            if (activeButton.attr('data-var') === 'question_image') {
                input = '<input type="hidden" name="question_image" value="'+ id +'">';
            }
            if (activeButton.attr('data-var') === 'matching_image') {
                input = '<input type="hidden" name="matching_image" value="'+ id +'">';
            }

            let mediaFile = '<div class="current-item">' +
                '<img src="'+ url +'" width="240" alt>' +
                '<div class="small file-remove" data-method="'+ method +'">Удалить</div>' + input + '</div>';

            activeButton.parent().find('.preview').html(mediaFile);
        }

        if (type === 'video') {
            let input = '<input type="hidden" name="video" value="'+ id +'">';
            let mediaFile = '<div class="current-item">' +
                '<video src="'+ src +'" width="240" controls></video>' +
                '<div class="small file-remove" data-method="'+ method +'">Удалить</div>' + input + '</div>';

            inputYoutube.val('');
            activeButton.parent().find('.preview').html(mediaFile);
        }
    }

    // Get gallery by file type
    function getGalleryByType(files) {
        $.each(files, function (key, file){
            let content = setContentByFile(file);
            mediaLibrary.append(content);
        });
    }

    // Upload new files
    function uploadFile(file) {
        let content = setContentByFile(file);
        mediaLibrary.prepend(content);
    }

    // Remove File
    function removeFile(div) {
        let noImage = '<div class="current-item"><img src="/assets/cms/img/no-image.jpg" width="100" alt></div>';
        let container = div.parent().parent();

        let audio = div.parent().find('audio');
        let image = div.parent().find('img');
        let video = div.parent().find('video');

        if (audio.length > 0) {
            div.parent().remove();
        }
        if (image.length > 0) {
            container.html(noImage);
        }
        if (video.length > 0) {
            div.parent().remove();
        }
    }

    button.on('click', function (){

        let file_type = $(this).attr('data-type');
        let url = window.location.origin + '/ajax/files/' + file_type;

        activeButton = $('button[data-var="' + $(this).attr('data-var') +'"]');
        mediaLibrary.empty();

        // Получаем галерею по типу файла
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (res){
                getGalleryByType(res.files);
            }
        });
    });

    inputYoutube.blur(function (){
        let input = '<input type="hidden" name="video" value="'+ $(this).val() +'">';
        let mediaFile = '<div class="current-item">' + input + '</div>';

        $(this).parent().find('.preview').html(mediaFile);
    });

    // Choose files
    $(document).on('click', '.file-wrap', function (){
        let div = $(this);
        fillFormByFile(div);
    });

    // Upload Files
    uploadForm.submit(function (e){
        e.preventDefault();

        let formData = new FormData(document.getElementById("form-upload"));

        $.ajax({
            url: uploadForm.attr('action'),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'POST',
            cache:false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (result){
                // Add New Images to Gallery
                $.each(result.files, function (key, file) {
                    uploadFile(file);
                });

                // Show Success Message
                $('.alert').removeClass('hide').html(result.success);
                setTimeout(function (){
                    $('.alert').addClass('hide');
                }, 1000);

                // Click to Choosing file tab
                setTimeout(function (){
                    $('#choosing-tab').trigger('click');
                }, 1000);
            }
        });
    });

    // Remove File From Database
    $(document).on('click', '.file-remove', function (e){
        e.preventDefault();

        let div = $(this);
        let url = div.attr('data-delete');
        let method = div.attr('data-method');

        if (!url) {
            removeFile(div);
        } else {
            let formData = new FormData(document.getElementById("form-update"));
            $.ajax({
                url: div.attr('data-delete'),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: method,
                data: formData,
                cache : false,
                processData: false,
                success: function (){
                    removeFile(div);
                }
            });
        }
    });
})(jQuery)
