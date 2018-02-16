<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class admin_js_app_scripts {

    function load_scripts() {
        wp_enqueue_script( 'admin-appinline', YOUR_NAME_HERE_JS_APP_URL . 'dev/inline.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-apppolyfills', YOUR_NAME_HERE_JS_APP_URL . 'dev/polyfills.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
       // wp_enqueue_script( 'admin-appstyles', YOUR_NAME_HERE_JS_APP_URL . 'dev/styles.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-appvendor', YOUR_NAME_HERE_JS_APP_URL . 'dev/vendor.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_register_script( 'admin-appmain', YOUR_NAME_HERE_JS_APP_URL . 'dev/main.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_enqueue_style( 'admin-app-styles', YOUR_NAME_HERE_JS_APP_URL . 'dev/styles.bundle.css', array(), YOUR_NAME_HERE_PLUGIN_VERSION, 'all' );

        wp_localize_script( 'admin-appmain', 'admin_app_local',
            array(
                'api_url' => get_rest_url(),
                'template_directory' => YOUR_NAME_HERE_JS_APP_URL . 'templates',
                'nonce' => wp_create_nonce( 'wp_rest' ),
            )
        );
        wp_add_inline_script( 'admin-appmain' ,'window.adminapp = { "test": "hi"};', 'before');

        // Enqueued script with localized data.
        wp_enqueue_script( 'admin-appmain' );
    }

}