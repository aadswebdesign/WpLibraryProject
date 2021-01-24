<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 05:27
 */

namespace src\NavigationManager\Pages\Factory;


trait Vars
{
    protected
        $_active_wrapper_close = '',
        $_active_wrapper_open = '',
        $_args,
        $_attributes,
        $_atts =[],
        $_class_names,
        $_id,
        $_indent,
        $_item,
        $_item_output,
        $_item_slug,
        $_nonactive_wrapper_close,
        $_nonactive_wrapper_open,
        $_post_id;

    public $id;
}