<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 12:39
 */

namespace src\SvgManager\Structures;
use src\SvgManager\Factory\SvgManagerConsts;


class SvgGroupClose extends SvgGroup
{
    public function toXMLString() {
        return $this->to_xml_string();
    }

    protected function to_xml_string(){
        $this->_svg_print = SvgManagerConsts::ELEMENT_GROUP_CLOSE;
        return $this->_svg_print;
    }

}