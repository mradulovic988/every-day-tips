<?php
/**
 * Smush Pro skipping the false image in database
 */
add_filter('wp_smush_image', 'wpmudev_no_smush_img', 10, 2);
function wpmudev_no_smush_img($smush, $ID) {
    if(!$ID) return false;

    $file_path = get_attached_file( $ID );
    if(!file_exists($file_path)) {
        return false;
    }

    return true;
}

?>