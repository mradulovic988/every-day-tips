<?php
function widget_search(){
    register_sidebar(array(
        'name' => 'Sidebar Recent Posts',
        'id' => 'footer_added_three',
        'before_widget' => '<div>',
            'after_widget' => '</div>',
        'beforre_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
    ));
}


add_action('widgets_init', 'widget_search');
?>