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


define( 'YOUR_NAME_HERE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'YOUR_NAME_HERE__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'YOUR_NAME_HERE__PLUGIN_VERSION', '0.1' );

// Only load app when in admin area
if( is_admin() ){
    require_once ( YOUR_NAME_HERE__PLUGIN_DIR .'classes/class-admin-app-loader.php' );
}

// Load api attached to /wp-json
require_once ( YOUR_NAME_HERE__PLUGIN_DIR .'classes/class-admin-api-loader.php' );





add_filter('admin_body_class', 'add_body_classes');
function add_body_classes($classes) {
        
        return $classes .  ' jetpack-pagestyles ';
}




