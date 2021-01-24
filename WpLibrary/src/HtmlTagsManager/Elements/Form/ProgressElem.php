<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 13-12-2020
 * Time: 17:36
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;

class ProgressElem extends ToElemString
{
    use FormAttributes;

    /**
     * ProgressElem constructor.
     * @param null $name
     * @param null $value
     * @param null $content
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $max
     * @param null $attributes
     * @param null $form
     */
    //1:name,2:value,3:content,4:id,5:class,6:styles,7:title,8:max,9:attributes,10:form
    public function __construct($name=null, $value=null, $content = null, $id=null, $class=null, $styles=null, $title = null, $max = null, $attributes=null, $form=null)
    {
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_content = $content;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_max = $max;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_PROGRESS);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--F--
        $this->_html .= __($this->_el_attr_form());
        //--M--
        $this->_html .= __($this->_el_attr_max());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--S--
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());
        //--V--
        $this->_html .= __($this->_el_attr_value());

        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_htm_content);
        $this->_html .= __(TagConsts::ELEM_PROGRESS_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}