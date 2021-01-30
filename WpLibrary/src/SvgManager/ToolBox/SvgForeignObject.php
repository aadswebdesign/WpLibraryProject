<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-10-2020
 * Time: 11:52
 */

namespace src\SvgManager\ToolBox;
use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgForeignObject extends addElementsContainer
{
    public function __construct($content, $x = null, $y = null, $width = null, $height = null){
        parent::__construct();
        $this->_content;
        $this->_x = $x;
        $this->_y = $y;
        $this->_width = $width;
        $this->_height = $height;
    }

    protected function _to_xml_string(){
        $this->_svg_print  = SvgManagerConsts::ELEMENT_FOREIGN_OBJECT;
        $this->_svg_print .= $this->_attribute_id();
        $this->_svg_print .= $this->_attribute_class();
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print .= $this->_attribute_x();
        $this->_svg_print .= $this->_attribute_y();
        $this->_svg_print .= $this->_attribute_width();
        $this->_svg_print .= $this->_attribute_height();
        $this->_svg_print .= $this->_attribute_transform();
        $this->_svg_print .= $this->_attribute_attributes();
        $this->_svg_print  .= SvgManagerConsts::ELEMENT_CLOSURE;
        $this->_svg_print .= $this->_attribute_content();
        if(!empty($this->_children) || !empty($this->_children_array)) { //todo
            for ($i = 0, $n = $this->countChildren(); $i < $n; $i++) {
                $child = $this->getChild($i);
                $this->_svg_print .= $child->toXMLString();
            }
            foreach ($this->_children_array as $child_item) {
                $this->_svg_print .= $child_item;
            }
        }
        $this->_svg_print  .= SvgManagerConsts::ELEMENT_FOREIGN_OBJECT_CLOSE;
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }
}