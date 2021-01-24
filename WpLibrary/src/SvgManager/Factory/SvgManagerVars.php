<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 12-11-2017
 * Time: 14:11
 */

namespace src\SvgManager\Factory;


trait SvgManagerVars
{

   //--A--
    protected
        $_accelerate,
        $_accumulate,
        $_additive,
        $_alignment_baseline,
        $_alt = '',
        $_amplitude,
        $_attr = '',
        $_attribute_name,
        $_attribute_type,
        $_auto_reverse;

    //--B--
    protected
        $_baseline_shift,
        $_begin,
        $_by;

    //--C--
    protected
        $_calc_mode,
        $_clip,
        $_clip_path,
        $_clip_path_units,
        $_clip_rule,
        $_color,
        $_color_interpolation,
        $_color_interpolation_filters,
        $_color_profile,
        $_color_rendering,
        $_content,
        $_create_json_file,
        $_create_svg_file = false,
        $_cursor,
        $_cx,
        $_cy;

    //--D--
    protected
        $_d,
        $_decelerate,
        $_direction,
        $_display,
        $_dominant_baseline,
        $_dur,
        $_dx,
        $_dy;

    //--E--
    protected
        $_embedded_in_html = true,
        $_end,
        $_exponent,
        $_external_resources_required = false,
        $_external_stylesheet = false;

    //--F--
    protected
        $_fill,
        $_fill_opacity,
        $_fill_rule,
        $_filter,
        $_filter_res,
        $_filter_units,
        $_flood_color,
        $_flood_opacity,
        $_font_family,
        $_font_size,
        $_font_size_adjust,
        $_font_stretch,
        $_font_style,
        $_font_variant,
        $_font_weight,
        $_from,
        $_fx,
        $_fy;

    //--G--
    protected
        $_gradient_cx,
        $_gradient_cy,
        $_gradient_fx,
        $_gradient_fy,
        $_gradient_radius,
        $_gradient_transform,
        $_gradient_units;

    //--H--
    protected
        $_height,
        $_href;

    //--I--
    protected
        $_image_rendering,
        $_in,
        $_in2,
        $_intercept;

    //--K--
    protected
        $_k1,
        $_k2,
        $_k3,
        $_k4,
        $_kerning,
        $_key_splines,
        $_key_times;

    //--L--
    protected
        $_length_adjust,
        $_letter_spacing,
        $_lighting_color,
        $_link;

    //--M--
    protected
        $_min,
        $_marker_end,
        $_marker_mid,
        $_marker_start,
        $_mask,
        $_mask_content_units,
        $_mask_units,
        $_max,
        $_mode = 'normal';

    //--O--
    protected
        $_offset,
        $_on_abort,
        $_on_activate,
        $_on_begin,
        $_on_click,
        $_on_end,
        $_on_error,
        $_on_focus_in,
        $_on_focus_out,
        $_on_load,
        $_on_mouse_down,
        $_on_mouse_move,
        $_on_mouse_out,
        $_on_mouse_over,
        $_on_mouse_up,
        $_on_repeat,
        $_on_resize,
        $_on_scroll,
        $_on_unload,
        $_opacity,
        $_operator, //<feComposite> and <feMorphology>
        $_overflow;

    //--P--
    protected
        $_pointer_events,
        $_points,
        $_preserve_aspect_ratio,
        $_primitive_units;

    //--R--
    protected
        $_r,
        $_repeat_count,
        $_repeat_dur,
        $_required_extensions,
        $_required_features,
        $_restart,
        $_result,
        $_rx,
        $_ry;

    //--S--
    protected
        $_shape_rendering,
        $_slope,
        $_spread_method,
        $_std_deviation, // <feGaussianBlur>
        $_stop_color,
        $_stop_opacity,
        $_stroke,
        $_stroke_dash_array,
        $_stroke_dash_offset,
        $_stroke_linecap,
        $_stroke_linejoin,
        $_stroke_miter_limit,
        $_stroke_opacity,
        $_stroke_width,
        $_styles,
        $_stylesheet_create,
        $_stylesheet_name = 'svg-stylesheet',
        $_stylesheet_path = 'themes/svg_assets/css_files/',
        $_svg_attributes = [],
        $_svg_class,
        $_svg_content,
        $_svg_file_name = 'svg-file',
        $_svg_file_path = 'themes/svg_assets/svg_files/',
        $_svg_id,
        $_svg_print,
        $_svg_styles = [],
        $_svg_title,
        $_svg_type = 'matrix',
        $_svg_value,
        $_system_language;

    //--T--
    protected
        $_tab_index,
        $_table_values,
        $_target,
        $_text_anchor,
        $_text_decoration,
        $_text_length,
        $_text_rendering,
        $_to,
        $_transform;

    //--U--
    protected
        $_unicode_bidi,
        $_use_symbols = false;

    //--V--
    protected
        $_vector_effect,
        $_viewbox,
        $_visibility;

    //--W--
    protected
        $_width,
        $_word_spacing,
        $_writing_mode;

    //--X--
    protected
        $_x,
        $_x1,
        $_x2,
        $_xlink_actuate,
        $_xlink_arcrole,
        $_xlink_role,
        $_xlink_show,
        $_xlink_type,
        $_xml_base,
        $_xml_lang,
        $_xml_space;

    //--Y--
    protected
        $_y,
        $_y1,
        $_y2;
}