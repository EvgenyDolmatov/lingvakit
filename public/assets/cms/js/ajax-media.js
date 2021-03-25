(function ($) {
    "use strict";

    function getId(url){
        let arr = url.split('/');
        return arr[arr.length-1];
    }

    function timeFormat(duration) {
        let totalTime = Math.round(duration);
        let seconds = Math.round(totalTime % 60);
        let minutes = Math.round(seconds/60);
        let hours = Math.round(minutes/60);

        if (seconds < 10) { seconds = '0'+seconds; }

        if (totalTime >= 3600 ) {
            if (minutes < 10) { seconds = '0'+minutes; }
            return hours + ':' + minutes + ':' + seconds;
        }
        return minutes + ':' + seconds;
    }

    /* Choosing files im media library */
    $('.file-wrap').on('click', function (e){
        e.preventDefault();

        let $this = $(this);
        let $form = $('#file-form');
        let $url = window.location.origin + window.location.pathname + '/' + $this.children('.file').attr('data-id') + '/get-data';
        let $pageUrl = window.location.origin + window.location.pathname + '/';

        if ($this.hasClass('active')) {
            $('.file-wrap').removeClass('active');

        } else {
            $('.file-wrap').removeClass('active');
            $this.addClass('active');

            $('#no-file-selected').addClass('hide');
            $form.removeClass('hide');
        }

        function fileData(data) {
            let previewContainer = $('#preview');
            let mediaFiles = ['audio', 'video'];
            let element;
            let divDuration = $('div[title="file-duration"]');

            divDuration.parent().addClass('hide');

            if ($.inArray(data.type, mediaFiles) !== -1) {
                element = document.createElement(data.type);
                element.src = data.path;
                element.controls = true;
                element.addEventListener('loadedmetadata', function (){
                    let duration = timeFormat(element.duration);

                    divDuration.parent().removeClass('hide');
                    divDuration.html(duration);
                });
            }
            if (data.type === 'image') {
                element = document.createElement('img');
                element.src = data.path;
            }
            if (data.type === 'file') {
                element = document.createElement('div');
                element.setAttribute('data-path', data.path);
            }

            $form.attr('action', $pageUrl + data.id);
            previewContainer.html(element);

            $('div[title="file-size"]').html(data.size);
            $('input[name="title"]').val(data.title);
            $('input[name="alt"]').val(data.alt);
            $('a#download-link').attr('href', $pageUrl + 'download/file-' + data.id);
        }

        $.ajax({
            url: $url,
            method: 'GET',
            dataType: 'json',
            data: $form.serialize(),
            success: function (data){
                fileData(data);
            }
        });

    });

    $('#ajax-submit').click(function (e){
        e.preventDefault();

        let $url = $('#file-form').attr('action');
        let $file = $('.file[data-id="' + getId($url) + '"]');
        let $alertDiv = $('.alert');

        let $inputAlt = $('input[name="alt"]').val();
        let $inputTitle = $('input[name="title"]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $.ajax({
            url: $url,
            method: 'PUT',
            dataType: 'json',
            data: $('#file-form').serialize(),
            success: function (result){
                $alertDiv.removeClass('hide');
                $alertDiv.html(result.success);

                setTimeout(function (){
                    $alertDiv.addClass('hide');
                },2000);

                $file.attr('data-title', $inputTitle);
                $file.attr('alt', $inputAlt);

                $('h5[data-id="'+getId($url)+'"]').html($inputTitle);
            }
        });
    });

})(jQuery)
