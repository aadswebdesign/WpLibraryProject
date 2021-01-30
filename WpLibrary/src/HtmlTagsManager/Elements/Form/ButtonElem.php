<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 13-12-2020
 * Time: 15:50
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;

class ButtonElem extends ToElemString
{
    use FormAttributes;

    /**
     * ButtonElem constructor.
     * @param string $type
     * @param null $name
     * @param null $value
     * @param null $content
     * @param null $id
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $form
     * @param bool $autofocus
     * @param bool $reset
     * @param null $form_action
     * @param null $form_enctype
     * @param null $form_method
     * @param null $form_target
     * @param null $form_no_validate
     * @param bool $disabled
     * @param null $attributes
     */
    //1:type,2:name,3:value,4:content,5:id,6:class,7:styles,8:title,9:autofocus,10:reset,11:disabled,12:attributes,13:form,12:form_action,13:form_enctype,14:form_method,15:form_target
    public function __construct($type = 'button',$name=null, $value=null, $content=null, $id=null, $class=null, $styles=null, $title = null, $autofocus = false, $reset = false, $disabled = false, $attributes=null, $form=null, $form_action = null, $form_enctype = null, $form_method = null, $form_target = null, $form_no_validate = null)
    {
        $this->_type = $type;
        $this->_name = $name;
        $this->_value = $value;
        $this->_content = $content;
        $this->_id = $id;
        $this->_class = $class;
        $this->_styles = $styles;
        $this->_title = $title;
        $this->_autofocus = $autofocus;
        $this->_reset = $reset;
        $this->_disabled = $disabled;
        $this->_attributes = $attributes;
        $this->_form = $form;
        $this->_form_action = $form_action;
        $this->_form_enctype = $form_enctype;
        $this->_form_method = $form_method;
        $this->_form_target = $form_target;
        $this->_form_no_validate = $form_no_validate;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_BUTTON);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        $this->_html .= __($this->_el_attr_autofocus());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--D--
        $this->_html .= __($this->_el_attr_disabled());
        //--F--
        $this->_html .= __($this->_el_attr_form());
        $this->_html .= __($this->_el_attr_form_action());
        $this->_html .= __($this->_el_attr_form_enctype());
        $this->_html .= __($this->_el_attr_form_method());
        $this->_html .= __($this->_el_attr_form_target());
        $this->_html .= __($this->_el_attr_form_no_validate());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--R--
        $this->_html .= __($this->_el_attr_reset());
        //--S--
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());
        $this->_html .= __($this->_el_attr_type());
        //--V--
        $this->_html .= __($this->_el_attr_value());

        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_content);
        $this->_html .= __(TagConsts::ELEM_BUTTON_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }

}