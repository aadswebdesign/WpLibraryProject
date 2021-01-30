<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 18:57
 */

namespace src\HtmlTagsManager\Elements\Form\Decorators;

use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;
use src\HtmlTagsManager\Factory\TagConsts;
class LabelElem extends ToElemString
{
    use FormAttributes;

    /**
     * LabelElem constructor.
     * @param null $for
     * @param null $content
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $attributes
     */
    //1:for,2:content,3:class,4:styles,5:title,6:attributes
    public function __construct($for=null, $content = null, $class=null, $styles=null, $title=null, $attributes=null)
    {
        $this->_htm_for = $for;
        $this->_htm_content = $content;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_attributes = $attributes;
    }


    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_LABEL);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--F--
        $this->_html .= __($this->_el_attr_for());
        //--S--
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());

        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_htm_content);
        $this->_html .= __(TagConsts::ELEM_LABEL_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}