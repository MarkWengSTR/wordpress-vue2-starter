<?php
namespace MWPCurains\Controller;

use WP_REST_Controller;
use WP_REST_Response;
use WP_Error;
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
         * Register customer Routes - Find All Customers & Create Customer
         */
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . 's',
            [
                [
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_items' ],
                    'permission_callback' => '__return_true',
                ],
                [
                    'methods'             => \WP_REST_Server::CREATABLE,
                    'callback'            => [ $this, 'create_item' ],
                    'permission_callback' => '__return_true',
                    'args'                => [ $this->get_endpoint_args_for_item_schema(true) ]
                ],
            ]
        );


        /**
         * Register customer Routes - Find & Update & Delete
         */
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/(?P<id>[\d]+)',
            [
                [
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_item' ],
                    'permission_callback' => '__return_true',
                    'args'                => [ $this->get_collection_params() ]
                ],
                [
                    'methods'             => \WP_REST_Server::EDITABLE,
                    'callback'            => [ $this, 'update_item' ],
                    'permission_callback' => '__return_true',
                    'args'                => [ $this->get_collection_params() ]
                ],
                [
                    'methods'             => \WP_REST_Server::DELETABLE,
                    'callback'            => [ $this, 'delete_item' ],
                    'permission_callback' => '__return_true',
                ],
            ]
        );
    }

    public function get_items ($request) {
        return new WP_REST_Response( Repository\Customer::find_all_customers(), 200 );
    }

    public function get_item ($request) {
        return new WP_REST_Response( Repository\Customer::find_customer_by_id($request['id']), 200 );
    }


    public function create_item ($request) {
        $to_create = [
            'name' => isset( $request['name'] ) ? sanitize_text_field( $request['name'] ) : '',
            'email' => isset( $request['email'] ) && is_email( $request['email'] ) ? sanitize_text_field( $request['email'] ) : '',
            'phone' => isset( $request['phone'] ) ? sanitize_text_field( $request['phone'] ) : '',
        ]; /* Fail if add more than table columns */

        $result = Repository\Customer::create_customer($to_create);

        return ( $result == 1 ) ? ( new WP_REST_Response( $to_create, 200 ) ) : ( new WP_Error( 500, __( 'Not Creatable', 'text-domain' ) )) ;
    }

    public function update_item ($request) {
        if ( !isset( $request['id'] ) ) {
            return rest_ensure_response(
                ["message" => "id not provide, can not update"]
            );
        }

        $to_update = [
            'name' => isset( $request['name'] ) ? sanitize_text_field( $request['name'] ) : '',
            'email' => isset( $request['email'] ) && is_email( $request['email'] ) ? sanitize_text_field( $request['email'] ) : '',
            'phone' => isset( $request['phone'] ) ? sanitize_text_field( $request['phone'] ) : '',
        ]; /* Fail if add more than table columns */

        $result = Repository\Customer::update_customer($to_update, $request['id']);

        return ( $result == 1 ) ? ( new WP_REST_Response( $to_update, 200 ) ) : ( new WP_Error( 500, __( 'Not Updatable', 'text-domain' ) )) ;
    }

    public function delete_item ($request) {
        if ( !isset( $request['id'] ) ) {
            return rest_ensure_response(
                ["message" => "id not provide, can not update"]
            );
        }

        $result = Repository\Customer::delete_customer($request['id']);

        return ( $result == 1 ) ? ( new WP_REST_Response( $to_update, 200 ) ) : ( new WP_Error( 500, __( 'Not Updatable', 'text-domain' ) )) ;
    }
}
