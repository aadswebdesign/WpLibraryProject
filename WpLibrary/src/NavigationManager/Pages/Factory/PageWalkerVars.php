<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-12-2020
 * Time: 21:17
 */

namespace src\NavigationManager\Pages\Factory;


trait PageWalkerVars
{
    protected
        $_cb_args,
        $_children_el = [],
        $_count = -1,
        $_db_fields,
        $_element,
        $_elements,
        $_empty_array = [],
        $_end,
        $_field_id,
        $_has_children,
        $_max_dept,
        $_max_pages = 1,
        $_new_level,
        $_old_start,
        $_output = '',
        $_page_num,
        $_paging,
        $_parent_field,
        $_per_page,
        $_start,
        $_top_level_el = [],
        $_total_top,
        $_tree_type;
}