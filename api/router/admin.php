<?php
namespace MWPCurains\Api\Router;

use WP_REST_Controller;

class Admin extends WP_REST_Controller
{
    protected $namespace;
    protected $rest_base;

    public function __construct()
    {
        $this->namespace = 'MWPCurains/v1'
        $this->rest_base = 'customer'
    }
}
