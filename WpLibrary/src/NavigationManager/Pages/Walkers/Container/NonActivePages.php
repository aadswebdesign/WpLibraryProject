<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 05:16
 */

namespace src\NavigationManager\Pages\Walkers\Container;


trait NonActivePages
{
    /**
     * available vars
     * $this->_data_atts
     * $this->__item
     * $this->_item_slug
     * $this->_item_output
     * $this->_nonactive_svg_close
     * $this->_nonactive_svg_open
     */

    protected function  _walker_nonactive(){
        $this->_item_output = __("<a".  $this->_attributes .  " id='" . $this->_args->prefix . "_" . $this->_item_slug . "' class='" . $this->_args->a_nonactive_prefix . $this->_item_slug .  " " . $this->_args->a_nonactive_classes . "' rel='" . $this->_args->a_nonactive_prefix  . $this->_item->ID . "'". $this->_args->a_nonactive_additional_atts . ">");
        $this->_item_output .= __($this->_nonactive_wrapper_open);
        $this->_item_output .= apply_filters('the_title', $this->_item->title, $this->_item->ID);
        $this->_item_output .= __($this->_nonactive_wrapper_close);
        $this->_item_output .= __("</a>");
    }
}