<?php
/**
 * This code goes in functions.php
 */

/*
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');
 
/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');
 
/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;
 
/**
* Checks for single template by category
* Check by category slug and ID
*/
foreach((array)get_the_category() as $cat) :
 
if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
 
elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
 
endforeach;
}
?>