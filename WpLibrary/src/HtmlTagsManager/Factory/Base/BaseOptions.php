<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 10:18
 */

namespace src\HtmlTagsManager\Factory\Base;


trait BaseOptions
{
    use BaseVars;

    //---- A ----
    public function setHtmAlt($alt)
    {
        $this->_htm_alt = $alt;
        return $this;
    }

    public function setHtmAttributes($attributes)
    {
        $this->_htm_attributes = $attributes;
        return $this;
    }

    //--- C ---
    public function setHtmClass($class)
    {
        $this->_htm_class = $class;
        return $this;
    }

    public function setHtmContent($content)
    {
        $this->_htm_content = $content;
        return $this;
    }

    //---- H ----
    public function setHtmHeight($height)
    {
        $this->_htm_height = $height;
        return $this;
    }

    //---- I ----
    public function setHtmId($id)
    {
        $this->_id = $id;
        return $this;
    }

    public function setSrc($src)
    {
        $this->_htm_src = $src;
        return $this;
    }

    public function setHtmStyles($styles)
    {
        $this->_htm_styles = $styles;
        return $this;
    }

    public function setHtmTarget($target)
    {
        $this->_htm_target = $target;
        return $this;
    }

    public function setHtmTitle($title)
    {
        $this->_htm_title = $title;
        return $this;
    }

    public function setHtmWidth($width)
    {
        $this->_htm_width = $width;
        return $this;
    }
}