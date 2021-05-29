<?php
namespace MWPCurains\Router;

use WP_REST_Controller;
use MWPCurains\Router\Customer;

/**
 * Rest API Handler
 */
class Main_Router extends WP_REST_Controller {

    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'rest_api_init', [ $this, 'register_customer_routes' ] );
    }

    /**
     * Register API routes
     */
    public function register_customer_routes() {
        ( new Customer() )->register_customer_routes();
    }

}
