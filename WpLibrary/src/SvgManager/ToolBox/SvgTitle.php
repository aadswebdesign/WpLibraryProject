<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-10-2020
 * Time: 12:10
 */

namespace src\SvgManager\ToolBox;

use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgTitle extends addElementsContainer
{
    public function __construct($title){
        parent::__construct();
        //$this->_svg_title = $title;
    }

    protected function _to_xml_string(){
        $this->_svg_print = SvgManagerConsts::ELEMENT_TITLE;
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
        $this->_svg_print .= $this->_attribute_title();
        $this->_svg_print .= SvgManagerConsts::ELEMENT_TITLE_CLOSE;
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }

}