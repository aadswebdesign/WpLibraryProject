<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 28-12-2020
 * Time: 07:28
 */

namespace src\Core\Resources;


use src\Core\Factory\CoreOptions;

trait Data
{
    use CoreOptions;
    protected function _data_hooks(){
        $this->_site_data_collect();
    }

    protected function _site_data_collect(){
        $id = get_current_blog_id();
        $site_id = 'site_'. $id . '_';
        $this->_data_collect = getSiteItem($site_id .'theme_data') ;
        if(!empty($this->_data_collect))
            updateSiteItem(__($this->_theme_data), __($this->getDataCollect()));
    }
}