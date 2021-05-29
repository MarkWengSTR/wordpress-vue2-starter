<?php

/*
Plugin Name: Vue Hot Reload Plugin
Description: Vue Hot Reloading inside of WordPress.
Version: 1.0.0
*/

if( ! defined( 'ABSPATH' ) ) exit(); // No direct access allowed

require_once 'vendor/autoload.php';

use MWPCurains\Api\Router\Main_Router;

class Main {
    public function __construct() {
        $this->register_hooks();
    }

    private function register_hooks() {
        // Register hook to add a menu to the admin page
        //
        add_action('admin_menu', [ $this, 'add_admin_menu' ]);
        add_action('admin_enqueue_scripts', [ $this, 'load_scripts' ]);
    }

    public function add_admin_menu() {
        add_menu_page(
            'Customers',
            'Customers',
            'manage_options',
            'customer',
            [ $this, 'load_vue_plugin_page' ],
            'dashicons-smiley',
            4
        );
    }

    public function load_vue_plugin_page() {
        wp_enqueue_style( 'backend-vue-style' );
        wp_enqueue_style( 'backend-vue-img' );
        wp_enqueue_script( 'backend-vue-script' );

        // For a better overview we load page templates separately
        require_once 'templates/vue-plugin-admin.php';
    }

    public function load_scripts() {
        $vueDirectory    = plugin_dir_url(__FILE__) . 'vue' . '/dist';
        wp_register_style( 'backend-vue-style', $vueDirectory . '/app.css' );
        wp_register_style( 'backend-vue-img', $vueDirectory . '/img' );
        wp_register_script( 'backend-vue-script', $vueDirectory . '/app.js', [], '1.0.0', true );

        wp_localize_script( 'backend-vue-script', 'wpBackendUrls', [
            'adminUrl'  => admin_url( '/'  ),
            'ajaxUrl'   => admin_url( 'admin-ajax.php'  ),
            'apiUrl'    => home_url( '/wp-json'  )
        ] );
    }
}

new Main();
new Main_Router();
