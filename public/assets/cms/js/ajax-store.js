/**
 * Lingva Main Javascript File
 */
"use strict";

let $ = jQuery.noConflict();

/**
 * Lingva Object
 */
window.Lingva = {};

(function () {

    Lingva.$window = $(window);
    Lingva.$body = $(document.body);

    /**
     * Get jQuery object
     * @param {string|jQuery} selector
     */
    Lingva.$ = function (selector) {
        return selector instanceof jQuery ? selector : $(selector);
    }

    /**
     * Make a macro task
     * @param {function} fn
     * @param {number} delay
     */
    Lingva.call = function (fn, delay) {
        setTimeout(fn, delay);
    }

    Lingva.Media = {
        init: function () {
            this.initMediaFilesLoad();
        },

        initMediaFilesLoad: function () {

            let $library = $('#media-library');

            function setContentByFile(file) {
                let id = file.id,
                    title = file.title,
                    alt = file.alt,
                    path = '/uploads/' + file.path + '/' + file.filename,
                    type = file.type,
                    before_content = '<div class="col-4"><div class="file-wrap exists-file mt-2 mb-2" data-type="'+ type +'">',
                    after_content = '</div></div>',
                    content;

                switch (type) {
                    case 'image':
                        content =
                            '<img class="file" src="'+ path +'" style="width: 100%" alt="'+ alt +'" data-id="'+ id +'" data-title="'+ title +'">' +
                            '<h6 class="text-center">'+ title +'</h6>';
                        break;
                    case 'audio':
                        content =
                            '<div class="play-pause"></div>' +
                            '<audio class="file" src="'+ path +'" data-id="'+ id +'" data-title="'+ title +'"></audio>' +
                            '<h6 class="text-center">'+ title +'</h6>';
                        break;
                    case 'video':
                        content =
                            '<video class="file" src="'+ path +'" width="100%" data-id="'+ id +'" data-title="'+ title +'"></video>' +
                            '<h6 class="text-center">'+ title +'</h6>';
                        break;
                    case 'file':
                        content =
                            '<span class="file" data-id="'+ id +'" data-title="'+ title +'"></span>' +
                            '<h6 class="text-center">'+ title +'</h6>';
                        break;
                }
                return before_content + content + after_content;
            }

            // Get gallery by file type
            function getGalleryByType(files) {
                $.each(files, function (key, file){
                    let content = setContentByFile(file);
                    $library.append(content);
                });
            }

            $('.btn-attach').on('click', function () {
                let $this = $(this),
                    $type = $this.attr('data-type'),
                    url = window.location.origin + '/ajax/files/' + $type;

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
        }
    }





    /**
     * @function initMediaFile
     */
    Lingva.initMediaFile = (function () {

        let uploadForm = $('#form-upload');
        let inputYoutube = $('input[name="youtube"]');
        let $button;
        let button;
        let $mediaLibrary = $('#media-library');

        function setContentByFile(file) {
            let id = file.id,
                title = file.title,
                alt = file.alt,
                path = '/uploads/' + file.path + '/' + file.filename,
                type = file.type,
                before_content = '<div class="col-4"><div class="file-wrap exists-file mt-2 mb-2" data-type="'+ type +'">',
                after_content = '</div></div>',
                content;

            switch (type) {
                case 'image':
                    content =
                        '<img class="file" src="'+ path +'" style="width: 100%" alt="'+ alt +'" data-id="'+ id +'" data-title="'+ title +'">' +
                        '<h6 class="text-center">'+ title +'</h6>';
                    break;
                case 'audio':
                    content =
                        '<div class="play-pause"></div>' +
                        '<audio class="file" src="'+ path +'" data-id="'+ id +'" data-title="'+ title +'"></audio>' +
                        '<h6 class="text-center">'+ title +'</h6>';
                    break;
                case 'video':
                    content =
                        '<video class="file" src="'+ path +'" width="100%" data-id="'+ id +'" data-title="'+ title +'"></video>' +
                        '<h6 class="text-center">'+ title +'</h6>';
                    break;
                case 'file':
                    content =
                        '<span class="file" data-id="'+ id +'" data-title="'+ title +'"></span>' +
                        '<h6 class="text-center">'+ title +'</h6>';
                    break;
            }
            return before_content + content + after_content;
        }

        function getGalleryByType(files) {
            $.each(files, function (key, file){
                let content = setContentByFile(file);
                $mediaLibrary.append(content);
            });
        }

        function initFillForm(el) {

            let file = el.children('.file'),
                type = el.attr('data-type'),
                id = file.attr('data-id'),
                title = file.attr('data-title'),
                src = file.attr('src'),
                method = 'PUT';

            console.log(button);

            if (button.attr('data-var') === 'question_audio') {
                el.hasClass('active') ?
                    el.removeClass('active') :
                    el.addClass('active')
            } else {
                $('.exists-file, .new-file').removeClass('active');
                el.addClass('active');
            }

            if (type === 'audio') {

                let input = '<input type="hidden" name="audio" value="'+ id +'">';

                if (button.attr('data-var') === 'question_audio') {
                    input = '<input type="hidden" name="question_audios[]" value="'+ id +'">';
                    method = 'DELETE';
                }

                if (button.attr('data-var') === 'matching_audio') {
                    input = '<input type="hidden" name="matching_audio" value="'+ id +'">';
                }

                let mediaFile =
                    '<div class="current-item"><audio src="'+ src +'" controls></audio>' +
                    '<div class="small file-remove" data-method="'+ method +'">Удалить</div>' + input + '</div>';

                button.parent().find('.preview').append(mediaFile);
            }

            if (type === 'image') {
                let input = '<input type="hidden" name="image" value="'+ id +'">',
                    url = '/assets/cms/img/no-image.jpg';

                if (src != null) { url = src; }

                if (button.attr('data-var') === 'question_image') {
                    input = '<input type="hidden" name="question_image" value="'+ id +'">';
                }

                if (button.attr('data-var') === 'matching_image') {
                    input = '<input type="hidden" name="matching_image" value="'+ id +'">';
                }

                let mediaFile =
                    '<div class="current-item"><img src="'+ url +'" width="240" alt>' +
                    '<div class="small file-remove" data-method="'+ method +'">Удалить</div>' + input + '</div>';

                button.parent().find('.preview').html(mediaFile);
            }

            if (type === 'video') {
                let input = '<input type="hidden" name="video" value="'+ id +'">';
                let mediaFile =
                    '<div class="current-item"><video src="'+ src +'" width="240" controls></video>' +
                    '<div class="small file-remove" data-method="'+ method +'">Удалить</div>' + input + '</div>';

                inputYoutube.val('');
                button.parent().find('.preview').html(mediaFile);
            }

            if (type === 'file') {
                let input = '<input type="hidden" name="file" value="'+ id +'">';
                let mediaFile =
                    '<div class="current-item"><span>' + title + '</span>' +
                    '<div class="small file-remove" data-method="'+ method +'">Удалить</div>' + input + '</div>';

                button.parent().find('.preview').html(mediaFile);
            }
        }


        return function () {
            $button = $('.btn-attach');
            $button.on('click', function (){
                let $this = $(this);
                let $file_type = $this.attr('data-type');
                let $file_var = $this.attr('data-var');
                let url = window.location.origin + '/ajax/files/' + $file_type;

                button = $this;
                $mediaLibrary.empty();

                // Получаем галерею по типу файла
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (res){
                        // console.log(res.files);
                        getGalleryByType(res.files);
                    }
                });
            });

            // Choose files
            $(document).on('click', '.file-wrap', function (){
                initFillForm($(this));
            });
        }
    })();

    Lingva.init = function () {
        Lingva.Media.init();
    }

    window.onload = function () {
        Lingva.call(Lingva.init());
    }
})();

