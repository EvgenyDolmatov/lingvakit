(function ($) {
    "use strict";

    // Modals
    let $modal_video = $(".modal-video, .modal-video-play");
    if ($modal_video.length !== 0) {
        $(".lk-modal-wrap").on("click", function (e) {
            let $this = $(this);
            let $video = $(".modal-video");
            if (!$video.is(e.target) && $video.has(e.target).length === 0) {
                $this.css('display', 'none');
            }
        });
    }

    // Testimonials
    let $testimonials = $(".testimonials");
    if ($testimonials.length !== 0) {
        $(".testimonials .read-more").on("click", function (e){
            e.preventDefault();
            let $text = $(this).prev('p');

            if ($text.hasClass('collapsed')) {
                $text.removeClass('collapsed');
                $(this).text("Скрыть");
            } else {
                $text.addClass('collapsed');
                $(this).text("Показать больше");
            }
        });
    }

})(jQuery);