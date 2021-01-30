<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 11:02
 */

namespace src\Core\Resources;

trait Functions
{

    protected
        $_collate,
        $_sql,
        $_table_name;

    protected function _functions_hooks(){
        $this->create_table();
        add_action('wp_head', [$this, 'do_meta'], 1);
    }

    public function create_table(){
        global $wpdb;
        //var_dump();
        $this->_collate = $wpdb->get_charset_collate();
        $this->_table_name = $wpdb->prefix .'site_data';

        $this->_sql = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . "(
data_id bigint(20) unsigned NOT NULL auto_increment PRIMARY KEY,
data_name varchar(191) NOT NULL,
data_value longtext NOT NULL,
data_date datetime NOT NULL default '0000-00-00 00:00:00',
autoload varchar(20) NOT NULL default 'Yes') " . $this->_collate;
        $wpdb->query($this->_sql);
    }

    public function do_meta(){
        do_action('add_meta');
    }

}