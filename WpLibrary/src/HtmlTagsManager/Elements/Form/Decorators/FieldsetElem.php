<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 18:54
 */

namespace src\HtmlTagsManager\Elements\Form\Decorators;

use src\HtmlTagsManager\Factory\AddElements;
use src\HtmlTagsManager\Factory\Form\FormAttributes;
use src\HtmlTagsManager\Factory\TagConsts;
class FieldsetElem extends AddElements
{
    use FormAttributes;
    /**
     * FieldsetElem constructor.
     * @param null $name
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $label
     * @param bool $disabled
     * @param null $attributes
     */
    //1:id,2:class,3:styles,4:title,5:attributes
    public function __construct($id=null, $class=null, $styles=null, $title = null, $label=null, $disabled = false, $attributes=null)
    {
        parent::__construct();
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_label = $label;
        $this->_htm_disabled = $disabled;
        $this->_htm_attributes = $attributes;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_FIELDSET);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--F--
        $this->_html .= __($this->_el_attr_form());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--S--
        $this->_html .= __($this->_el_attr_styles());
        //--T--
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
        $this->_html .= __(TagConsts::ELEM_FIELDSET_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }

}