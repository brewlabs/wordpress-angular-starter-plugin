<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class admin_js_app_page {

    function register_menu() {
        add_menu_page( 'SendPress UI', 'SendPress', 'manage_options', 'admin-js-app', array( $this, 'admin_page' ) );
    }

    function admin_page() {

        echo
            '
  <base href="/wp-admin/admin.php?page=admin-js-app">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style type="text/css">
    body, html {
      height: 100%;
    }
    .app-loading {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
    }
    .app-loading .apploader {
      height: 200px;
      width: 200px;
      animation: rotate 2s linear infinite;
      transform-origin: center center;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: auto;
    }
    .app-loading .apploader .path {
      stroke-dasharray: 1, 200;
      stroke-dashoffset: 0;
      animation: dash 1.5s ease-in-out infinite;
      stroke-linecap: round;
      stroke: #ddd;
    }
    @keyframes rotate {
      100% {
        transform: rotate(360deg);
      }
    }
    @keyframes dash {
      0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
      }
      50% {
        stroke-dasharray: 89, 200;
        stroke-dashoffset: -35px;
      }
      100% {
        stroke-dasharray: 89, 200;
        stroke-dashoffset: -124px;
      }
    }
  </style>
  <app-root><br><br><br><br><div class="app-loading">
      <div class="logo"></div>
      <svg class="apploader" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
      </svg>
    </div></app-root>
';

    }

}

?>