<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 13:33
 */

namespace src\SvgManager\Structures;

use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgNestedOpen extends addElementsContainer
{

    public function __construct($viewbox = null, $x= null, $y= null, $width = null, $height = null){
        parent::__construct();
        $this->_viewbox = $viewbox;
        $this->_x = $x;
        $this->_y = $y;
        $this->_width = $width;
        $this->_height = $height;
    }

    protected function to_xml_string(){
        $this->_svg_print = SvgManagerConsts::ELEMENT_SVG;
        $this->_svg_print .= $this->_attribute_id();
        $this->_svg_print .= $this->_attribute_class();
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print .= $this->_attribute_viewbox();
        $this->_svg_print .= $this->_attribute_preserve_aspect_ratio();
        $this->_svg_print .= $this->_attribute_x();
        $this->_svg_print .= $this->_attribute_y();
        $this->_svg_print .= $this->_attribute_width();
        $this->_svg_print .= $this->_attribute_height();
        $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
        if(!empty($this->_children) || !empty($this->_children_array)){ //todo
            for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                $child = $this->getChild($i);
                $this->_svg_print .= $child->toXMLString();
            }
            foreach($this->_children_array as $child_item){
                $this->_svg_print .= $child_item;
            }
        }
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->to_xml_string();
    }

}