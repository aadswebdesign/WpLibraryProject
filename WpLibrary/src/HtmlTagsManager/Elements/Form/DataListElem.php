<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-12-2020
 * Time: 19:18
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\AddElements;
use src\HtmlTagsManager\Factory\Form\FormAttributes;
class DataListElem extends AddElements
{
    use FormAttributes;

    /**
     * DataListElem constructor.
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $attributes
     * @param null $form
     */
    //1:id,2:class,3:styles,4:attributes,5:form
    public function __construct($id=null, $class=null, $styles=null, $attributes=null, $form=null){
        parent::__construct();
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_form = $form;
        $this->_htm_styles = $styles;
        $this->_htm_attributes = $attributes;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_DATA_LIST);
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
        $this->_html .= __(TagConsts::ELEM_DATA_LIST_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }




}