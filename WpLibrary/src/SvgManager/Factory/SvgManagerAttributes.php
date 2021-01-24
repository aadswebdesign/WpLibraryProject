<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 16-11-2017
 * Time: 03:44
 */

namespace src\SvgManager\Factory;


trait SvgManagerAttributes
{
    use SvgManagerOptions;

    //-- A --
    protected function _attribute_alignment_baseline(){
        if(!empty($this->_alignment_baseline))
            $this->_svg_print .= " alignment-baseline='" . $this->_alignment_baseline . "'";
        return $this->_attr;
    }

    protected function _attribute_alt(){
        if(!empty($this->_alt))
            $this->_svg_print .= " alt='" . $this->_alt . "'";
        return $this->_attr;
    }

    protected function _attribute_attributes(){
        if (!empty($this->_svg_attributes)) {
            foreach ($this->_svg_attributes as $attribute => $value){
                $this->_svg_print .= $attribute . "='" . $value . "'";
            }
        }
        return $this->_attr;
    }

    //-- B --
    protected function _attribute_baseline_shift(){
        if(!empty($this->_baseline_shift))
            $this->_svg_print .= " baseline-shift='" . $this->_baseline_shift . "'";
        return $this->_attr;
    }

    //-- C --
    protected function _attribute_class (){
        if(!empty($this->_svg_class))
            $this->_svg_print .= " class='" .  $this->_svg_class . "'";
        return $this->_attr;
    }

    protected function _attribute_clip(){
        if(!empty($this->_clip))
            $this->_svg_print .= " clip='" . $this->_clip . "'";
        return $this->_attr;
    }
    protected function _attribute_clip_path(){
        if(!empty($this->_clip_path))
            $this->_svg_print .= " clipPath='" . $this->_clip_path . "'";
        return $this->_attr;
    }

    protected function _attribute_clip_path_units(){
        if(!empty($this->_clip_path_units))
            $this->_svg_print .= " clipPathUnits='" . $this->_clip_path_units . "'";
        return $this->_attr;
    }

    protected function _attribute_clip_rule(){
        if(!empty($this->_clip_rule))
            $this->_svg_print .= " clip-rule='" . $this->_clip_rule . "'";
        return $this->_attr;
    }

    protected function _attribute_color(){
        if(!empty($this->_color))
            $this->_svg_print .= " color='" . $this->_color . "'";
        return $this->_attr;
    }

    protected function _attribute_color_interpolation(){
        if(!empty($this->_color_interpolation))
            $this->_svg_print .= " color-interpolation='" . $this->_color_interpolation . "'";
        return $this->_attr;
    }

    protected function _attribute_color_interpolation_filters(){
        if(!empty($this->_color_interpolation_filters))
            $this->_svg_print .= " color-interpolation-filters='" . $this->_color_interpolation_filters . "'";
        return $this->_attr;
    }

    protected function _attribute_color_profile(){
        if(!empty($this->_color_profile))
            $this->_svg_print .= " color-profile='" . $this->_color_profile . "'";
        return $this->_attr;
    }

    protected function _attribute_color_rendering(){
        if(!empty($this->_color_rendering))
            $this->_svg_print .= " color-rendering='" . $this->_color_rendering . "'";
        return $this->_attr;
    }

    protected function _attribute_content(){
        if(!empty($this->_svg_content))
            $this->_svg_print .= $this->_svg_content;
        return  $this->_attr;
    }


    protected function _attribute_cursor(){
        if(!empty($this->_cursor))
            $this->_svg_print .= " cursor='" . $this->_cursor . "'";
        return $this->_attr;
    }

    protected function _attribute_cx(){
        if ($this->_cx != 0)
            $this->_svg_print .= " cx='" . $this->_cx . "'";
        return $this->_attr;
    }

    protected function _attribute_cy(){
        if ($this->_cy != 0)
            $this->_svg_print .= " cy='" . $this->_cy . "'";
        return $this->_attr;
    }

    //-- D --
    protected function _attribute_direction(){
        if(!empty($this->_direction))
            $this->_svg_print .= " direction='" . $this->_direction . "'";
        return $this->_attr;
    }

    protected function _attribute_display(){
        if(!empty($this->_display))
            $this->_svg_print .= " display='" . $this->_display . "'";
        return $this->_attr;
    }

    protected function _attribute_dominant_baseline(){
        if(!empty($this->_dominant_baseline))
            $this->_svg_print .= " dominant-baseline='" . $this->_dominant_baseline . "'";
        return $this->_attr;
    }

    protected function _attribute_draw(){
        if(!empty($this->_d))
            $this->_svg_print .= " d='" . $this->_d . "'";
        return $this->_attr;
    }

    protected function _attribute_dur(){
        if(!empty($this->_dur))
            $this->_svg_print .= " dur='" . $this->_dur . "'";
        return $this->_attr;

    }

    protected function _attribute_dx(){
        if(!empty($this->_dx))
            $this->_svg_print .= " dx='" . $this->_dx . "'";
        return $this->_attr;
    }

    protected function _attribute_dy(){
        if(!empty($this->_dy))
            $this->_svg_print .= " dy='" . $this->_dy . "'";
        return $this->_attr;
    }

    //-- E --
    protected function _attribute_external_resources_required (){
        if($this->_external_resources_required == true)
            $this->_svg_print .= " externalResourcesRequired='true'";
        return $this->_attr;
    }

    //-- F --
    protected function _attribute_fill(){
        if(!empty($this->_fill))
            $this->_svg_print .= " fill='" . $this->_fill . "'";
        return $this->_attr;
    }

    protected function _attribute_fill_opacity(){
        if(!empty($this->_fill_opacity))
            $this->_svg_print .= " fill-opacity='" . $this->_fill_opacity . "'";
        return $this->_attr;
    }

    protected function _attribute_fill_rule(){
        if(!empty($this->_fill_rule))
            $this->_svg_print .= " fill-rule='" . $this->_fill_rule . "'";
        return $this->_attr;
    }

    protected function _attribute_filter(){
        if(!empty($this->_filter))
            $this->_svg_print .= " filter='" . $this->_filter . "'";
        return $this->_attr;
    }

    protected function _attribute_filter_res(){
        if(!empty($this->_filter_res))
            $this->_svg_print .= " filterRes='" . $this->_filter_res . "'";
        return $this->_attr;
    }

    protected function _attribute_filter_units(){
        if(!empty($this->_filter_units))
            $this->_svg_print .= " filterUnits='" . $this->_filter_units . "'";
        return $this->_attr;
    }

    protected function _attribute_flood_color(){
        if(!empty($this->_flood_color))
            $this->_svg_print .= " flood-color='" . $this->_flood_color . "'";
        return $this->_attr;
    }

    protected function _attribute_flood_opacity(){
        if(!empty($this->_flood_opacity))
            $this->_svg_print .= " flood-opacity='" . $this->_flood_opacity . "'";
        return $this->_attr;
    }

    protected function _attribute_font_family(){
        if(!empty($this->_font_family))
            $this->_svg_print .= " font-family='" . $this->_font_family . "'";
        return $this->_attr;
    }

    protected function _attribute_font_size(){
        if(!empty($this->_font_size))
            $this->_svg_print .= " font-size='" . $this->_font_size . "'";
        return $this->_attr;
    }

    protected function _attribute_font_size_adjust(){
        if(!empty($this->_font_size_adjust))
            $this->_svg_print .= " font-size-adjust='" . $this->_font_size_adjust . "'";
        return $this->_attr;
    }

    protected function _attribute_font_stretch(){
        if(!empty($this->_font_stretch))
            $this->_svg_print .= " font-stretch='" . $this->_font_stretch . "'";
        return $this->_attr;
    }

    protected function _attribute_font_style(){
        if(!empty($this->_font_style))
            $this->_svg_print .= " font-style='" . $this->_font_style . "'";
        return $this->_attr;
    }

    protected function _attribute_font_variant(){
        if(!empty($this->_font_variant))
            $this->_svg_print .= " font-variant='" . $this->_font_variant . "'";
        return $this->_attr;
    }

    protected function _attribute_font_weight(){
        if(!empty($this->_font_weight))
            $this->_svg_print .= " font-weight='" . $this->_font_weight . "'";
        return $this->_attr;
    }

    protected function _attribute_fx(){
        if(!empty($this->_fx))
            $this->_svg_print .= " fx='" . $this->_fx . "'";
        return $this->_attr;
    }

    protected function _attribute_fy(){
        if(!empty($this->_fy))
            $this->_svg_print .= " fy='" . $this->_fy . "'";
        return $this->_attr;
    }

    //-- G --
    protected function _attribute_gradient_transform(){
        if(!empty($this->_gradient_transform))
            $this->_svg_print .= " gradientTransform='" . $this->_gradient_transform . "'";
        return $this->_attr;
    }

    protected function _attribute_gradient_units(){
        if(!empty($this->_gradient_units))
            $this->_svg_print .= " gradientUnits='" . $this->_gradient_units . "'";
        return $this->_attr;
    }

    //-- H --
    protected function _attribute_height (){
        if(!empty($this->_height))
            $this->_svg_print .= " height='" . $this->_height . "'";
        return $this->_attr;
    }

    protected function _attribute_href(){
        if(!empty($this->_href))
            $this->_svg_print .= " href='" . $this->_href . "'";
        return $this->_attr;
    }

    //-- I --
    protected function _attribute_id (){
        if(!empty($this->_svg_id))
            $this->_svg_print .= " id='" . $this->_svg_id . "'";
        return $this->_attr;
    }

    protected function _attribute_image_rendering(){
        if(!empty($this->_image_rendering))
            $this->_svg_print .= " image-rendering='" . $this->_image_rendering . "'";
        return $this->_attr;
    }

    //-- K --
    protected function _attribute_kerning(){
        if(!empty($this->_kerning))
            $this->_svg_print .= " kerning='" . $this->_kerning . "'";
        return $this->_attr;
    }

    //-- L --
    protected function _attribute_length_adjust(){
        if(!empty($this->_length_adjust))
            $this->_svg_print .= " lengthAdjust='" . $this->_length_adjust . "'";
        return $this->_attr;
    }

    protected function _attribute_letter_spacing(){
        if(!empty($this->_letter_spacing))
            $this->_svg_print .= " letter-spacing='" . $this->_letter_spacing . "'";
        return $this->_attr;
    }

    protected function _attribute_lighting_color(){
        if(!empty($this->_lighting_color))
            $this->_svg_print .= " lighting-color='" . $this->_lighting_color . "'";
        return $this->_attr;
    }

    protected function _attribute_link(){
        if(!empty($this->_link)){
            $this->_svg_print .= " href='" . $this->_link . "'";
        }
        return $this->_attr;
    }

    //-- M --
    protected function _attribute_marker_end(){
        if(!empty($this->_marker_end))
            $this->_svg_print .= " marker-end='" . $this->_marker_end . "'";
        return $this->_attr;
    }

    protected function _attribute_marker_mid(){
        if(!empty($this->_marker_mid))
            $this->_svg_print .= " marker-mid='" . $this->_marker_mid . "'";
        return $this->_attr;
    }

    protected function _attribute_marker_start(){
        if(!empty($this->_marker_start))
            $this->_svg_print .= " marker-start='" . $this->_marker_start . "'";
        return $this->_attr;
    }

    protected function _attribute_mask(){
        if(!empty($this->_mask))
            $this->_svg_print .= " mask='" . $this->_mask . "'";
        return $this->_attr;
    }

    protected function _attribute_mask_units(){
        if (!empty($this->_mask_units))
            $this->_svg_print .= " maskUnits='" . $this->_mask_units . "'";
        return $this->_attr;
    }

    protected function _attribute_mask_content_units(){
        if (!empty($this->_mask_content_units))
            $this->_svg_print .= " maskContentUnits='" . $this->_mask_content_units . "'";
        return $this->_attr;
    }

    protected function _attribute_mode(){
        if(!empty($this->_mode))
            $this->_svg_print .= " mode='" . $this->_mode . "'";
        return $this->_attr;

    }

    //-- O --
    protected function _attribute_offset(){
        if(!empty($this->_offset))
            $this->_svg_print .= " offset='" . $this->_offset . "'";
        return $this->_attr;
    }

    protected function _attribute_on_activate(){
        if(!empty($this->_on_activate))
            $this->_svg_print .= " onactivate='" . $this->_on_activate . "'";
        return $this->_attr;
    }

    protected function _attribute_on_focus_in(){
        if(!empty($this->_on_focus_in))
            $this->_svg_print .= " onfocusin='" . $this->_on_focus_in . "'";
        return $this->_attr;
    }

    protected function _attribute_on_focus_out(){
        if(!empty($this->_on_focus_out))
            $this->_svg_print .= " onfocusout='" . $this->_on_focus_out . "'";
        return $this->_attr;
    }

    protected function _attribute_on_load(){
        if(!empty($this->_on_load))
            $this->_svg_print .= " onload='" . $this->_on_load . '"';
        return $this->_attr;
    }

    protected function _attribute_on_mouse_down(){
        if(!empty($this->_on_mouse_down))
            $this->_svg_print .= " onmousedown='" . $this->_on_mouse_down . "'";
        return $this->_attr;
    }

    protected function _attribute_on_mouse_move (){
        if(!empty($this->_on_mouse_move))
            $this->_svg_print .= " onmousemove='" . $this->_on_mouse_move . "'";
        return $this->_attr;
    }

    protected function _attribute_on_mouse_out(){
        if(!empty($this->_on_mouse_out))
            $this->_svg_print .= " onmouseout='" . $this->_on_mouse_out . "'";
        return $this->_attr;
    }

    protected function _attribute_on_mouse_over(){
        if(!empty($this->_on_mouse_over))
            $this->_svg_print .= " onmouseover='" . $this->_on_mouse_over . "'";
        return $this->_attr;
    }

    protected function _attribute_on_mouse_up(){
        if(!empty($this->_on_mouse_up))
            $this->_svg_print .= " onmouseup='" . $this->_on_mouse_up . "'";
        return $this->_attr;
    }

    protected function _attribute_opacity(){
        if(!empty($this->_opacity))
            $this->_svg_print .= " opacity='" . $this->_opacity . "'";
        return $this->_attr;
    }

    protected function _attribute_operator(){
        if(!empty($this->_operator))
            $this->_svg_print .= " operator='" . $this->_operator . "'";
        return $this->_attr;

    }

    protected function _attribute_overflow(){
        if(!empty($this->_overflow))
            $this->_svg_print .= " overflow='" . $this->_overflow . "'";
        return $this->_attr;
    }

    //-- P --
    protected function _attribute_pointer_events(){
        if(!empty($this->_pointer_events))
            $this->_svg_print .= " pointer-events='" . $this->_pointer_events . "'";
        return $this->_attr;
    }
    protected function _attribute_points(){
        $this->_svg_print .= " points='";
        for ($i=0, $n=count($this->_points); $i<$n; $i++) {
            $point = $this->_points[$i];
            if ($i > 0)
                $this->_svg_print .= ' ';
            $this->_svg_print .= $point[0] . ',' . $point[1];
        }
        $this->_svg_print .= "'";
        return $this->_attr;
    }

    protected function _attribute_preserve_aspect_ratio(){
        if(!empty($this->_preserve_aspect_ratio))
            $this->_svg_print .= " preserveAspectRatio='" . $this->_preserve_aspect_ratio . "'";
        return $this->_attr;
    }

    protected function _attribute_primitive_units(){
        if(!empty($this->_primitive_units))
            $this->_svg_print .= " primitiveUnits='" . $this->_primitive_units . "'";
        return $this->_attr;
    }

    //-- R --
    protected function _attribute_radius(){
        if(!empty($this->_r))
            $this->_svg_print .= " r='" . $this->_r . "'";
        return $this->_attr;
    }

    protected function _attribute_required_extensions(){
        if(!empty($this->_required_extensions))
            $this->_svg_print .= " requiredExtensions='" . $this->_required_extensions . "'";
        return $this->_attr;
    }

    protected function _attribute_required_features(){
        if(!empty($this->_required_features))
            $this->_svg_print .= " requiredFeatures='" . $this->_required_features . "'";
        return $this->_attr;
    }
    protected function _attribute_rx (){
        if(!empty($this->_rx))
            $this->_svg_print .= " rx='" . $this->_rx . "'";
        return $this->_attr;
    }

    protected function _attribute_ry (){
        if(!empty($this->_ry))
            $this->_svg_print .= " ry='" . $this->_ry . "'";
        return $this->_attr;
    }

    //-- S --
    protected function _attribute_shape_rendering(){
        if(!empty($this->_shape_rendering))
            $this->_svg_print .= " shape-rendering='" . $this->_shape_rendering . "'";
        return $this->_attr;
    }

    protected function _attribute_spread_method(){
        if(!empty($this->_spread_method))
            $this->_svg_print .= " spreadMethod='" . $this->_spread_method . "'";
        return $this->_attr;
    }

    protected function _attribute_std_deviation(){
        if(!empty($this->std_deviation))
            $this->_svg_print .= " std-deviation='" . $this->_std_deviation . "'";
        return $this->_attr;
    }

    protected function _attribute_stop_color(){
        if(!empty($this->_stop_color))
            $this->_svg_print .= " stop-color='" . $this->_stop_color . "'";
        return $this->_attr;
    }

    protected function _attribute_stop_opacity(){
        if(!empty($this->_stop_opacity))
            $this->_svg_print .= " stop-opacity='" . $this->_stop_opacity . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke(){
        if(!empty($this->_stroke))
            $this->_svg_print .= " stroke='" . $this->_stroke . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke_dash_array(){
        if(!empty($this->_stroke_dash_array))
            $this->_svg_print .= " stroke-dasharray='" . $this->_stroke_dash_array . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke_dash_offset(){
        if(!empty($this->_stroke_dash_offset))
            $this->_svg_print .= " stroke-dashoffset='" . $this->_stroke_dash_offset . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke_linecap(){
        if(!empty($this->_stroke_linecap))
            $this->_svg_print .= " stroke-linecap='" . $this->_stroke_linecap . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke_linejoin(){
        if(!empty($this->_stroke_linejoin))
            $this->_svg_print .= " stroke-linejoin='" . $this->_stroke_linejoin . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke_miter_limit(){
        if(!empty($this->_stroke_miter_limit))
            $this->_svg_print .= " stroke-miterlimit='" . $this->_stroke_miter_limit . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke_opacity(){
        if(!empty($this->_stroke_opacity))
            $this->_svg_print .= " stroke-opacity='" . $this->_stroke_opacity . "'";
        return $this->_attr;
    }

    protected function _attribute_stroke_width(){
        if(!empty($this->_stroke_width))
            $this->_svg_print .= " stroke-width='" . $this->_stroke_width . "'";
        return $this->_attr;
    }

    protected function _attribute_styles(){
        if (!empty($this->_svg_styles)) {
            $this->_svg_print .= " style='";
            $this->_svg_print .='; ';
            foreach ($this->_svg_styles as $style => $value) {
                $this->_svg_print .= $style . ': ' . $value . '; ';
            }
            $this->_svg_print .= "' ";
        }
        return $this->_attr;
    }

    protected function _attribute_system_language(){
        if(!empty($this->_system_language))
            $this->_svg_print .= " systemLanguage='" . $this->_system_language . "'";
        return $this->_attr;
    }

    //-- T --
    protected function _attribute_tab_index (){
        if(!empty($this->_tab_index))
            $this->_svg_print .= " tabindex='" . $this->_tab_index . "'";
        return $this->_attr;
    }

    protected function _attribute_target(){
        if(!empty($this->_target))
            $this->_svg_print .= " target='" . $this->_target . "'";
        return $this->_attr;
    }

    protected function _attribute_text_anchor(){
        if(!empty($this->_text_anchor))
            $this->_svg_print .= " text-anchor='" . $this->_text_anchor . "'";
        return $this->_attr;
    }

    protected function _attribute_text_decoration(){
        if(!empty($this->_text_decoration))
            $this->_svg_print .= " text-decoration='" . $this->_text_decoration . "'";
        return $this->_attr;
    }

    protected function _attribute_text_length(){
        if(!empty($this->_text_length))
            $this->_svg_print .= " textLength='" . $this->_text_length . "'";
        return $this->_attr;
    }

    protected function _attribute_text_rendering(){
        if(!empty($this->_text_rendering))
            $this->_svg_print .= " text-rendering='" . $this->_text_rendering . "'";
        return $this->_attr;
    }

    protected function _attribute_title(){
        if(!empty($this->_svg_title)){
            $this->_svg_print .= " title='" . $this->_svg_title . "'";
        }
        return $this->_attr;
    }

    protected function _attribute_transform(){
        if(!empty($this->_transform))
            $this->_svg_print .= " transform='" . $this->_transform . "'";
        return $this->_attr;
    }

    protected function _attribute_type(){
        if(!empty($this->_svg_ttype)){
            $this->_svg_print .= " type='" . $this->_svg_type . "'";
        }
        return $this->_attr;
    }


    //-- U --
    protected function _attribute_unicode_bidi(){
        if(!empty($this->_unicode_bidi))
            $this->_svg_print .= " unicode-bidi='" . $this->_unicode_bidi . "'";
        return $this->_attr;
    }

    //-- V --
    protected function _attribute_value(){
        if(!empty($this->_svg_value))
            $this->_svg_print .= " value='" . $this->_svg_value . "'";
        return $this->_attr;
    }
    /*
     * none | non-scaling-stroke | non-scaling-size | non-rotation | fixed-position
     */
    protected function _attribute_vector_effect(){
        if(!empty($this->_vector_effect))
            $this->_svg_print .= " vector-effect='" . $this->_vector_effect . "'";
        return $this->_attr;
    }

    protected function _attribute_viewbox(){
        if(!empty($this->_viewbox))
            $this->_svg_print .= " viewBox='" . $this->_viewbox . "'";
        return $this->_attr;
    }

    protected function _attribute_visibility(){
        if(!empty($this->_visibility))
            $this->_svg_print .= " visibility='" . $this->_visibility . "'";
        return $this->_attr;
    }

    //-- W --
    protected function _attribute_width(){
        if(!empty($this->_width))
            $this->_svg_print .= " width='" . $this->_width . "'";
        return $this->_attr;
    }

    protected function _attribute_word_spacing(){
        if(!empty($this->_word_spacing))
            $this->_svg_print .= " word-spacing='" . $this->_word_spacing . "'";
        return $this->_attr;
    }

    protected function _attribute_writing_mode(){
        if(!empty($this->_writing_mode))
            $this->_svg_print .= " writing-mode='" . $this->_writing_mode . "'";
        return $this->_attr;
    }

    //-- X --
    protected function _attribute_x(){
        if(!empty($this->_x))
            $this->_svg_print .= " x='" . $this->_x . "'";
        return $this->_attr;
    }

    protected function _attribute_x1(){
        if(!empty($this->_x1))
            $this->_svg_print .= " x1='" . $this->_x1 . "'";
        return $this->_attr;
    }

    protected function _attribute_x2(){
        if(!empty($this->_x2))
            $this->_svg_print .= " x2='" . $this->_x2 . "'";
        return $this->_attr;
    }

    protected function _attribute_xml_base(){
        if(!empty($this->_xml_base))
            $this->_svg_print .= " xml:base='" . $this->_xml_base . "'";
        return $this->_attr;
    }

    protected function _attribute_xml_lang(){
        if(!empty($this->_xml_lang))
            $this->_svg_print .= " xml:lang='" . $this->_xml_lang . "'";
        return $this->_attr;
    }

    protected function _attribute_xml_space(){
        if(!empty($this->_xml_space))
            $this->_svg_print .= " xml:space='" . $this->_xml_space . "'";
        return $this->_attr;
    }

    //-- Y --
    protected function _attribute_y(){
        if(!empty($this->_y))
            $this->_svg_print .= " y='" . $this->_y . "'";
        return $this->_attr;
    }

    protected function _attribute_y1(){
        if(!empty($this->_y1))
            $this->_svg_print .= " y1='" . $this->_y1 . "'";
        return $this->_attr;
    }

    protected function _attribute_y2(){
        if(!empty($this->_y2))
            $this->_svg_print .= " y2='" . $this->_y2 . "'";
        return $this->_attr;
    }


    protected function _attribute_block_fill(){
        $this->_svg_print .= $this->_attribute_fill();
        $this->_svg_print .= $this->_attribute_fill_rule();
        $this->_svg_print .= $this->_attribute_fill_opacity();
        return $this->_attr;
    }

    protected function _attribute_block_filters(){
        $this->_svg_print .= $this->_attribute_filter();
        $this->_svg_print .= $this->_attribute_filter_res();
        $this->_svg_print .= $this->_attribute_filter_units();
        return $this->_attr;
    }

    protected function _attribute_block_fonts(){
        $this->_svg_print .= $this->_attribute_font_family();
        $this->_svg_print .= $this->_attribute_font_size();
        $this->_svg_print .= $this->_attribute_font_size_adjust();
        $this->_svg_print .= $this->_attribute_font_stretch();
        $this->_svg_print .= $this->_attribute_font_style();
        $this->_svg_print .= $this->_attribute_font_variant();
        $this->_svg_print .= $this->_attribute_font_weight();
        return $this->_attr;
    }

    protected function _attribute_block_stroke(){
        $this->_svg_print .= $this->_attribute_stroke();
        $this->_svg_print .= $this->_attribute_stroke_width();
        $this->_svg_print .= $this->_attribute_stroke_linecap();
        $this->_svg_print .= $this->_attribute_stroke_linejoin();
        $this->_svg_print .= $this->_attribute_stroke_miter_limit();
        $this->_svg_print .= $this->_attribute_stroke_opacity();
        return $this->_attr;
    }
    //protected function _attribute (){}
}