<?php
/**
 * Plugin Name: ADMIN JS APP BOILERPLATE C
 * Description: A JS SPA App in WordPress Admin
 * Author: Roy Sivan
 * Author URI: http://www.roysivan.com
 * Version: 0.1
 * Plugin URI: https://github.com/WP-API/WP-API
 * License: GPL2+
 * Text Domain: js-app-plugin
 */


define( 'YOUR_NAME_HERE_JS_APP_DIR', plugin_dir_path( __FILE__ ) );
define( 'YOUR_NAME_HERE_JS_APP_URL', plugin_dir_url( __FILE__ ) );
define( 'YOUR_NAME_HERE_PLUGIN_VERSION', '0.1' );


require_once 'classes/admin_menu.php';
require_once 'classes/admin_js.php';
require_once 'classes/admin-api-loader.php';


class admin_js_app {

    function __construct() {

        //Create CPT & Content
        
    }

    function rest_support() {
        global $wp_post_types;
        /*
         * Add support for custom post types
         * Add your CPT slugs to the $post_type_names array to add REST support
         * Docs: http://v2.wp-api.org/extending/custom-content-types/
         */
        $post_type_names = ['book'];
        foreach( $post_type_names as $post_type_name ) {
            if (isset($wp_post_types[$post_type_name])) {
                $wp_post_types[$post_type_name]->show_in_rest = true;
                $wp_post_types[$post_type_name]->rest_base = $post_type_name;
                $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
            }
        }

    }

   

    function admin_menu() {
        $menu = new admin_js_app_page();
        $menu->register_menu();
    }

    function admin_scripts( $hook ) {
    	wp_enqueue_editor();
        if( $hook !== 'toplevel_page_admin-js-app' )
            return;
        $scripts = new admin_js_app_scripts();
        $scripts->load_scripts();

    }


}

$js_app = new admin_js_app();
$api = new Admin_Api_Loader();
add_filter('admin_body_class', 'add_body_classes');
function add_body_classes($classes) {
        
        return $classes .  ' jetpack-pagestyles ';
}

/*
 * ADMIN PAGE: Register and Create the Admin Page
 */
add_action( 'admin_menu', array( $js_app, 'admin_menu' ) );

/*
 * ADMIN APP: Enqueue JavaScript for application
 */
add_action( 'admin_enqueue_scripts', array( $js_app, 'admin_scripts' ) );



