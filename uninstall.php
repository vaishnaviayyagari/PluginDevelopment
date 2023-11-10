<?php
/*
 * Trigger this file on Plugin uninstall
 *
 * @package VaishnaviPlugin
 */

if(!defined('WP_UNINSTALL_PLUGIN')){
	die;
}
//Uninstall is used to clear the database

//clearing the database


/*$books = get_posts(['post_type'=>'book','numberposts'=> -1]);
foreach ($books as $book){
	wp_delete_post($book->ID, false);
}*/

//Access the db via SQL
global $wpdb;
$wpdb->prepare();
$wpdb->query("DELETE FROM wp_posts WHERE post_type='book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");