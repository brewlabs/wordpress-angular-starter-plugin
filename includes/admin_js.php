<?php

class admin_js_app_scripts {

    function load_scripts() {
        wp_enqueue_script( 'admin-appinline', JS_APP_URL . 'dist/inline.bundle.js', array( 'jquery' ), PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-apppolyfills', JS_APP_URL . 'dist/polyfills.bundle.js', array( 'jquery' ), PLUGIN_VERSION, true );
       // wp_enqueue_script( 'admin-appstyles', JS_APP_URL . 'dist/styles.bundle.js', array( 'jquery' ), PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-appvendor', JS_APP_URL . 'dist/vendor.bundle.js', array( 'jquery' ), PLUGIN_VERSION, true );
        wp_enqueue_script( 'admin-appmain', JS_APP_URL . 'dist/main.bundle.js', array( 'jquery' ), PLUGIN_VERSION, true );
        wp_enqueue_style( 'admin-app-styles', JS_APP_URL . 'dist/styles.bundle.css', array(), PLUGIN_VERSION, 'all' );

        wp_localize_script( 'admin-app', 'admin_app_local',
            array(
                'api_url' => get_rest_url(),
                'template_directory' => JS_APP_URL . 'templates',
                'nonce' => wp_create_nonce( 'wp_rest' ),
            )
        );
    }

}