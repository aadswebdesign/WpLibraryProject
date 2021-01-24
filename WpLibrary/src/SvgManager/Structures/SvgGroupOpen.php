<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 12:41
 */

namespace src\SvgManager\Structures;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgGroupOpen extends SvgGroup
{

    protected function to_xml_string(){
        $this->_svg_print  = SvgManagerConsts::ELEMENT_GROUP;
        $this->_svg_print .= $this->_attribute_id();
        $this->_svg_print .= $this->_attribute_class();
        $this->_svg_print .= $this->_attribute_styles();
        $this->_svg_print .= $this->_attribute_width();
        $this->_svg_print .= $this->_attribute_height();
        $this->_svg_print .= $this->_attribute_transform();
        $this->_svg_print .= $this->_attribute_filter();
        $this->_svg_print .= $this->_attribute_clip_path();
        $this->_svg_print .= $this->_attribute_mask();
        $this->_svg_print .= $this->_attribute_attributes();
        $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
        $this->_svg_print .= $this->_attribute_content();
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