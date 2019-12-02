jQuery(document).ready(function($) {

    $('.fa-envelope-open-o').click(function() {
        let message = localStorage.setItem('testmessage', 'Hello');
    });

    if ($('body').hasClass('page-template-dashboard-messages')) {
        let getMessage = localStorage.getItem('testmessage');
        if (getMessage != null) {
            $('textarea').val(getMessage);
            setTimeout(function() {
                $('.start_thread_form').trigger('click');
            }, 100);
        }
    }

    if ($("body").find(".msg-me").length > 0) {
        $('textarea').val("");
    }

});