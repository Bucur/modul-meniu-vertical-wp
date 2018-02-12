<?php
/*
Plugin Name: Meniu Vertical
Plugin URI: http://bucurion.ro
Description: Creeaza un meniu vertical si foloseste un shortcode pentru al afisa
Author: Bucur
Version: 1.0
Author URI: http://bucurion.ro
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once( plugin_dir_path( __FILE__ ) . 'inc/meniu-functions.php' );


function meniu_activation() {
}
register_activation_hook(__FILE__, 'meniu__activation');

function meniu__deactivation() {
}
register_deactivation_hook(__FILE__, 'meniu__deactivation');


function simple_meniu_styles() {
	wp_register_style('easy-meniu', plugins_url('css/meniu.css', __FILE__));
	wp_enqueue_style('easy-meniu');
}
add_action('wp_enqueue_scripts', 'simple_meniu_styles');


if ( ! function_exists( 'meniu_wp_setup' ) ) :

function meniu_wp_setup() {

register_nav_menus( array(
	'meniu-vertical' => esc_html__( 'Meniu vertical' )
) );

}
endif;
add_action( 'after_setup_theme', 'meniu_wp_setup' );


function shortcode__meniu__vertical(){

wp_nav_menu( array( 
    'theme_location' => 'meniu-vertical',
    'container' => 'ul',
    'menu_id' => 'navmenu__vertical',
) ); 

}
add_shortcode("meniuvertical", "shortcode__meniu__vertical");


function css_new_meniu() { ?>  
<style type="text/css">

ul#navmenu__vertical,
ul#navmenu__vertical li,
ul#navmenu__vertical ul {
	width: <?php echo esc_attr( get_option('new_option_name') ); ?>!important; 
}
ul#navmenu__vertical ul,
ul#navmenu__vertical ul ul,
ul#navmenu__vertical ul ul ul {
	display: none;
	position: absolute;
	top: 0;
	left: <?php echo esc_attr( get_option('new_option_name') ); ?>!important;
}
          
 </style>
<?php 
}
add_action('wp_head', 'css_new_meniu');