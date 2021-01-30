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
class LiElem extends AddElements
{
    use BaseAttributes;

    /**
     * LiElem constructor.
     * @param null $content
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $attributes
     */
    //1:content,2:id,3:class,4:styles,5:attributes
    public function __construct($content=null, $id=null, $class=null, $styles=null, $attributes=null)
    {
        parent::__construct();
        $this->_htm_content = $content;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_attributes = $attributes;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::LI_ELEM);
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
        $this->_html .= __(TagConsts::LI_ELEM_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}