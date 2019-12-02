jQuery(document).ready(function( $ ){

    $('#pps-close-link-1060').click(function(){
        $('#videoplayer')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
    });
    setTimeout(function() {
        $('.b-modal').click(function() {

            $('#videoplayer')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');


        });
    },5000);

});
