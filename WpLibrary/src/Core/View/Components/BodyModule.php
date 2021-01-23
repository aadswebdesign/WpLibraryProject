<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:52
 */

namespace src\Core\View\Components;

use src\Core\Factory\CoreOptions;
class BodyModule
{
    use CoreOptions;

    protected function _html_start(){
        $id = get_current_blog_id();
        $site_id = 'site_'. $id . '_';
        $this->_html = __("<body");
        if(!empty($this->_core_id['body']) && !empty($this->_core_class['body']))
            $this->_html .= __(" id='{$this->_core_id['body']}' class='{$this->_core_class['body']}'");
        elseif(!empty($this->_core_id['body']))
            $this->_html .= __(" id='{$this->_core_id['body']}'");
        elseif(!empty($this->_core_class['body']))
            $this->_html .= __(" class='{$this->_core_class['body']}'");
        $this->_html .= __("> ");
        $this->_html .= __("<div ");
        if(!empty($this->_page_slug) && !empty($this->_core_class['container']))
            $this->_html .= __("id='{$this->_page_slug}' class='{$this->_core_class['container']}'");
        elseif(!empty($this->_page_slug))
            $this->_html .= __("id='{$this->_page_slug}'");
         elseif(!empty($this->_core_class['container']))
            $this->_html .= __("class='{$this->_core_class['container']}'");
        updateSiteItem($site_id.'body_class', __($this->getCoreClass('body')));
        updateSiteItem($site_id.'body_id', __($this->getCoreId('body')));
        updateSiteItem($site_id.'container_class', __($this->getCoreClass('container')));
        updateSiteItem($site_id.'container_id', __($this->_page_slug));
        $this->_html .= __(">");
        return $this->_html;
    }

    protected function _html_end(){
        $this->_html = __("</div>");
        ob_start();
        wp_footer();
        $this->_custom_footer();
        $this->_html .= __(ob_get_clean());
        $this->_html .= __("<script> </script>");
        $this->_html .= __("</body>");
        return $this->_html;
    }

    protected function _custom_footer(){
        do_action('custom_footer');
    }

}