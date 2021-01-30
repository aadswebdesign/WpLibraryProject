<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 12:09
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\AddElements;
use src\HtmlTagsManager\Factory\Form\FormAttributes;

class FormFragment extends AddElements
{
    use FormAttributes;
    public $i,$elem;

    /**
     * FormFragment constructor.
     * @param null $action
     * @param null $method
     * @param null $id
     * @param null $title
     * @param null $class
     * @param array $styles
     * @param null $rel
     * @param null $target
     * @param null $oninput
     * @param array $attributes
     */
    public function __construct($action, $method, $id, $title, $class, $styles, $rel, $target, $oninput, $attributes)
    {
        parent::__construct();
        $this->_htm_action = $action;
        $this->_htm_method = $method;
        $this->_htm_id = $id;
        $this->_htm_title = $title;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_rel = $rel;
        $this->_htm_target = $target;
        $this->_htm_oninput = $oninput;
        $this->_htm_attributes = $attributes;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_FORM);
        //A
        $this->_html .= __($this->_el_attr_action());
        $this->_html .= __($this->_el_attr_attributes());
        //C
        $this->_html .= __($this->_el_attr_class());
        //I
        $this->_html .= __($this->_el_attr_id());
        //M
        $this->_html .= __($this->_el_attr_method());
        //O
        $this->_html .= __($this->_el_attr_oninput());
        //R
        $this->_html .= __($this->_el_attr_rel());
        //S todo

        //T
        $this->_html .= __($this->_el_attr_target());
        $this->_html .= __($this->_el_attr_title());
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
        $this->_html .= __(TagConsts::ELEM_FORM_CLOSE);

        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }

}