<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-12-2020
 * Time: 23:43
 */

namespace src\SitesDataManager\Factory;


trait SdmFormatting
{
    private function __sanitize_site_data( $item, $value){
        //global $wpdb;
        $this->_original_value = $value;
        $this->_item = $item;
        $this->_error = '';

        switch($this->_item){
            //todo sorting out the needed cases
        }
        if ( ! empty( $this->_error ) ){
            $this->_value = $this->getSiteData($this->_item);
            if(function_exists('add_settings_error'))
                add_settings_error($this->_item, "invalid_{$this->_item}", $this->_error);
        }
        return apply_filters("sanitize_site_data_{$this->_item}", $this->_value, $this->_item, $this->_original_value);
    }

    //private function __

}