<?php
/*
Plugin Name: Woobizz Hook 28 
Plugin URI: http://woobizz.com
Description: Add utm_nooverride parameter to any return urls
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
Text Domain: woobizzhook28
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook28_load_textdomain' );
function woobizzhook28_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook28', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Add Hook 28
function woobizzhook28_add_utm_nooverride( $return_url ) {
	// remove the utm_nooverride param in case it exists
	$return_url = remove_query_arg( 'utm_nooverride', $return_url );
	// add utm_nooverride param to return URL
	$return_url = add_query_arg( 'utm_nooverride', '1', $return_url );
	return $return_url;
}
add_filter( 'woocommerce_get_return_url', 'woobizzhook28_add_utm_nooverride' );