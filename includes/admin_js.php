<?php

class admin_js_app_scripts {

    function load_scripts() {
        wp_enqueue_script( 'admin-appinline', YOUR_NAME_HERE_JS_APP_URL . 'dist/inline.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-apppolyfills', YOUR_NAME_HERE_JS_APP_URL . 'dist/polyfills.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
       // wp_enqueue_script( 'admin-appstyles', YOUR_NAME_HERE_JS_APP_URL . 'dist/styles.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-appvendor', YOUR_NAME_HERE_JS_APP_URL . 'dist/vendor.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-appmain', YOUR_NAME_HERE_JS_APP_URL . 'dist/main.bundle.js', array( 'jquery' ), YOUR_NAME_HERE_PLUGIN_VERSION, true );
        wp_enqueue_style( 'admin-app-styles', YOUR_NAME_HERE_JS_APP_URL . 'dist/styles.bundle.css', array(), YOUR_NAME_HERE_PLUGIN_VERSION, 'all' );

        wp_localize_script( 'admin-app', 'admin_app_local',
            array(
                'api_url' => get_rest_url(),
                'template_directory' => YOUR_NAME_HERE_JS_APP_URL . 'templates',
                'nonce' => wp_create_nonce( 'wp_rest' ),
            )
        );
    }

}