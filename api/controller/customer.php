<?php
namespace MWPCurains\Controller;

use WP_REST_Controller;
use MWPCurains\Repository;

class Customer extends WP_REST_Controller {
    protected $namespace;
    protected $rest_base;

    public function __construct() {
        $this -> namespace = 'MWPCurtains/v1';
        $this -> rest_base = 'customer';
    }

    public function register_routes() {
        /**
         * Register customer Routes - Find All Customers
         */
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . 's',
            [
                [
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'find_all' ],
                    'permission_callback' => '__return_true',
                ],
            ]
        );


        /**
         * Register customer Routes - create item
         */
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                [
                    'methods'             => \WP_REST_Server::CREATABLE,
                    'callback'            => [ $this, 'create_customer' ],
                    'permission_callback' => '__return_true',
                    'args'                => [ $this->get_endpoint_args_for_item_schema(true) ]
                ],
            ]
        );


        /**
         * Register customer Routes - update item
         */
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/(?P<id>[\d]+)',
            [
                [
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_customer' ],
                    'permission_callback' => '__return_true',
                    'args'                => [ $this->get_collection_params() ]
                ],
                [
                    'methods'             => \WP_REST_Server::EDITABLE,
                    'callback'            => [ $this, 'update_customer' ],
                    'permission_callback' => '__return_true',
                    'args'                => [ $this->get_endpoint_args_for_item_schema(true) ]
                ],
            ]
        );
    }

    public function find_all ($request) {
        return rest_ensure_response(
            Repository\Customer::find_all_customers()
        );
    }

    public function get_customer ($request) {
        return rest_ensure_response(
            Repository\Customer::find_customer_by_id($request['id'])
        );
    }


    public function create_customer ($request) {
        $to_create = [
            'name' => isset( $request['name'] ) ? sanitize_text_field( $request['name'] ) : '',
            'email' => isset( $request['email'] ) && is_email( $request['email'] ) ? sanitize_text_field( $request['email'] ) : '',
            'phone' => isset( $request['phone'] ) ? sanitize_text_field( $request['phone'] ) : '',
        ]; /* Fail if add more than table columns */

        $result = Repository\Customer::create_customer($to_create);

        return rest_ensure_response(
            [
                'response_code' => ( $result == 1 ) ? 200 : 500
            ]
        );
    }


    public function get_collection_params(){

    }
}
