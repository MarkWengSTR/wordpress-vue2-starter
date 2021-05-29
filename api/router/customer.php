<?php
namespace MWPCurains\Api\Router;

use WP_REST_Controller;

class Customer extends WP_REST_Controller
{
    protected $namespace;
    protected $rest_base;

    public function __construct()
    {
        $this->namespace = 'MWPCurtains/v1';
        $this->rest_base = 'customers';
    }

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
            [
                'name' => 'Mark',
                'Email' => '124@gmail.com',
                'Phone' => '2331353215',
            ]
        );
    }
}
