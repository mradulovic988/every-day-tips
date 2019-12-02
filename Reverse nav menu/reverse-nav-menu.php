/**
 * Enables a 'reverse' option for wp_nav_menu to reverse the order of menu 
 * items. Usage:
 *
 *   wp_nav_menu(array('reverse' => TRUE, ...));
 */
function my_reverse_nav_menu($menu, $args) {
  if (isset($args->reverse) && $args->reverse) {
    return array_reverse($menu);
  }
  return $menu;
}
add_filter('wp_nav_menu_objects', 'my_reverse_nav_menu', 10, 2);
