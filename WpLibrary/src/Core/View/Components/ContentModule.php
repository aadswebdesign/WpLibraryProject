<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:52
 */

namespace src\Core\View\Components;
use src\Core\Factory\CoreOptions;

class ContentModule
{
    use CoreOptions;

    protected function _html_start(){
        $id = get_current_blog_id();
        $site_id = 'site_'. $id . '_';

        $this->_html = __("<main ");
        if(!empty($this->_core_id['main']))
            $this->_html .= __("id='{$this->_core_id['main']}' class='{$this->_core_class['main']}'");
        else
            $this->_html .= __("class='{$this->_core_class['main']}'");
        $this->_html .= __(">");
        updateSiteItem($site_id.'main_class', __($this->getCoreClass('main')));
        updateSiteItem($site_id.'main_id', __($this->getCoreId('main')));
        return $this->_html;
    }

    protected function _html_end(){
        $this->_html = __("</main>");
        return $this->_html;
    }


















}