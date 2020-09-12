<?php
/**
 * Plugin Name:       Giphy Avatar
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       giphy-avatar
 * Domain Path:       /languages
 */

if(!defined('ABSPATH')) return; 

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('giphy-css', plugins_url('giphy-avatar.css', __FILE__));
	wp_enqueue_script('giphy-js', plugins_url('giphy-avatar.js', __FILE__), array('jquery'), '1.0.0', true);
	//wp_enqueue_script( 'my_js', get_theme_file_uri( 'js/eventos.js'), array('jquery') );

    /*wp_localize_script( 'giphy-js', 'ajax_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'event-list'
    ) );*/
});

add_action('wp_body_open', function() {
?>
<form id="giphy-images" method="POST" action="javascript:void(0);">
	<input id="giphy-word" type="text" />
	<button id="giphy-button" type="submit">Get Giphy Images</button>
</form>

<div class="giphy-images">
</div>
<?php
});

add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	add_menu_page( 'Giphy Options', 'Giphy Options', 'manage_options', 'giphy-avatar/giphy-avatar-admin-page.php', 'giphy_avatar_admin_page', 'dashicons-tickets', 6  );
}

add_action( 'admin_init', 'giphy_avatar_register_settings' );
function giphy_avatar_register_settings() {
   add_option( 'giphy_avatar_word', '');
   register_setting( 'giphy_avatar_options_group', 'giphy_avatar_word', 'giphy_avatar_callback' );
}

function giphy_avatar_callback() {

}

/*function my_event_list_cb() {
    

    wp_die();
}*/
//add_action( 'wp_ajax_nopriv_event-list', 'my_event_list_cb' );
//add_action( 'wp_ajax_event-list', 'my_event_list_cb' );


