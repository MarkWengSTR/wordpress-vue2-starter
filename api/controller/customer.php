<?php
namespace MWPCurains\Controller;

use WP_REST_Controller;
use MWPCurains\Repository;

class Customer extends WP_REST_Controller {
    protected $namespace;
    protected $rest_base;

    public function __construct() {
        $this -> namespace = 'MWPCurtains/v1';
        $this -> rest_base = 'customers';
    }

    /**
     * Register customer Routes
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                [
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_items' ],
                    'permission_callback' => '__return_true',
                    'args'                => [ $this->get_collection_params() ]
                ],
            ]
        );
    }

    public function get_items ($request) {
        /* Repository\Customer::find_all_customers() */
        return rest_ensure_response(
            array_merge(Repository\Customer::find_customer_by_id($request['test']))
        );
    }

    public function get_collection_params(){

    }
}
