<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 19-12-2020
 * Time: 15:57
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;

class OptionElem extends ToElemString
{
    use FormAttributes;
    protected
        $_params = [];

    /**
     * OptionElem constructor.
     * @param null $name
     * @param null $value
     * @param null $content
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $rel
     * @param bool $selected
     * @param bool $autofocus
     * @param bool $hidden
     * @param bool $disabled
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:name,2:value,3:content,4:id,5:class,6:styles,7:title,8:rel,9:selected,10:autofocus,11:disabled,12:hidden,13:required,14:pattern,15:attributes,16:form
    public function __construct($name=null, $value=null, $content = null, $id=null, $class=null, $styles=null, $title = null, $rel=null, $selected = false, $autofocus = false, $disabled = false, $hidden = false, $required = false, $attributes=null, $form=null)
    {
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_content = $content;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_rel = $rel;
        $this->_htm_selected = $selected;
        $this->_htm_autofocus = $autofocus;
        $this->_htm_disabled = $disabled;
        $this->_htm_hidden = $hidden;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
        //todo implement wp_select
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_OPTION);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        $this->_html .= __($this->_el_attr_autofocus());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--D--
        $this->_html .= __($this->_el_attr_disabled());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--F--
        $this->_html .= __($this->_el_attr_form());
        //--H--
        $this->_html .= __($this->_el_attr_hidden());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--R--
        $this->_html .= __($this->_el_attr_rel());
        $this->_html .= __($this->_el_attr_required());
        //--S--
        $this->_html .= __($this->_el_attr_selected());
        $this->_html .= __($this->_el_attr_size());
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());
        //--V--
        $this->_html .= __($this->_el_attr_value());
        //--W--
        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_htm_content);
        $this->_html .= __(TagConsts::ELEM_OPTION_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }


}