<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 14:27
 */

namespace src\SvgManager\ToolBox;
use src\SvgManager\Factory\SvgManagerConsts;
use src\SvgManager\Containers\addElementsContainer;

class SvgTexts extends addElementsContainer
{
    private
        $__element,
        $__elements = [];

    public function __construct($elements){
        parent::__construct();
        $this->__elements = $elements;
        $text_args = func_get_args();
        switch( $this->__elements ) {
            case __('text'):
                self::__construct_text(...$text_args);
                break;
            case __('text_span'):
                self::__construct_text_span(...$text_args);
                break;
            case __('text_path'):
                self::__construct_text_path(...$text_args);
                break;
            case __('text_open'):
                self::__construct_text_open(...$text_args);
                break;
            case __('text_close'):
                self::__construct_text_close($text_args[0]);
                break;
            case __('text_span_open'):
                self::__construct_text_span_open(...$text_args);
                break;
            case __('text_span_close'):
                self::__construct_text_span_close($text_args[0]);
                break;
            case __('text_path_open'):
                self::__construct_text_path_open(...$text_args);
                break;
            case __('text_path_close'):
                self:: __construct_text_path_close($text_args[0]);
                break;
        }
    }

    protected function __construct_text($element = 'text',$x = null, $y = null, $dx = null, $dy = null, $width = null, $height = null){
        $this->__element = $element;
        $this->__elements = $this->__element;
        $this->_x = $x;
        $this->_y = $y;
        $this->_dx = $dx;
        $this->_dy = $dy;
        $this->_width = $width;
        $this->_height = $height;
    }

    protected function __construct_text_span($element = 'text_span',$x = null, $y = null, $dx = null, $dy = null, $width = null, $height = null){
        $this->__element = $element;
        $this->__elements = $this->__element;
        $this->_x = $x;
        $this->_y = $y;
        $this->_dx = $dx;
        $this->_dy = $dy;
        $this->_width = $width;
        $this->_height = $height;
    }

    protected function __construct_text_path($element = 'text_path', $link,$width = null, $height = null){
        $this->__element = $element;
        $this->_link = $link;
        $this->_width = $width;
        $this->_height = $height;
    }

    protected function __construct_text_open($element = 'text_open',$x = null, $y = null, $dx = null, $dy = null, $width = null, $height = null){
        $this->__element = $element;
        $this->__elements = $this->__element;
        $this->_x = $x;
        $this->_y = $y;
        $this->_dx = $dx;
        $this->_dy = $dy;
        $this->_width = $width;
        $this->_height = $height;
   }

    protected function __construct_text_close($element = 'text_close'){
        $this->__element = $element;
        $this->__elements = $this->__element;
    }

    protected function __construct_text_span_open($element = 'text_span_open',$x = null, $y = null, $dx = null, $dy = null, $width = null, $height = null){
        $this->__element = $element;
        $this->__elements = $this->__element;
        $this->_x = $x;
        $this->_y = $y;
        $this->_dx = $dx;
        $this->_dy = $dy;
        $this->_width = $width;
        $this->_height = $height;
    }

    protected function __construct_text_span_close($element = 'text_span_close'){
        $this->__element = $element;
        $this->__elements = $this->__element;
    }


    protected function __construct_text_path_open($element = 'text_path_open', $link, $width = null, $height = null){
        $this->__element = $element;
        $this->__elements = $this->__element;
        $this->_link = $link;
        $this->_width = $width;
        $this->_height = $height;
    }

    protected function __construct_text_path_close($element = 'text_path_close'){
        $this->__element = $element;
        $this->__elements = $this->__element;
    }

    protected function _to_xml_string(){
        switch( $this->__elements ) {
            case __('text'):
                $this->_svg_print .= SvgManagerConsts::ELEMENT_TEXT;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_title();
                //position
                $this->_svg_print .= $this->_attribute_x();
                $this->_svg_print .= $this->_attribute_y();
                $this->_svg_print .= $this->_attribute_dx();
                $this->_svg_print .= $this->_attribute_dy();
                //dimensions
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_text_anchor();
                $this->_svg_print .= $this->_attribute_text_length();
                $this->_svg_print .= $this->_attribute_length_adjust();
                //fill
                $this->_svg_print .= $this->_attribute_fill();
                $this->_svg_print .= $this->_attribute_fill_rule();
                $this->_svg_print .= $this->_attribute_filter();
                //stroke
                $this->_svg_print .= $this->_attribute_stroke();
                $this->_svg_print .= $this->_attribute_stroke_width();
                $this->_svg_print .= $this->_attribute_stroke_linecap();
                $this->_svg_print .= $this->_attribute_stroke_opacity();
                //fonts
                $this->_svg_print .= $this->_attribute_font_family();
                $this->_svg_print .= $this->_attribute_font_size();
                //other
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
                if(!empty($this->_content))
                    $this->_svg_print .= $this->_attribute_content();
                if(!empty($this->_children) || !empty($this->_children_array)){
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                }
                $this->_svg_print .= SvgManagerConsts::ELEMENT_TEXT_CLOSE;

                break;
            case __('text_span'):
                $this->_svg_print .=  SvgManagerConsts::ELEMENT_TSPAN;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_title();
                //position
                $this->_svg_print .= $this->_attribute_x();
                $this->_svg_print .= $this->_attribute_y();
                $this->_svg_print .= $this->_attribute_dx();
                $this->_svg_print .= $this->_attribute_dy();
                //dimensions
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_text_anchor();
                $this->_svg_print .= $this->_attribute_text_length();
                $this->_svg_print .= $this->_attribute_length_adjust();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                //fonts
                $this->_svg_print .= $this->_attribute_font_family();
                $this->_svg_print .= $this->_attribute_font_size();
                //other
                $this->_svg_print .= $this->_attribute_filter();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                if(!empty($this->_children) || !empty($this->_children_array)){
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_TSPAN_CLOSE;
                }else
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;

                break;
            case __('text_path'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_TEXTPATH;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_title();
                //dimensions
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_text_length();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                //other
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
                $this->_svg_print .= $this->_attribute_content();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_TEXTPATH_CLOSE;
                break;
            case __('text_open'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_TEXT;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_title();
                //position
                $this->_svg_print .= $this->_attribute_x();
                $this->_svg_print .= $this->_attribute_y();
                $this->_svg_print .= $this->_attribute_dx();
                $this->_svg_print .= $this->_attribute_dy();
                //dimensions
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_text_anchor();
                $this->_svg_print .= $this->_attribute_text_length();
                $this->_svg_print .= $this->_attribute_length_adjust();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                //fonts
                $this->_svg_print .= $this->_attribute_font_family();
                $this->_svg_print .= $this->_attribute_font_size();
                //other
                $this->_svg_print .= $this->_attribute_filter();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                $this->_svg_print .= $this->_attribute_content();
                if(!empty($this->_children) || !empty($this->_children_array)){
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                }
                break;
            case __('text_close'):
                $this->_svg_print .= SvgManagerConsts::ELEMENT_TEXT_CLOSE;
                break;
            case __('text_span_open'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_TSPAN;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_title();
                //position
                $this->_svg_print .= $this->_attribute_x();
                $this->_svg_print .= $this->_attribute_y();
                $this->_svg_print .= $this->_attribute_dx();
                $this->_svg_print .= $this->_attribute_dy();
                //dimensions
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_text_anchor();
                $this->_svg_print .= $this->_attribute_text_length();
                $this->_svg_print .= $this->_attribute_length_adjust();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                //other
                $this->_svg_print .= $this->_attribute_font_family();
                $this->_svg_print .= $this->_attribute_font_size();
                //other
                $this->_svg_print .= $this->_attribute_filter();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                $this->_svg_print .= $this->_attribute_content();
                if(!empty($this->_children) || !empty($this->_children_array)){
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                }
                break;
            case __('text_span_close'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_TSPAN_CLOSE;
                break;
            case __('text_path_open'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_TEXTPATH;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_link();
                $this->_svg_print .= $this->_attribute_title();
                //dimensions
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                $this->_svg_print .= $this->_attribute_text_length();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                //other
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= SvgManagerConsts::ELEMENT_CLOSURE;
                $this->_svg_print .= $this->_attribute_content();
                break;
            case __('text_path_close'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_TEXTPATH_CLOSE;
                break;
            default:
                $this->_svg_print = __("Choose one of the available svg text options: text, text_span, text_path, for in case you want to wrap(text_open / text_close, text_span_open / text_span_close)");

        }
        return $this->_svg_print;
    }


    public function toXMLString() {
        return $this->_to_xml_string();
    }

}