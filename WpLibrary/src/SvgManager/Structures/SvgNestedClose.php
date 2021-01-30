<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 13:30
 */

namespace src\SvgManager\Structures;

use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgNestedClose extends addElementsContainer
{
    protected function to_xml_string(){
        $this->_svg_print = SvgManagerConsts::ELEMENT_SVG_CLOSE;
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->to_xml_string();
    }

}