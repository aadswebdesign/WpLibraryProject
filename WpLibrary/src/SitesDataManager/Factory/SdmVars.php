<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-12-2020
 * Time: 19:10
 */

namespace src\SitesDataManager\Factory;


trait SdmVars
{
    protected
        $_all_items = [],
        $_all_items_db,
        $_autoload,
        $_cache_key,
        $_data_date,
        $_default,
        $_error,
        $_force_cache,
        $_item,
        $_items,
        $_name,
        $_network_id,
        $_no_items,
        $_no_items_key,
        $_old_value,
        $_original_value,
        $_passed_default,
        $_pre,
        $_result,
        $_row,
        $_row_value,
        $_serialized_value,
        $_show_item,
        $_suppress,
        $_table_connect,
        $_update_args,
        $_value,
        $_values,
        $_wp_db;

    //rest api
    protected
        $_rest_site_data,
        $_get_rest_site_data,
        $_rest_site_data_fields,
        $_rest_items,
        $_rest_url,
        $_sites,
        $_theme_data = [],
        $_theme_manager,
        $_theme_name;

    public $value;
}