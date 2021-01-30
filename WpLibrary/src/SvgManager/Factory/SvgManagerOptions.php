<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-9-2016
 * Time: 06:57
 */

namespace src\SvgManager\Factory;

/**
 * Class SvgBase
 * @package inc\SvgManager\Factory
 */
trait SvgManagerOptions
{
    use SvgManagerVars;

    //--A--
    public function setAccelerate($accelerate)
    {
        $this->_accelerate = $accelerate;
        return $this;
    }

    public function setAccumulate($accumulate)
    {
        $this->_accumulate = $accumulate;
        return $this;
    }

    public function setAdditive($additive)
    {
        $this->_additive = $additive;
        return $this;
    }

    public function setAlignmentBaseline($alignment_baseline)
    {
        $this->_alignment_baseline = $alignment_baseline;
        return $this;
    }

    public function setAmplitude($amplitude)
    {
        $this->_amplitude = $amplitude;
        return $this;
    }

    public function setAttributeName($attribute_name)
    {
        $this->_attribute_name = $attribute_name;
        return $this;
    }

    public function setAttributeType($attribute_type)
    {
        $this->_attribute_type = $attribute_type;
        return $this;
    }

    public function setAutoReverse($auto_reverse)
    {
        $this->_auto_reverse = $auto_reverse;
        return $this;
    }

    //--B--
    public function setBaselineShift($baseline_shift)
    {
        $this->_baseline_shift = $baseline_shift;
        return $this;
    }

    public function setBegin($begin)
    {
        $this->_begin = $begin;
        return $this;
    }

    public function setBy($by)
    {
        $this->_by = $by;
        return $this;
    }

    //--C--
    public function setCalcMode($calc_mode)
    {
        $this->_calc_mode = $calc_mode;
        return $this;
    }

    public function setClip($clip)
    {
        $this->_clip = $clip;
        return $this;
    }

    public function setClipPath($clip_path)
    {
        $this->_clip_path = $clip_path;
        return $this;
    }

    public function setClipPathUnits($clip_path_units)
    {
        $this->_clip_path_units = $clip_path_units;
        return $this;
    }

    public function setClipRule($clip_rule)
    {
        $this->_clip_rule = $clip_rule;
        return $this;
    }

    public function setColor($color)
    {
        $this->_color = $color;
        return $this;
    }

    public function setColorInterpolation($color_interpolation)
    {
        $this->_color_interpolation = $color_interpolation;
        return $this;
    }

    public function setColorInterpolationFilters($color_interpolation_filters)
    {
        $this->_color_interpolation_filters = $color_interpolation_filters;
        return $this;
    }

    public function setColorProfile($color_profile)
    {
        $this->_color_profile = $color_profile;
        return $this;
    }

    public function setColorRendering($color_rendering)
    {
        $this->_color_rendering = $color_rendering;
        return $this;
    }

    public function setCreateJsonFile($create_json_file){
        $this->_create_json_file = $create_json_file;
        return $this;
    }

    public function setCreateSvgFile($create_svg_file)
    {
        $this->_create_svg_file = $create_svg_file;
        return $this;
    }

    public function setCursor($cursor)
    {
        $this->_cursor = $cursor;
        return $this;
    }

    public function setCx($cx)
    {
        $this->_cx = $cx;
        return $this;
    }

    public function setCy($cy)
    {
        $this->_cy = $cy;
        return $this;
    }

    //--D--
    public function setD($d)
    {
        $this->_d = $d;
        return $this;
    }

    public function setDirection($direction)
    {
        $this->_direction = $direction;
        return $this;
    }

    public function setDisplay($display)
    {
        $this->_display = $display;
        return $this;
    }

    public function setDominantBaseline($dominant_baseline)
    {
        $this->_dominant_baseline = $dominant_baseline;
        return $this;
    }

    public function setDur($dur)
    {
        $this->_dur = $dur;
        return $this;
    }

    public function setDx($dx)
    {
        $this->_dx = $dx;
        return $this;
    }

    public function setDy($dy)
    {
        $this->_dy = $dy;
        return $this;
    }

    //--E--
    public function setEmbeddedInHtml($embedded_in_html)
    {
        $this->_embedded_in_html = $embedded_in_html;
        return $this;
    }

    public function setEnd($end)
    {
        $this->_end = $end;
        return $this;
    }

    public function setExponent($exponent)
    {
        $this->_exponent = $exponent;
        return $this;
    }

    public function setExternalResourcesRequired($external_resources_required)
    {
        $this->_external_resources_required = $external_resources_required;
        return $this;
    }

    //--F--
    public function setFill($fill)
    {
        $this->_fill = $fill;
        return $this;
    }

    public function setFillOpacity($fill_opacity)
    {
        $this->_fill_opacity = $fill_opacity;
        return $this;
    }

    public function setFillRule($fill_rule)
    {
        $this->_fill_rule = $fill_rule;
        return $this;
    }

    public function setFilter($filter)
    {
        $this->_filter = $filter;
        return $this;
    }

    public function setFilterRes($filter_res)
    {
        $this->_filter_res = $filter_res;
        return $this;
    }

    public function setFilterUnits($filter_units)
    {
        $this->_filter_units = $filter_units;
        return $this;
    }

    public function setFloodColor($flood_color)
    {
        $this->_flood_color = $flood_color;
        return $this;
    }

    public function setFloodOpacity($flood_opacity)
    {
        $this->_flood_opacity = $flood_opacity;
        return $this;
    }

    public function setFontFamily($font_family)
    {
        $this->_font_family = $font_family;
        return $this;
    }

    public function setFontSize($font_size)
    {
        $this->_font_size = $font_size;
        return $this;
    }

    public function setFontSizeAdjust($font_size_adjust)
    {
        $this->_font_size_adjust = $font_size_adjust;
        return $this;
    }

    public function setFontStretch($font_stretch)
    {
        $this->_font_stretch = $font_stretch;
        return $this;
    }

    public function setFontStyle($font_style)
    {
        $this->_font_style = $font_style;
        return $this;
    }

    public function setFontVariant($font_variant)
    {
        $this->_font_variant = $font_variant;
        return $this;
    }

    public function setFontWeight($font_weight)
    {
        $this->_font_weight = $font_weight;
        return $this;
    }

    public function setFrom($from)
    {
        $this->_from = $from;
        return $this;
    }

    public function setFX($fx)
    {
        $this->_fx = $fx;
        return $this;
    }

    public function setFY($fy)
    {
        $this->_fy = $fy;
        return $this;
    }

    //--G--
    public function setGradientCx($gradient_cx)
    {
        $this->_gradient_cx = $gradient_cx;
        return $this;
    }

    public function setGradientCy($gradient_cy)
    {
        $this->_gradient_cy = $gradient_cy;
        return $this;
    }

    public function setGradientFx($gradient_fx)
    {
        $this->_gradient_fx = $gradient_fx;
        return $this;
    }

    public function setGradientFy($gradient_fy)
    {
        $this->_gradient_fy = $gradient_fy;
        return $this;
    }

    public function setGradientRadius($gradient_radius)
    {
        $this->_gradient_radius = $gradient_radius;
        return $this;
    }

    public function setGradientTransform($gradient_transform)
    {
        $this->_gradient_transform = $gradient_transform;
    }

    public function setGradientUnits($gradient_units)
    {
        $this->_gradient_units = $gradient_units;
        return $this;
    }

    //--H--
    public function setHeight($height)
    {
        $this->_height = $height;
        return $this;
    }

    //--I--
    public function setImageRendering($image_rendering)
    {
        $this->_image_rendering = $image_rendering;
        return $this;
    }

    public function setIn($in)
    {
        $this->_in = $in;
        return $this;
    }

    public function setIn2($in2)
    {
        $this->_in2 = $in2;
        return $this;
    }

    public function setIntercept($intercept)
    {
        $this->_intercept = $intercept;
        return $this;
    }

    //--K--
    public function setK1($k1)
    {
        $this->_k1 = $k1;
        return $this;
    }

    public function setK2($k2)
    {
        $this->_k2 = $k2;
        return $this;
    }

    public function setK3($k3)
    {
        $this->_k3 = $k3;
        return $this;
    }

    public function setK4($k4)
    {
        $this->_k4 = $k4;
        return $this;
    }

    public function setKerning($kerning)
    {
        $this->_kerning = $kerning;
        return $this;
    }

    public function setKeySplines($key_splines)
    {
        $this->_key_splines = $key_splines;
        return $this;
    }

    public function setKeyTimes($key_times)
    {
        $this->_key_times = $key_times;
        return $this;
    }

    //--L--
    public function setLengthAdjust($length_adjust)
    {
        $this->_length_adjust = $length_adjust;
        return $this;
    }

    public function setLetterSpacing($letter_spacing)
    {
        $this->_letter_spacing = $letter_spacing;
        return $this;
    }

    public function setLightingColor($lighting_color)
    {
        $this->_lighting_color = $lighting_color;
        return $this;
    }

    public function setLink($link)
    {
        $this->_link = $link;
    }

    //--M--
    public function setMin($min)
    {
        $this->_min = $min;
        return $this;
    }

    public function setMarkerEnd($marker_end)
    {
        $this->_marker_end = $marker_end;
        return $this;
    }

    public function setMarkerMid($marker_mid)
    {
        $this->_marker_mid = $marker_mid;
        return $this;
    }

    public function setMarkerStart($marker_start)
    {
        $this->_marker_start = $marker_start;
        return $this;
    }

    public function setMask($mask)
    {
        $this->_mask = $mask;
        return $this;
    }

    public function setMaskContentUnits($mask_content_units)
    {
        $this->_mask_content_units = $mask_content_units;
        return $this;
    }

    public function setMaskUnits($mask_units)
    {
        $this->_mask_units = $mask_units;
        return $this;
    }

    public function setMax($max)
    {
        $this->_max = $max;
        return $this;
    }

    public function setMode($mode)
    {
        $this->_mode = $mode;
        return $this;
    }

    //--O--
    public function setOffset($offset)
    {
        $this->_offset = $offset;
        return $this;
    }

    public function setOnAbort($on_abort)
    {
        $this->_on_abort = $on_abort;
        return $this;
    }

    public function setOnActivate($on_activate)
    {
        $this->_on_activate = $on_activate;
        return $this;
    }

    public function setOnBegin($on_begin)
    {
        $this->_on_begin = $on_begin;
        return $this;
    }

    public function setOnClick($on_click)
    {
        $this->_on_click = $on_click;
        return $this;
    }

    public function setOnEnd($on_end)
    {
        $this->_on_end = $on_end;
        return $this;
    }

    public function setOnError($on_error)
    {
        $this->_on_error = $on_error;
        return $this;
    }

    public function setOnFocusIn($on_focus_in)
    {
        $this->_on_focus_in = $on_focus_in;
        return $this;
    }

    public function setOnFocusOut($on_focus_out)
    {
        $this->_on_focus_out = $on_focus_out;
        return $this;
    }

    public function setOnLoad($on_load)
    {
        $this->_on_load = $on_load;
        return $this;
    }

    public function setOnMouseDown($on_mouse_down)
    {
        $this->_on_mouse_down = $on_mouse_down;
        return $this;
    }

    public function setOnMouseMove($on_mouse_move)
    {
        $this->_on_mouse_move = $on_mouse_move;
        return $this;
    }

    public function setOnMouseOut($on_mouse_out)
    {
        $this->_on_mouse_out = $on_mouse_out;
        return $this;
    }

    public function setOnMouseOver($on_mouse_over)
    {
        $this->_on_mouse_over = $on_mouse_over;
        return $this;
    }

    public function setOnMouseUp($on_mouse_up)
    {
        $this->_on_mouse_up = $on_mouse_up;
        return $this;
    }

    public function setOnRepeat($on_repeat)
    {
        $this->_on_repeat = $on_repeat;
        return $this;
    }

    public function setOnResize($on_resize)
    {
        $this->_on_resize = $on_resize;
        return $this;
    }

    public function setOnScroll($on_scroll)
    {
        $this->_on_scroll = $on_scroll;
        return $this;
    }

    public function setOnUnload($on_unload)
    {
        $this->_on_unload = $on_unload;
        return $this;
    }

    public function setOpacity($opacity)
    {
        $this->_opacity = $opacity;
        return $this;
    }

    public function setOperator($operator)
    {
        $this->_operator = $operator;
        return $this;
    }


    public function setOverflow($overflow)
    {
        $this->_overflow = $overflow;
        return $this;
    }

    //--P--
    public function setPointerEvents($pointer_events)
    {
        $this->_pointer_events = $pointer_events;
        return $this;
    }

    public function removePoint($index) {
        array_splice($this->_points, $index, 1);
    }

    public function getPoint($index) {
        return $this->_points[$index];
    }

    public function setPreserveAspectRatio($preserve_aspect_ratio)
    {
        $this->_preserve_aspect_ratio = $preserve_aspect_ratio;
        return $this;
    }

    public function setPrimitiveUnits($primitive_units)
    {
        $this->_primitive_units = $primitive_units;
        return $this;
    }

    //--R--
    public function setR($r)
    {
        $this->_r = $r;
        return $this;
    }

    public function setRepeatCount($repeat_count)
    {
        $this->_repeat_count = $repeat_count;
        return $this;
    }

    public function setRepeatDur($repeat_dur)
    {
        $this->_repeat_dur = $repeat_dur;
        return $this;
    }

    public function setRequiredExtensions($required_extensions)
    {
        $this->_required_extensions = $required_extensions;
        return $this;
    }

    public function setRequiredFeatures($required_features)
    {
        $this->_required_features = $required_features;
        return $this;
    }

    public function setRestart($restart)
    {
        $this->_restart = $restart;
        return $this;
    }

    public function setResult($result)
    {
        $this->_result = $result;
        return $this;
    }

    public function setRx($rx)
    {
        $this->_rx = $rx;
        return $this;
    }

    public function setRy($ry)
    {
        $this->_ry = $ry;
        return $this;
    }

    //--S--
    public function setShapeRendering($shape_rendering)
    {
        $this->_shape_rendering = $shape_rendering;
        return $this;
    }

    public function setSlope($slope)
    {
        $this->_slope = $slope;
        return $this;
    }

    public function setSpreadMethod($spread_method)
    {
        $this->_spread_method = $spread_method;
        return $this;
    }

    public function setStdDeviation($std_deviation)
    {
        $this->_std_deviation = $std_deviation;
        return $this;
    }

    public function setStopColor($stop_color)
    {
        $this->_stop_color = $stop_color;
        return $this;
    }

    public function setStopOpacity($stop_opacity)
    {
        $this->_stop_opacity = $stop_opacity;
        return $this;
    }

    public function setStroke($stroke)
    {
        $this->_stroke = $stroke;
        return $this;
    }

    public function setStrokeDashArray($stroke_dash_array)
    {
        $this->_stroke_dash_array = $stroke_dash_array;
        return $this;
    }

    public function setStrokeDashOffset($stroke_dash_offset)
    {
        $this->_stroke_dash_offset = $stroke_dash_offset;
        return $this;
    }

    public function setStrokeLinecap($stroke_linecap)
    {
        $this->_stroke_linecap = $stroke_linecap;
        return $this;
    }

    public function setStrokeLinejoin($stroke_linejoin)
    {
        $this->_stroke_linejoin = $stroke_linejoin;
        return $this;
    }

    public function setStrokeMiterLimit($stroke_miter_limit)
    {
        $this->_stroke_miter_limit = $stroke_miter_limit;
        return $this;
    }

    public function setStrokeOpacity($stroke_opacity)
    {
        $this->_stroke_opacity = $stroke_opacity;
        return $this;
    }

    public function setStrokeWidth($stroke_width)
    {
        $this->_stroke_width = $stroke_width;
        return $this;
    }

    public function setSvgAttributes($object, $svg_attributes)
    {
        $this->_svg_attributes[$object] = $svg_attributes;
        return $this;
    }

    public function setSvgClass($svg_class)
    {
        $this->_svg_class = $svg_class;
        return $this;
    }

    public function setSvgContent($svg_content)
    {
        $this->_svg_content = $svg_content;
        return $this;
    }

    public function setSvgId($svg_id)
    {
        $this->_svg_id = $svg_id;
        return $this;
    }

    public function getSvgPrint()
    {
        return $this->_svg_print;
    }

    public function getSvgStyle($name) {
        return isset($this->_svg_styles[$name]) ? $this->_svg_styles[$name] : null;
    }

    public function setSvgStyle($name, $value) {
        $this->_svg_styles[$name] = $value;
        return $this;
    }

    public function removeSvgStyle($name) {
        unset($this->_svg_styles[$name]);
    }

    public function setSvgTitle($svg_title)
    {
        $this->_svg_title = $svg_title;
        return $this;
    }

    public function setSvgType($svg_type)
    {
        $this->_svg_type = $svg_type;
        return $this;
    }

    public function setSvgValue($value)
    {
        $this->_svg_value = $value;
        return $this;
    }

    public function setSystemLanguage($system_language)
    {
        $this->_system_language = $system_language;
        return $this;
    }

    //--T--
    public function setTabIndex($tab_index)
    {
        $this->_tab_index = $tab_index;
        return $this;
    }

    public function setTableValues($table_values)
    {
        $this->_table_values = $table_values;
        return $this;
    }

    public function setTarget($target)
    {
        $this->_target = $target;
        return $this;
    }

    public function setTextAnchor($text_anchor)
    {
        $this->_text_anchor = $text_anchor;
        return $this;
    }

    public function setTextDecoration($text_decoration)
    {
        $this->_text_decoration = $text_decoration;
        return $this;
    }

    public function setTextLength($text_length)
    {
        $this->_text_length = $text_length;
        return $this;
    }

    public function setTextRendering($text_rendering)
    {
        $this->_text_rendering = $text_rendering;
        return $this;
    }

    public function setTo($to)
    {
        $this->_to = $to;
        return $this;
    }

    public function setTransform($transform)
    {
        $this->_transform = $transform;
        return $this;
    }

    //--U--
    public function setUnicodeBidi($unicode_bidi)
    {
        $this->_unicode_bidi = $unicode_bidi;
        return $this;
    }

    public function setUseSymbols($use_symbols)
    {
        $this->_use_symbols = $use_symbols;
        return $this;
    }

    //--V--
    public function setVectorEffect($vector_effect)
    {
        $this->_vector_effect = $vector_effect;
    }

    public function setViewbox($viewbox)
    {
        $this->_viewbox = $viewbox;
        return $this;
    }

    //-- W --
    public function setWidth($width)
    {
        $this->_width = $width;
        return $this;
    }

    public function setWordSpacing($word_spacing)
    {
        $this->_word_spacing = $word_spacing;
        return $this;
    }

    public function setWritingMode($writing_mode)
    {
        $this->_writing_mode = $writing_mode;
        return $this;
    }

    //-- X --
    public function setX($x)
    {
        $this->_x = $x;
        return $this;
    }

    public function setX1($x1)
    {
        $this->_x1 = $x1;
        return $this;
    }

    public function setX2($x2)
    {
        $this->_x2 = $x2;
        return $this;
    }

    public function setXlinkActuate($xlink_actuate)
    {
        $this->_xlink_actuate = $xlink_actuate;
        return $this;
    }

    public function setXlinkArcrole($xlink_arcrole)
    {
        $this->_xlink_arcrole = $xlink_arcrole;
        return $this;
    }

    public function setXlinkRole($xlink_role)
    {
        $this->_xlink_role = $xlink_role;
        return $this;
    }

    public function setXlinkShow($xlink_show)
    {
        $this->_xlink_show = $xlink_show;
        return $this;
    }

    public function setXlinkType($xlink_type)
    {
        $this->_xlink_type = $xlink_type;
        return $this;
    }

    public function setXmlBase($xml_base)
    {
        $this->_xml_base = $xml_base;
        return $this;
    }

    public function setXmlLang($xml_lang)
    {
        $this->_xml_lang = $xml_lang;
        return $this;
    }

    public function setXmlSpace($xml_space)
    {
        $this->_xml_space = $xml_space;
        return $this;
    }

    //--Y--
    public function setY($y)
    {
        $this->_y = $y;
        return $this;
    }

    public function setY1($y1)
    {
        $this->_y1 = $y1;
        return $this;
    }

    public function setY2($y2)
    {
        $this->_y2 = $y2;
        return $this;
    }
}