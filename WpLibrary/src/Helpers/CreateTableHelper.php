<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 28-12-2020
 * Time: 12:35
 */

namespace src\Helpers;


class CreateTableHelper
{

    protected $_create_table, $_table_name;
    public function __construct($table_name, $create_table)
    {
        global $wpdb;
        $this->_create_table = $create_table;
        $this->_table_name = $table_name;
        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $this->_table_name ) );
        if ( $wpdb->get_var( $query ) === $this->_table_name )
            return true;
        $wpdb->query( $this->_create_table );
        if ( $wpdb->get_var( $query ) === $this->_table_name )
            return true;
        return false;
    }
}