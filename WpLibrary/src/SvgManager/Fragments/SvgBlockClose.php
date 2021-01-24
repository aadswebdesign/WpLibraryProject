<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-10-2020
 * Time: 12:47
 */

namespace src\SvgManager\Fragments;


use src\SvgManager\Factory\SvgToXmlString;
use src\SvgManager\Factory\SvgManagerConsts;


class SvgBlockClose extends SvgToXmlString
{
    /**
     * @return string
     */
    public function toXMLString() {
        $this->_svg_print = SvgManagerConsts::ELEMENT_SVG_CLOSE;
        return $this->_svg_print;
    }
}