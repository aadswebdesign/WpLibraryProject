<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:53
 */

namespace src\Core\View\Components;
use src\Core\Factory\CoreOptions;

class FooterModule
{
    use CoreOptions;

    protected function _html_start(){
        if(!empty($this->_core_class['footer_section']))
            $this->_html = __("<section class='{$this->_core_class['footer_section']}'>");
        else
            $this->_html = __("<section>");
        if(!empty($this->_core_class['footer']))
            $this->_html .= __("<footer class='{$this->_core_class['footer']}'>");
        else
            $this->_html .= __("<footer>");
        $this->_html .= __("<small id='authorInfo' class='block-01 absolute' title='aad&lsquo;s webdesign'>");
        $this->_html .= __("awd");
        $this->_html .= __("<time><i> &#169; </i>");
        $this->_html .= __(date('Y'));
        $this->_html .= __("</time></small>");
        $this->_html .= __("</footer>");
        $id = get_current_blog_id();
        $site_id = 'site_'. $id . '_';
        updateSiteItem($site_id.'footer_section_class', __($this->getCoreClass('footer_section')));
        updateSiteItem($site_id.'footer_class', __($this->getCoreClass('footer')));
        return $this->_html;
    }

    protected function _html_end(){
        $this->_html = __("</section>");
        return $this->_html;
    }
}