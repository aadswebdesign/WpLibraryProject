<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-10-2020
 * Time: 11:17
 */

namespace src\SvgManager\ToolBox;
use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SVGEffects extends addElementsContainer
{
    private  $__element = ['clipPath','filter','mask'];

    public function __construct($element){
        parent::__construct();
        $this->__element = $element;
        $filter_args = func_get_args();
        switch( $this->__element ) {
            case __('clipPath'):
                self::__construct_clip_path(...$filter_args);
                break;
            case __('filter'):
                self::__construct_filter(...$filter_args);
                break;
            case __('mask'):
                self::__construct_mask(...$filter_args);
                break;
        }
    }

    protected function __construct_clip_path($elem = 'clipPath',$fill=null,$stroke = null, $clip_path=null, $clip_rule = null){
        $this->__element = $elem;
        $this->_fill = $fill;
        $this->_stroke = $stroke;
        $this->_clip_path = $clip_path;
        $this->_clip_rule = $clip_rule;
    }

    protected function __construct_filter($elem = 'filter', $x1 = null, $y1 = null, $x2 = null, $y2 = null){
        $this->__element = $elem;
        $this->_x1 = $x1;
        $this->_y1 = $y1;
        $this->_x2 = $x2;
        $this->_y2 = $y2;
    }

    protected function __construct_mask($elem = 'mask', $x1 = null, $y1 = null, $x2 = null, $y2 = null){
        $this->__element = $elem;
        $this->_x1 = $x1;
        $this->_y1 = $y1;
        $this->_x2 = $x2;
        $this->_y2 = $y2;
    }

    protected function _to_xml_string(){
        switch( $this->__element ) {
            case __('clipPath'):
                $this->_svg_print= SvgManagerConsts::ELEMENT_CLIPPATH;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_display();
                $this->_svg_print .= $this->_attribute_clip_path_units();
                $this->_svg_print .= $this->_attribute_clip_rule();
                $this->_svg_print .= $this->_attribute_color();
                $this->_svg_print .= $this->_attribute_block_fill();
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_vector_effect();
                $this->_svg_print .= $this->_attribute_visibility();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print.=  SvgManagerConsts::ELEMENT_CLOSURE;
                $this->_svg_print .= $this->_attribute_content();
                if(!empty($this->_children) || !empty($this->_children_array)) {
                    for ($i = 0, $n = $this->countChildren(); $i < $n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach ($this->_children_array as $child_item) {
                        $this->_svg_print .= $child_item;
                    }
                }
                $this->_svg_print.= SvgManagerConsts::ELEMENT_CLIPPATH_CLOSE;
                    break;
            case __('filter'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_FILTER;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_x();
                $this->_svg_print .= $this->_attribute_y();
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_block_filters();
                $this->_svg_print .= $this->_attribute_primitive_units();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
                $this->_svg_print .= $this->_attribute_content();
                if(!empty($this->_children) || !empty($this->_children_array)) {
                    for ($i = 0, $n = $this->countChildren(); $i < $n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach ($this->_children_array as $child_item) {
                        $this->_svg_print .= $child_item;
                    }
                }
                $this->_svg_print .= SvgManagerConsts::ELEMENT_FILTER_CLOSE;
                break;
            case __('mask'):
                $this->_svg_print= SvgManagerConsts::ELEMENT_MASK;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_x();
                $this->_svg_print .= $this->_attribute_y();
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_mask_units();
                $this->_svg_print .= $this->_attribute_mask_content_units();
                $this->_svg_print .= $this->_attribute_external_resources_required();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print.=  SvgManagerConsts::ELEMENT_CLOSURE;
                $this->_svg_print .= $this->_attribute_content();
                if(!empty($this->_children) || !empty($this->_children_array)) {
                    for ($i = 0, $n = $this->countChildren(); $i < $n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach ($this->_children_array as $child_item) {
                        $this->_svg_print .= $child_item;
                    }
                }
                $this->_svg_print.= SvgManagerConsts::ELEMENT_MASK_CLOSE;
                break;
        }
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }
}