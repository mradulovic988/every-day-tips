<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 18.03.2019.
 * Time: 20.21
 */


$url = file_get_contents("json-info.json");

$wizards = json_decode($url, true);

foreach ($wizards as $wizard) {
    echo $wizard['author'] . "author" .
        $wizard['author_name'][0]['id'],
        $wizard['author_name'][0]['name'],
        $wizard['author_name'][0]['type'];
}
?>