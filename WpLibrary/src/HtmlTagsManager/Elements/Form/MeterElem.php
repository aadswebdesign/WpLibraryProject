<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 13-12-2020
 * Time: 16:16
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;

class MeterElem extends ToElemString
{
    use FormAttributes;

    /**
     * MeterElem constructor.
     * @param null $name
     * @param null $value
     * @param null $content
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $optimum
     * @param null $high
     * @param null $low
     * @param null $min
     * @param null $max
     * @param null $attributes
     * @param null $form
     */
    //1:name,2:value,3:content,4:id,5:class,6:styles,7:title,8:optimum,9:high,10:low,11:min,12:max,13:pattern,14:attributes,15:form
    public function __construct($name=null, $value=null, $content = null, $id=null, $class=null, $styles=null, $title = null, $optimum = null, $high = null, $low = null, $min = null, $max = null, $attributes=null, $form=null)
    {
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_content = $content;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_optimum = $optimum;
        $this->_htm_high = $high;
        $this->_htm_low = $low;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_METER);
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--F--
        $this->_html .= __($this->_el_attr_form());
        //--H--
        //--F--
        $this->_html .= __($this->_el_attr_high());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--L--
        $this->_html .= __($this->_el_attr_low());
        //--M--
        $this->_html .= __($this->_el_attr_max());
        $this->_html .= __($this->_el_attr_min());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--O--
        $this->_html .= __($this->_el_attr_optimum());
        //--S--
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());
        //--V--
        $this->_html .= __($this->_el_attr_value());

        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_htm_content);
        $this->_html .= __(TagConsts::ELEM_METER_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}