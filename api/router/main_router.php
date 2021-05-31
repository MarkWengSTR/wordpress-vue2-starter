<?php
namespace MWPCurains\Router;

use MWPCurains\Controller\Customer;

/**
 * Rest API Handler
 */
class Main_Router {

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
        $customer_routers = new Customer();
        $customer_routers -> index_route();
        $customer_routers -> get_or_create();
    }

}
