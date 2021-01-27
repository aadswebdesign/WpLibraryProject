<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:53
 */

namespace src\Core\View\Components;
use src\Core\Factory\CoreOptions;

class HeaderModule
{
    use CoreOptions;
    protected function _html_start(){
        $id = get_current_blog_id();
        $site_id = 'site_'. $id . '_';
        if(!empty($this->_core_class['pr_header_section_class']))
            $this->_html = __("<section class='{$this->_core_class['pr_header_section_class'] }'>");
        else
            $this->_html = __("<section>");
        if(!empty($this->_sidebar[1])){
            $this->_html .= __($this->_sidebar[1]);
        }
        $this->_html .= __("<div class='block-01 relative'>");
        $this->_html .= __("<div class='block-01-inner absolute'>");
        if(!empty($this->_menu_setup['primary_menu'])){
            $this->_html .= __($this->_menu_setup['primary_menu']);
        }
        if(!empty($this->_core_class['pr_header_class']))
            $this->_html .= __("<header class='{$this->_core_class['pr_header_class']}'>");
        else
            $this->_html .= __("<header>");
        if(!empty($this->_svg_drawing['primary_header'])){
            $this->_html .= __($this->_svg_drawing['primary_header']);
            updateSiteItem($site_id.'primary_header', __($this->_svg_drawing['primary_header']));
        }
        if(!empty($this->_menu_setup['primary_menu']))
            updateSiteItem($site_id.'primary_menu', __($this->_menu_setup['primary_menu']));
        updateSiteItem($site_id.'pr_header_section_class', __($this->getCoreClass('pr_header_section_class')));
        updateSiteItem($site_id.'pr_header_class', __($this->getCoreClass('pr_header_class')));
        return $this->_html;
    }

    protected function _html_end(){
        $this->_html = __("</header>");
        $this->_html .= __("</div></div>");
        $this->_html .= __("</section>");
        return $this->_html;
    }
}