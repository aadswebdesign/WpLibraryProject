<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 16:21
 */

namespace src\HtmlTagsManager\Elements\Coding;


use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\Base\BaseAttributes;
use src\HtmlTagsManager\Factory\ToElemString;

class FigcaptionElem extends ToElemString
{
    use BaseAttributes;

    /**
     * FigcaptionElem constructor.
     * @param null $content
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param null $attributes
     */
    //1:content,2:id,3:class,4:styles,5:attributes
    public function __construct($content=null, $id=null, $class=null, $styles=null, $attributes=null)
    {
        $this->_htm_content = $content;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_attributes = $attributes;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::FIGCAPTION_ELEM);
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
        $this->_html .= __(TagConsts::FIGCAPTION_ELEM_CLOSE);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }

}