<?php

namespace MWPCurains\Repository;

class Customer {
    public function get_all_customers() {
        global $wpdb;

        return $wpdb->get_results(
          "SELECT `ID`, `user_login`,  `user_nicename` FROM `{$wpdb->prefix}users`
        ", OBJECT
        );
    }
}

