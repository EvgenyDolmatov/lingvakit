
// 2. This code loads the IFrame Player API code asynchronously.
let tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
let player;
function onYouTubeIframeAPIReady() {
    let video = $('#player'),
        videoId = video.attr('data-id'),
        videoWidth = video.attr('data-width'),
        videoHeight = video.attr('data-height');

    player = new YT.Player('player', {
        height: videoHeight,
        width: videoWidth,
        videoId: videoId,
    });
}
