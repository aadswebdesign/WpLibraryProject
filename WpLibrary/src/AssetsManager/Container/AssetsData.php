<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 28-11-2020
 * Time: 07:25
 */

namespace src\AssetsManager\Container;


trait AssetsData
{

    public function add_assets_data( $name, $data ) {
        $this->_name = $name;
        if ( ! is_scalar( $this->_name ) )
            return false;
        $this->extra[ $this->_name ] = $data;
        return true;
    }

    public function set_assets_translations( $domain, $path = null ) {
        $this->_textdomain = $domain;
        if ( ! is_string( $this->_textdomain ) )
            return false;
        $this->_translations_path = $path;
        return true;
    }
}