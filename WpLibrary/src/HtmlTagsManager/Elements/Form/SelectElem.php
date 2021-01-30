<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 19-12-2020
 * Time: 15:01
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\AddElements;
use src\HtmlTagsManager\Factory\Form\FormAttributes;

class SelectElem extends AddElements
{
    use FormAttributes;

    /**
     * SelectElem constructor.
     * @param null $name
     * @param null $value
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param bool $autocomplete
     * @param bool $autofocus
     * @param bool $multiple
     * @param bool $size
     * @param bool $disabled
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:id,2:value,3:class,4:styles,5:title,6:autocomplete,7:autofocus,8:multiple,9:size,10:disabled,11:required,12:attributes,13:form
    public function __construct($name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $autocomplete = false, $autofocus = false, $multiple = false, $size = null, $disabled = false, $required = false, $attributes=null, $form=null)
    {
        parent::__construct();
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_autocomplete = $autocomplete;
        $this->_htm_autofocus = $autofocus;
        $this->_htm_multiple = $multiple;
        $this->_htm_size = $size;
        $this->_htm_disabled = $disabled;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_SELECT);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        $this->_html .= __($this->_el_attr_autocomplete());
        $this->_html .= __($this->_el_attr_autofocus());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--D--
        $this->_html .= __($this->_el_attr_disabled());
        //--F--
        $this->_html .= __($this->_el_attr_form());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--M--
        $this->_html .= __($this->_el_attr_multiple());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--R--
        $this->_html .= __($this->_el_attr_readonly());
        $this->_html .= __($this->_el_attr_rel());
        $this->_html .= __($this->_el_attr_required());
        //--S--
        $this->_html .= __($this->_el_attr_size());
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());
        //--V--
        $this->_html .= __($this->_el_attr_value());
        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        for ($i=0, $n=$this->countElements(); $i<$n; $i++) {
            $child = $this->getElement($i);
            $this->_html .= $child->toElemString();
        }
        if(isset($this->_elements_array)){
            foreach($this->_elements_array as $element){
                $this->_html .= $element;
            }
        }
        $this->_html .= __(TagConsts::ELEM_SELECT_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }

}