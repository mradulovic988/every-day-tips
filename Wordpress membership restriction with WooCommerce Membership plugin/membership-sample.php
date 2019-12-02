<?php
/**
 * If is user member
 */
if (wc_memberships_is_user_active_member( $user_id, 'zawadafit-coaching' )) {
    /**
     * If is user member let see the posts
     */
    if (have_posts()) : while (have_posts()) : the_post();
        get_template_part('content', 'page');
        endwhile;
    endif;
} else {
    /**
     * If is not let see something different
     */
    // do something else
?>