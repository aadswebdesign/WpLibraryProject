<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 11:53
 */

namespace src\SvgManager\Structures;
use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;


class SvgDefs extends addElementsContainer
{
    public function __construct(){
        parent::__construct();
    }

    protected function _to_xml_string(){
        $this->_svg_print = SvgManagerConsts::ELEMENT_DEFS;
        $this->_svg_print .= $this->_attribute_id();
        $this->_svg_print .= $this->_attribute_class();
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print .= $this->_attribute_attributes();
        $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
        if(!empty($this->_children) || !empty($this->_children_array)){ //todo
            for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                $child = $this->getChild($i);
                $this->_svg_print .= $child->toXMLString();
            }
            foreach($this->_children_array as $child_item){
                $this->_svg_print .= $child_item;
            }
        }
        $this->_svg_print .= SvgManagerConsts::ELEMENT_DEFS_CLOSE;
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }
}