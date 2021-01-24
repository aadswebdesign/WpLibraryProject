<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 6-1-2021
 * Time: 08:49
 */
use src\SitesDataManager\Factory\SdmSiteData;

if (!function_exists('getSiteItem')) {
    function getSiteItem($item){
        $class = new SdmSiteData();
        return $class->get_site_item($item);
    }
}

if (!function_exists('updateSiteItem')) {
    function updateSiteItem($item, $value){
        $class = new SdmSiteData();
        return $class->update_site_item($item, $value);
    }
}

if (!function_exists('deleteSiteItem')) {
    function deleteSiteItem($item){
        $class = new SdmSiteData();
        return $class->delete_site_item($item);
    }
}

if (!function_exists('getSiteFormItem')) {
    function getSiteFormItem($item){
        $class = new SdmSiteData();
        return $class->get_site_item($item);
    }
}
