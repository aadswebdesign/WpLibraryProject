<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:59
 */

namespace src\Core\Factory;


trait CoreOptions
{
    use CoreVars;
    public function setBlogId($blog_id)
    {
        $this->_blog_id = $blog_id;
    }
    public function getBlogId()
    {
        return $this->_blog_id;
    }
    public function setCoreAttributes($object = null, $core_attributes)
    {
        if(!empty($object))
            $this->_core_attributes[$object] = $core_attributes;
        else
            $this->_core_attributes = $core_attributes;
        return $this;
    }
    public function setCoreClass($object = null, $core_class)
    {
        if(!empty($object))
            $this->_core_class[$object] = $core_class;
        else
            $this->_core_class = $core_class;
        return $this;
    }
    public function getCoreClass($object = null)
    {
        if(!empty($this->_core_class[$object]))
            $content = $this->_core_class[$object];
        else
            $content = $this->_core_class;
        return $content;
    }
    public function setCoreContent($object = null, $core_content)
    {
        if(!empty($object))
            $this->_core_content[$object] = $core_content;
        else
            $this->_core_content = $core_content;
        return $this;
    }
    public function getCoreContent($object = null)
    {
        if(!empty($this->_core_content[$object]))
            $content = $this->_core_content[$object];
        else
            $content = $this->_core_content;
        return $content;
    }
    public function setCoreId($object = null, $core_id)
    {
        if(!empty($object))
            $this->_core_id[$object] = $core_id;
        else
            $this->_core_id = $core_id;
        return $this;
    }
    public function getCoreId($object)
    {
        if(!empty($this->_core_id[$object]))
            $content = $this->_core_id[$object];
        else
            $content = $this->_core_id;
        return $content;
    }
    public function setMenuSetup($object = null, $menu_setup)
    {
        if(!empty($object))
            $this->_menu_setup[$object] = $menu_setup;
        else
            $this->_menu_setup = $menu_setup;
        return $this;
    }
    public function getMenuSetup($object){
        if(!empty($this->_menu_setup[$object]))
            $return = $this->_menu_setup[$object];
        else
            $return = $this->_menu_setup;
        return $return;
    }

    public function setPageSlug($page_slug)
    {
        $this->_page_slug = $page_slug;
        return $this;
    }

    public function getPageSlug()
    {
        return $this->_page_slug;
    }
    public function setSidebar($object = null, $sidebar)
    {
        if(!empty($object))
            $this->_sidebar[$object] = $sidebar;
        else
            $this->_sidebar = $sidebar;
        return $this;
    }
    public function setSiteData($object =  null, $site_data){
        if(!empty($object))
            $this->_site_data[$object] = $site_data;
        else
            $this->_site_data = $site_data;
        return $this;
    }
    public function getSiteData($object =  null){
        if(!empty($this->_site_data[$object]))
            $return = $this->_site_data[$object];
        else
            $return = $this->_site_data;
        return $return;
    }
    public function setDataCollect($object =  null, $data_collect){
        if(!empty($object))
            $this->_data_collect[$object] = $data_collect;
        else
            $this->_data_collect = $data_collect;
        return $this;
    }
    public function getDataCollect($object =  null){
        if(!empty($this->_data_collect[$object]))
            $return = $this->_data_collect[$object];
        else
            $return = $this->_data_collect;
        return $return;
    }
    public function setSiteItem($object =  null, $site_item){
        if(!empty($object))
            $this->_site_item[$object] = $site_item;
        else
            $this->_site_item = $site_item;
        return $this;
    }
    public function getSiteItem($object =  null){
        if(!empty($this->_site_item[$object]))
           $return = $this->_site_item[$object];
        else
            $return = $this->_site_item;
        return $return;
    }
    public function setSiteDataThemeName( $_site_data_theme_name)
    {
        $this->_site_data_theme_name = $_site_data_theme_name;
    }
    public function getSiteDataThemeName()
    {
        return $this->_site_data_theme_name;
    }
    public function setSiteDataEntree($object = null, $_site_data_entree)
    {
        if(!empty($object))
            $this->_site_data_entree[$object] = $_site_data_entree;
        else
            $this->_site_data_entree = $_site_data_entree;
        return $this;
    }
    public function getSiteDataEntree($object = null)
    {
        if(!empty($this->_site_data_entree[$object]))
            $return = $this->_site_data_entree[$object];
        else
            $return = $this->_site_data_entree;
        return $return;
    }
    public function getSvgDrawing($object = null)
    {
        if(!empty($this->_svg_drawing[$object]))
            $return = $this->_svg_drawing[$object];
        else
            $return = $this->_svg_drawing;
        return $return;
    }

    public function setSvgDrawing($object = null,$svg_drawing)
    {
        if(!empty($object))
        $this->_svg_drawing[$object] = $svg_drawing;
        return $this;
    }

    public function getSvgDrawingPrefix($object = null)
    {
        if(!empty($this->_svg_drawing_prefix[$object]))
            $return = $this->_svg_drawing_prefix[$object];
        else
            $return = $this->_svg_drawing_prefix;
        return $return;
    }
    public function setSvgDrawingPrefix($object = null,$svg_drawing_prefix)
    {
        if(!empty($object))
            $this->_svg_drawing_prefix[$object] = $svg_drawing_prefix;
        else
            $this->_svg_drawing_prefix = $svg_drawing_prefix;
        return $this;
    }
    public function setTheme($object = null,$theme){
        if(!empty($object))
            $this->_theme[$object] = $theme;
        else
            $this->_theme = $theme;
        return $this;
    }
    public function setThemeData($theme_data)
    {
        $this->_theme_data = $theme_data;
    }
    public function getWpPrefix()
    {
        return $this->_wp_prefix;
    }
}