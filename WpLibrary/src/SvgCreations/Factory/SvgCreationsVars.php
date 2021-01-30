<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 11-10-2020
 * Time: 16:11
 */

namespace src\SvgCreations\Factory;


trait SvgCreationsVars
{
    protected
        $_html;
    protected
        $_svg,
        $_svg_defs,
        $_svg_gradient = [],
        $_svg_group = [],
        $_svg_image,
        $_svg_image_urls,
        $_svg_setup,
        $_svg_path_drawing = [],
        $_svg_path = [],
        $_svg_stop = [],
        $_svg_stop_set = [],
        $_svg_stops,
        $_svg_text,
        $_svg_text_path = [];


}