<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 07:04
 */

namespace src\HtmlTagsManager\Factory\Form;


trait FormVars
{
    //--A--
    protected
        $_htm_accept,
        $_htm_access_key,
        $_htm_action,
        $_htm_autocomplete,
        $_htm_autofocus;

    //--C--
    protected
        $_htm_capture,
        $_htm_checked = false,
        $_htm_cols;

    //--D--
    protected
        $_htm_disabled = false;

    //--E--
    protected
        $_htm_enctype;

    //--F--
    protected
        $_htm_files,
        $_htm_for,
        $_htm_form,
        $_htm_form_action,
        $_htm_form_enctype,
        $_htm_form_method,
        $_htm_form_target,
        $_htm_form_no_validate;

    //--H--
    protected
        $_htm_hidden = false,
        $_htm_high,
        $_html;

    //--L--
    protected
        $_htm_label,
        $_htm_list,
        $_htm_low;

    //--M--
    protected
        $_htm_max,
        $_htm_maxlength,
        $_htm_method,
        $_htm_min,
        $_htm_minlength,
        $_htm_multiple = false;

    //--N--
    protected
        $_htm_name,
        $_htm_no_validate = false;

    //--O--
    protected
        $_htm_oninput,
        $_htm_optimum;

    //--P--
    protected
        $_htm_pattern,
        $_htm_placeholder;

    //--R--
    protected
        $_htm_readonly = false,
        $_htm_rel,
        $_htm_required = false,
        $_htm_reset,
        $_htm_rows;

    //--S--
    protected
        $_htm_selected,
        $_htm_size,
        $_htm_spellcheck,
        $_htm_step;

    //--T--
    protected
        $_htm_type;

    //--V--
    protected
        $_htm_value;

    //-W--
    protected
        $_wp_checked = false,
        $_wp_selected = false,
        $_wp_setup = false,
        $_htm_wrap;
}