INSERT INTO `wp_lifetotes`.`wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES ('15', 'username', MD5('password'), 'name', 'email@email.com', 'http://www.test.com/', '2011-06-07 00:00:00', '', '0', 'Marko');
 
 
INSERT INTO `wp_lifetotes`.`wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, '15', 'wp_capabilities', 'a:1:{s:13:"administrator";s:1:"1";}');
 
 
INSERT INTO `wp_lifetotes`.`wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, '15', 'wp_user_level', '10');