<?php
/**
 * After was this code added to the functions.php
 * you need to add a shortcode inside Contact Form 7
 */
wpcf7_add_shortcode ("name_of_the_shortcode", "page_handler");
function page_handler() {
    echo 'some shortcode';
}
?>