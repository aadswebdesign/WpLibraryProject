<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-10-2020
 * Time: 12:00
 */

namespace src\SvgManager\ToolBox;

use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgImage extends addElementsContainer
{
    public function __construct($x=null, $y=null, $width = null, $height = null, $alt=''){
        parent::__construct();
        $this->_x =$x;
        $this->_y = $y;
        $this->_width = $width;
        $this->_height = $height;
        $this->_alt = $alt;
    }

    protected function _to_xml_string(){
        $this->_svg_print = SvgManagerConsts::ELEMENT_IMAGE;
        $this->_svg_print .= $this->_attribute_link();
        $this->_svg_print .= $this->_attribute_id();
        $this->_svg_print .= $this->_attribute_class();
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print .= $this->_attribute_alt();
        $this->_svg_print .= $this->_attribute_x();
        $this->_svg_print .= $this->_attribute_y();
        $this->_svg_print .= $this->_attribute_width();
        $this->_svg_print .= $this->_attribute_height();
        $this->_svg_print .= $this->_attribute_preserve_aspect_ratio();
        $this->_svg_print .= $this->_attribute_filter();
        $this->_svg_print .= $this->_attribute_clip_path();
        $this->_svg_print .= $this->_attribute_mask();
        $this->_svg_print .= $this->_attribute_transform();
        $this->_svg_print .= $this->_attribute_attributes();
        $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }


}