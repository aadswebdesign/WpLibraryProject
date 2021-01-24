<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-12-2020
 * Time: 19:14
 */

namespace src\SitesDataManager\RestPoints;
use src\SitesDataManager\Factory\SdmConsts;

trait SdmRestPoint
{
    private function __getRestPointSiteData(){

        global $wpdb;
        $blog_id =  get_current_blog_id();

        $this->_theme_data[$blog_id] = [
            'rest_point_data' => 'rest_point_value',
            SdmConsts::SDM_THEME_DATA .'_' . $blog_id => getSiteItem(__($wpdb->prefix.'theme_name'))

        ];
        $this->_rest_site_data =  apply_filters( 'whitelist_options', $this->_theme_data[$blog_id] ); //todo look this up
        return $this->_rest_site_data;
    }

    public function getRestPointSiteData(){
        $blog_id =  get_current_blog_id();
        $this->_rest_url = trailingslashit( get_rest_url() . SdmConsts::WP_V2 . SdmConsts::SDM_SEPARATOR . SdmConsts::SDM_THEME_MANAGER );
        $this->_get_rest_site_data =  $this->__getRestPointSiteData();
        $this->_rest_site_data_fields = array_merge($this->_get_rest_site_data[SdmConsts::SDM_THEME_DATA .'_' . $blog_id]);
        $i = 0;
        $this->_rest_items = [];
        foreach($this->_rest_site_data_fields as $item_field){
            $this->_rest_items[$item_field] = getSiteItem($item_field); //todo look this up
            $i ++;
        }
        return apply_filters('rest_site_data_format_items', $this->_rest_items);
    }

    public function saveRestPointSiteData(){
        //new updateSiteItemHelper('site_data_fields', true);

    }

    public function updateRestPointSiteData(){
        $this->saveRestPointSiteData();
        return rest_ensure_response(array($this, 'saveRestPointSiteData'))->set_status(201);
    }













}