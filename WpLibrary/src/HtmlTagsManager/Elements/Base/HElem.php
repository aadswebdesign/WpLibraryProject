<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 20-12-2020
 * Time: 16:38
 */

namespace src\HtmlTagsManager\Elements\Base;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\AddElements;
use src\HtmlTagsManager\Factory\Base\BaseAttributes;
class HElem extends AddElements
{
    use BaseAttributes;

    /**
     * HElem constructor.
     * @param int $h_number
     * @param null $content
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $attributes
     */
    //1:h_number,2:content,3:id,4:class,5:styles,6:attributes
    public function __construct($h_number, $content=null, $id=null, $class=null, $styles=null, $attributes=null)
    {
        parent::__construct();
        $this->_htm_content = $content;
        $this->_htm_h_number = $h_number;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_attributes = $attributes;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::H_ELEM . $this->_htm_h_number . ' ');
        //--A--
        $this->_html .= __($this->_el_attr_attributes());
        //--C--
        $this->_html .= __($this->_el_attr_class());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--S--
        $this->_html .= __($this->_el_attr_styles());
        $this->_html .= __(TagConsts::ELEM_CLOSURE);
        $this->_html .= __($this->_htm_content);
        for ($i=0, $n=$this->countElements(); $i<$n; $i++) {
            $child = $this->getElement($i);
            $this->_html .= $child->toElemString();
        }
        if(isset($this->_elements_array)){
            foreach($this->_elements_array as $element){
                $this->_html .= $element;
            }
        }
        $this->_html .= __(TagConsts::H_ELEM_CLOSE . $this->_h_number . TagConsts::ELEM_CLOSURE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}