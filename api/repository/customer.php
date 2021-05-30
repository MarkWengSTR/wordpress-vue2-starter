<?php

namespace MWPCurains\Repository;

class Customer {
    static function find_all_customers() {
        global $wpdb;

        return $wpdb->get_results(
            " SELECT * FROM customers"
            , OBJECT
        );
    }

    static function find_customer_by_id($id) {
        global $wpdb;

        return $wpdb->get_results(
            $wpdb->prepare(
                " SELECT * FROM customers WHERE id = %d", $id
            ), OBJECT
        );
    }
}
