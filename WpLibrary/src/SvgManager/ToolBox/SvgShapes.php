<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-10-2020
 * Time: 16:31
 */

namespace src\SvgManager\ToolBox;


use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\SvgManagerConsts;

class SvgShapes extends addElementsContainer
{

    private  $__element = ['circle', 'ellipse', 'line', 'path', 'poligon', 'polyline', 'rect'];


    public function __construct($element){
        parent::__construct();
        $this->__element = $element;
        $shape_args = func_get_args();
        switch( $this->__element ) {
            case __('circle'):
                self::__construct_circle(...$shape_args);
                break;
            case __('ellipse'):
                self::__construct_ellipse(...$shape_args);
                break;
            case __('line'):
                self::__construct_line(...$shape_args);
                break;
            case __('path'):
                self::__construct_path(...$shape_args);
                break;
            case __('poligon'):
                self::__construct_poligon(...$shape_args);
                break;
            case __('polyline'):
                self::__construct_polyline(...$shape_args);
                break;
            case __('rect'):
                self::__construct_rect(...$shape_args);
        }

    }
    protected function __construct_circle($elem = 'circle', $cx = null, $cy = null, $r = null){
        $this->__element = $elem;
        $this->_cx = $cx;
        $this->_cy = $cy;
        $this->_r = $r;
    }

    protected function __construct_ellipse($elem = 'ellipse', $cx = null, $cy = null, $rx = null, $ry = null) {
        $this->__element = $elem;
        $this->_cx = $cx;
        $this->_cy = $cy;
        $this->_rx = $rx;
        $this->_ry = $ry;
    }

    protected function __construct_line($elem = 'line', $x1 = null, $y1 = null, $x2 = null, $y2 = null) {
        $this->__element = $elem;
        $this->_x1 = $x1;
        $this->_y1 = $y1;
        $this->_x2 = $x2;
        $this->_y2 = $y2;
    }

    protected function __construct_path($elem = 'path', $d = null){
        $this->__element = $elem;
        $this->_d = $d;
    }

    protected function __construct_poligon($elem = 'poligon', $points = []){
        $this->__element = $elem;
        $this->_points = $points;
    }

    protected function __construct_polyline($elem = 'polyline', $points = []){
        $this->__element = $elem;
        $this->_points = $points;
    }

    protected function __construct_rect($elem = 'rect', $x = null, $y = null, $rx = null, $ry = null, $width = null, $height = null){
        $this->__element = $elem;
        $this->_x = $x;
        $this->_y = $y;
        $this->_rx = $rx;
        $this->_ry = $ry;
        $this->_width = $width;
        $this->_height = $height;
    }

    /**
     * @param $a
     * @param null $b
     */
    public function addPoint($a, $b = null) {
        if (!is_array($a)) {
            $a = array($a, $b);
        }
        $this->_points[] = $a;
    }

    /**
     * @param $index
     * @param $point
     * @return mixed
     */
    public function setPoint($index, $point) {
        $this->_points[$index] = $point;
        return $this;
    }

    protected function _to_xml_string(){
        switch ($this->__element) {
            case __('circle'):
                $this->_svg_print =  SvgManagerConsts::ELEMENT_CIRCLE;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_cx();
                $this->_svg_print .= $this->_attribute_cy();
                $this->_svg_print .= $this->_attribute_radius();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= $this->_attribute_tab_index();
                if(!empty($this->_children) || isset($this->_children_array)){
                    $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print.=  SvgManagerConsts::ELEMENT_CIRCLE_CLOSE;
                }else{
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                }
            break;
            case __('ellipse'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_ELLIPSE;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_cx();
                $this->_svg_print .= $this->_attribute_cy();
                $this->_svg_print .= $this->_attribute_rx();
                $this->_svg_print .= $this->_attribute_ry();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= $this->_attribute_tab_index();
                if(!empty($this->_children) || isset($this->_children_array)){
                    $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print.=  SvgManagerConsts::ELEMENT_ELLIPSE_CLOSE;
                }else{
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                }
            break;
            case __('line'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_LINE;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_x1();
                $this->_svg_print .= $this->_attribute_y1();
                $this->_svg_print .= $this->_attribute_x2();
                $this->_svg_print .= $this->_attribute_y2();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= $this->_attribute_tab_index();
                if(!empty($this->_children) || isset($this->_children_array)){
                    $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print.=  SvgManagerConsts::ELEMENT_LINE_CLOSE;
                }else{
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                }
            break;
            case __('path'):
                $this->_svg_print .= SvgManagerConsts::ELEMENT_PATH;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_draw();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= $this->_attribute_tab_index();
                if(!empty($this->_children) || !empty($this->_children_array)){
                    $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print.=  SvgManagerConsts::ELEMENT_PATH_CLOSE;
                }else{
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                }
            break;
            case __('poligon'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_POLYGON;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_points();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= $this->_attribute_tab_index();
                if(!empty($this->_children) || isset($this->_children_array)){
                    $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print.=  SvgManagerConsts::ELEMENT_POLYGON_CLOSE;
                }else{
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                }
                break;
            case __('polyline'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_POLYLINE;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_points();
                $this->_svg_print .= $this->_attribute_transform();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= $this->_attribute_tab_index();
                if(!empty($this->_children) || isset($this->_children_array)){
                    $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print.=  SvgManagerConsts::ELEMENT_POLYLINE_CLOSE;
                }else{
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                }
            break;
            case __('rect'):
                $this->_svg_print = SvgManagerConsts::ELEMENT_RECT;
                $this->_svg_print .= $this->_attribute_id();
                $this->_svg_print .= $this->_attribute_class();
                $this->_svg_print .= $this->_attribute_styles();
                $this->_svg_print .= $this->_attribute_x();
                $this->_svg_print .= $this->_attribute_y();
                $this->_svg_print .= $this->_attribute_rx();
                $this->_svg_print .= $this->_attribute_ry();
                $this->_svg_print .= $this->_attribute_width();
                $this->_svg_print .= $this->_attribute_height();
                //fill
                $this->_svg_print .= $this->_attribute_block_fill();
                //stroke
                $this->_svg_print .= $this->_attribute_block_stroke();
                $this->_svg_print .= $this->_attribute_transform();
                $this->_svg_print .= $this->_attribute_attributes();
                $this->_svg_print .= $this->_attribute_tab_index();
                if(!empty($this->_children) || isset($this->_children_array)){
                    $this->_svg_print.= SvgManagerConsts::ELEMENT_CLOSURE;
                    for ($i=0, $n=$this->countChildren(); $i<$n; $i++) {
                        $child = $this->getChild($i);
                        $this->_svg_print .= $child->toXMLString();
                    }
                    foreach($this->_children_array as $child_item){
                        $this->_svg_print .= $child_item;
                    }
                    $this->_svg_print.=  SvgManagerConsts::ELEMENT_RECT_CLOSE;
                }else{
                    $this->_svg_print .= SvgManagerConsts::ELEMENT_SLASHED_CLOSURE;
                }
            break;
            default:
                $this->_svg_print = __("Choose one of the available drawing options: circle, ellipse, line, path, poligon, polyline, rect");
        }
        return (string)$this->_svg_print;
    }

    public function toXMLString() {
        return $this->_to_xml_string();
    }
}