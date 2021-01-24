<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 05:16
 */

namespace src\NavigationManager\Pages\Walkers\Container;


trait ActivePage
{
    /**
     * available vars
     * $this->_active_svg_close
     * $this->_active_svg_open
     * $this->_data_atts
     * $this->__item
     * $this->_item_slug
     * $this->_item_output
     */
    protected function _walker_active(){
        $this->_item_output = __("<a id='" . $this->_args->prefix . "_" .  $this->_item_slug . "' class='" . $this->_args->a_active_prefix . $this->_item_slug .  " " . $this->_args->a_active_classes . "' rel='" . $this->_args->a_active_prefix  . $this->_item->ID . "'". $this->_args->a_active_additional_atts .">");
        $this->_item_output .= __($this->_active_wrapper_open);
        $this->_item_output .= apply_filters('the_title', $this->_item->title, $this->_item->ID);
        $this->_item_output .= __($this->_active_wrapper_close);
        $this->_item_output .= __("</a>");
    }

}