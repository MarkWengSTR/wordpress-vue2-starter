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

    static function create_customer($to_create) {
        global $wpdb;

        $result = $wpdb->insert(
            'customers', $to_create
        );

        return $result;
    }

    static function update_customer($to_update) {
        global $wpdb;

        $result = $wpdb->replace(
            'customers', $to_update
        );

        return $result;
    }

    static function delete_customer($id) {
        global $wpdb;

        $result = $wpdb->delete(
            'customers', [ 'ID' => $id ]
        );

        return $result;
    }
}
