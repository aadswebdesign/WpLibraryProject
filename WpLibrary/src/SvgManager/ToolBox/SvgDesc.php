<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-10-2020
 * Time: 11:37
 */

namespace src\SvgManager\ToolBox;

use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgDesc extends addElementsContainer
{
    public function __construct($content){
        parent::__construct();
        $this->_content = $content;

    }

    protected function _to_xml_string(){
        $this->_svg_print = SvgManagerConsts::ELEMENT_DESC;
        $this->_svg_print .= $this->_attribute_id();
        $this->_svg_print .= $this->_attribute_class();
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print .= $this->_attribute_attributes();
        $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
        $this->_svg_print .= $this->_attribute_content();
        $this->_svg_print .= SvgManagerConsts::ELEMENT_DESC_CLOSE;
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }
}