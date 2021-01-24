<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-10-2020
 * Time: 12:08
 */

namespace src\SvgManager\Fragments;

use src\SvgManager\Factory\SvgManagerConsts;
use src\SvgManager\Containers\addElementsContainer;


class SvgBlock extends addElementsContainer
{

    public function __construct($viewbox = null, $x = null, $y = null, $width = null, $height = null)
    {
        parent::__construct();
        $this->_viewbox = $viewbox;
        $this->_x = $x;
        $this->_y = $y;
        $this->_width = $width;
        $this->_height = $height;
    }

    public function toXMLString() {

        if($this->_embedded_in_html == true)
            $this->_svg_print = SvgManagerConsts::ELEMENT_SVG;
        else
            $this->_svg_print = SvgManagerConsts::ELEMENT_SVG . SvgManagerConsts::SVG_XMLNS . SvgManagerConsts::SVG_VERSION;
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
        if(!empty($this->_children)){ //todo
            for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                $child = $this->getChild($i);
                $this->_svg_print .= $child->toXMLString();
            }
        }
        if(isset($this->_children_array)){
            foreach($this->_children_array as $child_item){
                $this->_svg_print .= $child_item;
            }
        }
        $this->_svg_print .= SvgManagerConsts::ELEMENT_SVG_CLOSE;
        return $this->_svg_print;
    }
}