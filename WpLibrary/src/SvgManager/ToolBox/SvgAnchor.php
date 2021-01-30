<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-10-2020
 * Time: 11:19
 */

namespace src\SvgManager\ToolBox;

use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgAnchor extends addElementsContainer
{
    public function __construct($link = '#', $target= '_blank'){
        parent::__construct();
        $this->_link = $link;
        $this->_target = $target;    }

    protected function _to_xml_string(){
        $this->_svg_print  = SvgManagerConsts::ELEMENT_A;
        $this->_svg_print .= $this->_attribute_id();
        $this->_svg_print .= $this->_attribute_class();
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print .= $this->_attribute_link();
        $this->_svg_print .= $this->_attribute_target();
        $this->_svg_print .= $this->_attribute_attributes();
        $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
        if(!empty($this->_children) || !empty($this->_children_array)) {
            for ($i = 0, $n = $this->countChildren(); $i < $n; $i++) {
                $child = $this->getChild($i);
                $this->_svg_print .= $child->toXMLString();
            }
            foreach ($this->_children_array as $child_item) {
                $this->_svg_print .= $child_item;
            }
        }
        $this->_svg_print .= SvgManagerConsts::ELEMENT_A_CLOSE;
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }




}