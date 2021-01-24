<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 15-11-2020
 * Time: 10:14
 */

namespace src\Core\Wp;

use src\Core\Factory\CoreOptions;
trait WpTemplate
{
    use CoreOptions;
    protected $_content;

    protected function _wp_entry_content(){
        global $post;
        $id = get_current_blog_id();
        $site_id = 'site_'. $id . '_';
        $this->_page_slug = $post->post_name;

        while ( have_posts() ) : the_post();
            $this->_content = __("<div id='{$this->_page_slug}_entry_content' class='{$this->_core_class['entry_content_class']}'>");
            $this->_content .= __("<div class='{$this->_core_class['entry_content_inner_class']}'>");
            $this->_content .= get_the_content(); //Page Content
            $this->_content .= __("</div></div>");
        endwhile; //resetting the page loop
        updateSiteItem($site_id.'content_container_class', __($this->getCoreClass('content_container_class')));
        updateSiteItem($site_id.'content_container_inner_class', __($this->getCoreClass('content_container_inner_class')));
        updateSiteItem($site_id .'entry_content', __( get_the_content()));
        updateSiteItem($site_id.'entry_content_class', __($this->getCoreClass('entry_content_class')));
        updateSiteItem($site_id.'entry_content_inner_class', __($this->getCoreClass('entry_content_inner_class')));
        updateSiteItem($site_id.'entry_content_id', __($this->_page_slug.'_entry_content'));
        updateSiteItem($site_id.'entry_header_class', __($this->getCoreClass('entry_header_class')));
        updateSiteItem($site_id.'entry_header_id', __($this->_page_slug.'_entry_header'));
        wp_reset_query(); //resetting the page query
        return $this->_content;
    }


    protected function _template_html(){
        global $post;
        $id = get_current_blog_id();
        $site_id = 'site_'. $id . '_';

        $this->_page_slug = $post->post_name;
        //global $wpdb;
        $this->_html = __("<div class='{$this->_core_class['content_container_class']}'>");

        $this->_html .= __("<div class='{$this->_core_class['content_container_inner_class']}'>");
        if(!empty($this->_sidebar[2])){
            $this->_html .= __($this->_sidebar[2]);
        }
        $this->_html .= __("<header id='{$this->_page_slug}_entry_header' class='{$this->_core_class['entry_header_class']}'>");
        if(!empty($this->_svg_drawing['entry_header'])){
            $this->_html .= __($this->_svg_drawing['entry_header']);
            updateSiteItem($site_id . 'entry_header', __((string)$this->_svg_drawing['entry_header']));
        }
        $this->_html .= __("</header>");
        $this->_html .=  $this->_wp_entry_content();
        $this->_html .= __("</div></div>");

        return (string)$this->_html;
    }
}
