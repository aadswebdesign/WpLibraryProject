<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:57
 */

namespace src\Core\Factory;


trait CoreVars
{
    protected
        $_blog_id,
        $_browser = [],
        $_core_attributes = [],
        $_core_content = [],
        $_core_class = [],
        $_data_collect = [],
        $_html,
        $_core_id = [],
        $_menu,
        $_menu_setup = [],
        $_page_slug,
        $_sidebar = [],
        $_site_data = [],
        $_site_data_entree = [],
        $_site_data_theme_name,
        $_site_item = [],
        $_svg_drawing = [],
        $_svg_drawing_prefix = [],
        $_tag,
        $_theme = [],
        $_theme_data,
        $_url,
        $_wp_prefix;
}