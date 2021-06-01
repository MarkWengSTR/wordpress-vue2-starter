<?php
namespace MWPCurains\Router;

class Urls {
    static function send_url_to_frontend() {
        wp_localize_script( 'backend-vue-script', 'wpBackendUrls', [
            'adminUrl'   => admin_url( '/'  ),
            'ajaxUrl'    => admin_url( 'admin-ajax.php'  ),
            'apiUrl'     => home_url( '/wp-json'  ),
            'customer' => [
                'all'     => home_url( '/wp-json/' .'MWPCurtains/v1' . '/' . 'customers' ),
                'create'  => home_url( '/wp-json/' .'MWPCurtains/v1' . '/' . 'customers' ),
                'rudBase' => home_url( '/wp-json/' .'MWPCurtains/v1' . '/' . 'customer' ),
            ]
        ] );
    }
}
