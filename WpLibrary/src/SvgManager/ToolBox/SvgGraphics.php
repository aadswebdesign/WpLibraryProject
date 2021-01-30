<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-10-2020
 * Time: 08:36
 */

namespace src\SvgManager\ToolBox;
use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgGraphics extends addElementsContainer
{
    private  $__element = ['linearGradient','radialGradient','stop'];

    public function __construct($element){
        parent::__construct();
        $this->__element = $element;
        $graphic_args = func_get_args();
        switch( $this->__element ) {
            case __('linearGradient'):
                self::__construct_linear_gradient(...$graphic_args);
                break;
            case __('radialGradient'):
                self::__construct_radial_gradient(...$graphic_args);
                break;
            case __('stop'):
                self::__construct_stop(...$graphic_args);
                break;
        }
    }

    protected function __construct_linear_gradient($arg0 = 'linearGradient', $arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null){
        $this->__element = $arg0;
        $this->_x1 = $arg1;
        $this->_y1 = $arg2;
        $this->_x2 = $arg3;
        $this->_y2 = $arg4;
    }

    protected function __construct_radial_gradient($arg0 = 'radialGradient', $arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null){
        $this->__element = $arg0;
        $this->_x = $arg1;
        $this->_y = $arg2;
        $this->_fx = $arg3;
        $this->_fy = $arg4;
    }

    protected function __construct_stop($arg0 = 'stop', $arg1 = null, $arg2 = null, $arg3 = null){
        $this->__element = $arg0;
        $this->_offset = $arg1;
        $this->_stop_color = $arg2;
        $this->_stop_opacity = $arg3;
    }


    protected function _to_xml_string(){
        switch( $this->__element ) {
            case __('linearGradient'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_LINEARGRADIENT;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_x1();
                $this->_svg_print .= $this->_attribute_y1();
                $this->_svg_print .= $this->_attribute_x2();
                $this->_svg_print .= $this->_attribute_y2();
                $this->_svg_print .= $this->_attribute_radius();
                $this->_svg_print .= $this->_attribute_spread_method();
                $this->_svg_print .= $this->_attribute_gradient_transform();
                $this->_svg_print .= $this->_attribute_gradient_units();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
                if(!empty($this->_stops)){
                    for ($i=0, $n=$this->countStops(); $i<$n; $i++) {
                        $child = $this->getStop($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                }
                if(isset($this->_stops_array)){
                    foreach($this->_stops_array as $stop_item){
                        $this->_svg_print .= $stop_item;
                    }
                }
                $this->_svg_print .= SvgManagerConsts::ELEMENT_LINEARGRADIENT_CLOSE;
                break;
            case __('radialGradient'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_RADIALGRADIENT;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_cx();
                $this->_svg_print .= $this->_attribute_cy();
                $this->_svg_print .= $this->_attribute_fx();
                $this->_svg_print .= $this->_attribute_fy();
                $this->_svg_print .= $this->_attribute_radius();
                $this->_svg_print .= $this->_attribute_spread_method();
                $this->_svg_print .= $this->_attribute_gradient_transform();
                $this->_svg_print .= $this->_attribute_gradient_units();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
                if(!empty($this->_stops)){
                    for ($i=0, $n=$this->countStops(); $i<$n; $i++) {
                        $child = $this->getStop($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                }
                if(isset($this->_stops_array)){
                    foreach($this->_stops_array as $stop_item){
                        $this->_svg_print .= $stop_item;
                    }
                }
                $this->_svg_print .= SvgManagerConsts::ELEMENT_RADIALGRADIENT_CLOSE;
                break;
            case __('stop'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_STOP;
                $this->_svg_print .= $this->_attribute_offset();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_stop_opacity();
                $this->_svg_print .= $this->_attribute_stop_color();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                break;
            default:
                $this->_svg_print = __("Use this to create Svg Gradients (linearGradient,radialGradient,stop )");
        }
        return $this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }







}