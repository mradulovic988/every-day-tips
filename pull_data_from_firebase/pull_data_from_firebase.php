<?php
include get_theme_file_path( '/vendor/autoload.php' );
use Kreait\Firebase\Factory;

if( current_user_can('administrator') ) {

	get_template_part('firebase/content', 'top_part');
	$service = \Kreait\Firebase\ServiceAccount::fromJsonFile(__DIR__ . '/secret/rugged-plane-196108-dfb1c2d5a6a5.json');
	$factory = (new Factory)->withServiceAccount($service);
	$database = $factory->createDatabase();
	$newPost = $database->getReference('users');
	$newPost->getKey();
	$newPost->getUri();
	// $newPost->getChild('title')->set('Changed post title');
	$fetchedData = $newPost->getValue(); // Fetches the data from the realtime database
	$current_user = wp_get_current_user(); // User info
	$username = $current_user->user_login;

	if (!empty ($fetchedData)) {
		foreach ($fetchedData as $fetchedDatum) {
			$conversion = implode("", $fetchedDatum);
			echo $conversion;
		}
	}
}