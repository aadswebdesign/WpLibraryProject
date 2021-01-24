<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 10:27
 */

namespace src\HtmlTagsManager\Factory\Base;



trait BaseAttributes
{
    use BaseOptions;

    //-- A --
    protected function _el_attr_alt(){
        if(!empty($this->_htm_alt))
            $this->_html .= " alt='" . $this->_htm_alt . "'";
        return $this->_attr;
    }

    protected function _el_attr_attributes(){
        if (!empty($this->_htm_attributes)) {
            foreach ($this->_htm_attributes as $attribute => $value){
                $attribute_set = " " . $attribute . "='" . $value . "'";
                $this->_html .= $attribute_set;
            }
        }
        return $this->_attr;
    }

    //--C--
    protected function _el_attr_class(){
        if(!empty($this->_htm_class))
            $this->_html .= " class='" . $this->_htm_class . "'";
        return $this->_attr;
    }

    //--H--
    protected function _el_attr_height(){
        if(!empty($this->_htm_height))
            $this->_html .= " height='" . $this->_htm_height . "'";
        return $this->_attr;
    }

    //--I--
    protected function _el_attr_id(){
        if(!empty($this->_htm_id))
            $this->_html .= " id='" . $this->_htm_id . "'";
        return $this->_attr;
    }

    //--S--
    protected function _el_attr_src(){
        if(!empty($this->_htm_src))
            $this->_html .= " src='" . $this->_htm_src . "'";
        return $this->_attr;
    }

    protected function _el_attr_styles(){
        if (!empty($this->_htm_styles)) {
            $this->_html .= " style='";
            foreach ($this->_htm_styles as $style => $value) {
                $this->_html .= $style . ': ' . $value . '; ';
            }
            $this->_html .= "' ";
        }
        return $this->_attr;
    }

    //--T--
    protected function _el_attr_target(){
        if(!empty($this->_htm_target))
            $this->_html .= " target='" . $this->_htm_target . "'";
        return $this->_attr;
    }

    protected function _el_attr_title(){
        if(!empty($this->_htm_title))
            $this->_html .= " title='" . $this->_htm_title . "'";
        return $this->_attr;
    }

    //--W--
    protected function _el_attr_width(){
        if(!empty($this->_htm_width))
            $this->_html .= " width='" . $this->_htm_width . "'";
        return $this->_attr;
    }
}