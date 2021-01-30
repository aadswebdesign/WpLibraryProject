<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 13-12-2020
 * Time: 17:42
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;


class OutputElem extends ToElemString
{
    use FormAttributes;

    /**
     * OutputElem constructor.
     * @param null $name
     * @param null $content
     * @param null $for
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $attributes
     * @param null $form
     */
    //1:name,2:content,3:for,4:class,5:styles,6:title,7:attributes,8:form
    public function __construct($name=null, $content = null, $for=null, $class=null, $styles=null, $title = null, $attributes=null, $form = null)
    {
        $this->_htm_name = $name;
        $this->_htm_content = $content;
        $this->_htm_for = $for;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_OUTPUT);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--F--
        $this->_html .= __($this->_el_attr_for());
        $this->_html .= __($this->_el_attr_form());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--S--
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());

        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_htm_content);
        $this->_html .= __(TagConsts::ELEM_OUTPUT_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}