<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 27-12-2020
 * Time: 06:27
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;
class TextAreaElem extends ToElemString
{
    use FormAttributes;

    /**
     * TextAreaElem constructor.
     * @param null $name
     * @param null $value
     * @param null $content
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $placeholder
     * @param null $minlength
     * @param null $maxlength
     * @param null $rows
     * @param null $cols
     * @param string $wrap
     * @param bool $autocomplete
     * @param bool $spellcheck
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:name,2:value,3:content,4:id,5:class,6:styles,7:title,8:placeholder,9:minlength,10:maxlength,11:rows,12:cols,13:autocomplete,14:spellcheck,15:required,16:attributes,17:form
    public function __construct($name=null, $value=null, $content = null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $minlength=null, $maxlength=null, $rows = null, $cols = null, $wrap='soft', $autocomplete = false, $spellcheck = false, $required = false, $attributes=null, $form=null)
    {
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_content = $content;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_minlength = $minlength;
        $this->_htm_maxlength = $maxlength;
        $this->_htm_rows = $rows;
        $this->_htm_cols = $cols;
        $this->_htm_wrap = $wrap;
        $this->_htm_autocomplete = $autocomplete;
        $this->_htm_spellcheck = $spellcheck;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;

    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_TEXTAREA);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        $this->_html .= __($this->_el_attr_autocomplete());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        $this->_html .= __($this->_el_attr_cols());
        //--F--
        $this->_html .= __($this->_el_attr_form());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--M--
        $this->_html .= __($this->_el_attr_maxlength());
        $this->_html .= __($this->_el_attr_minlength());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--P--
        $this->_html .= __($this->_el_attr_placeholder());
        //--R--
        $this->_html .= __($this->_el_attr_required());
        $this->_html .= __($this->_el_attr_rows());
        //--S--
        $this->_html .= __($this->_el_attr_spellcheck());
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());
        //--W--
        $this->_html .= __($this->_el_attr_wrap());

        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_htm_content);
        $this->_html .= __(TagConsts::ELEM_TEXTAREA);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }

}