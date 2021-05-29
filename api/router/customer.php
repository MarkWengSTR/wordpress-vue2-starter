<?php
namespace MWPCurains\Router;

use WP_REST_Controller;
use MWPCurains\Repository;

class Customer extends WP_REST_Controller {
    protected $namespace = 'MWPCurtains/v1';
    protected $rest_base = 'customers';

    /**
     * Register customer Routes
     */
    public function register_customer_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                [
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_customers' ],
                    'permission_callback' => '__return_true',
                    'args'                => []
                ],
            ]
        );
    }

    public function get_customers ($request) {
        return rest_ensure_response(
            ( new Repository\Customer ) -> get_all_customers()
        );
    }
}
