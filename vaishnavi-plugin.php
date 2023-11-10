<?php
/*
  * @package VaishnaviPlugin
  */
/*
Plugin Name:Vaishnavi Plugin
Plugin URI: https://vaishnavi.com
Description: This is my first attempt on writing a custom plugin for this amazing tutorial series.
Version:1.0.0
Author:Vaishnavi
Author URI:http://Vaishnavi
License:GPLv2 or later
Text Domain: vaishnavi-plugin
 */

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
	require_once dirname(__FILE__).'/vendor/autoload.php';
}
if(!class_exists('VaishnaviPlugin')) {
	class VaishnaviPlugin {
		public  $plugin;

		function __construct() {
			$this->plugin = plugin_basename(__FILE__);
		}

		function register() {
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );

			add_action('admin_menu', [$this,'add_admin_pages']);

			add_filter("plugin_action_links_$this->plugin",[$this,'settings_link']);
		}
		function settings_link($links){
			//add custom settings link
			$settings_link = '<a href="admin.php?page=vaishnavi_plugin">Settings</a>';
			array_push($links,$settings_link);
			return $links;
		}
		function uninstall() {

		}
		public function  add_admin_pages(){
			add_menu_page('Vaishnavi Plugin','Vaishnavi','manage_options','vaishnavi_plugin',
			[$this,'admin_index'],'dashicons-store',110);
		}
		public function admin_index(){
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
		}

		function custom_post_type() {
			register_post_type( 'book', [ 'public' => true, 'label' => 'Books' ] );
		}

		function enqueue() {
			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
		}

		function activate() {
//			require_once plugin_dir_path( __FILE__ ) . 'inc/Activate.php';
			Activate::activate();
		}
	}

	$vaishnaviPlugin = new VaishnaviPlugin();
	$vaishnaviPlugin->register();

// activation
	register_activation_hook( __FILE__, [ $vaishnaviPlugin, 'activate' ] );

	// deactivation
//	require_once plugin_dir_path( __FILE__ ) . 'inc/Deactivate.php';
	register_deactivation_hook( __FILE__, [ 'Deactivate', 'deactivate' ] );

	//uninstall
	register_uninstall_hook( __FILE__, 'uninstall' );
}