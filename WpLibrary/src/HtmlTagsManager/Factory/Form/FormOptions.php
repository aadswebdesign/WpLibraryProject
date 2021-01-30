<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 10:18
 */

namespace src\HtmlTagsManager\Factory\Form;


use src\HtmlTagsManager\Factory\Base\BaseOptions;

trait FormOptions
{
    use FormVars;
    use BaseOptions;

    //---- A ----
    public function setHtmAccept($accept)
    {
        $this->_htm_accept = $accept;
        return $this;
    }

    public function setHtmAccessKey($access_key)
    {
        $this->_htm_access_key = $access_key;
        return $this;
    }

    public function setHtmAction($action)
    {
        $this->_htm_action = $action;
        return $this;
    }

    public function setHtmAutocomplete($autocomplete)
    {
        $this->_htm_autocomplete = $autocomplete;
        return $this;
    }

    public function setHtmAutofocus($autofocus)
    {
        $this->_htm_autofocus = $autofocus;
        return $this;
    }

    //--- C ---
    public function setHtmCapture($capture)
    {
        $this->_htm_capture = $capture;
        return $this;
    }

    public function setHtmChecked($checked)
    {
        $this->_htm_checked = $checked;
        return $this;
    }

    public function setHtmCols($cols)
    {
        $this->_htm_cols = $cols;
        return $this;
    }

    //---- D ----
    public function setHtmDisabled($disabled)
    {
        $this->_htm_disabled = $disabled;
        return $this;
    }

    //---- E ----
    public function setHtmEnctype($enctype)
    {
        $this->_htm_enctype = $enctype;
    }

    //---- F ----
    public function setHtmFiles($files)
    {
        $this->_htm_files = $files;
        return $this;
    }

    public function setHtmForm($form)
    {
        $this->_htm_form = $form;
        return $this;
    }

    //---- H ----
    public function setHtmHidden($htm_hidden)
    {
        $this->_htm_hidden = $htm_hidden;
        return $this;
    }

    public function setHtmHigh($high)
    {
        $this->_htm_high = $high;
        return $this;
    }

    //---- L ----
    public function setHtmLabel($label)
    {
        $this->_htm_label = $label;
        return $this;
    }

    public function setHtmList($list)
    {
        $this->_htm_list = $list;
        return $this;
    }

    public function setHtmLow($low)
    {
        $this->_htm_low = $low;
        return $this;
    }

    //---- M ----
    public function setHtmMax($max)
    {
        $this->_htm_max = $max;
        return $this;
    }

    public function setHtmMaxlength($maxlength)
    {
        $this->_htm_maxlength = $maxlength;
        return $this;
    }

    public function setHtmMethod($method)
    {
        $this->_htm_method = $method;
        return $this;
    }

    public function setHtmMin($min)
    {
        $this->_htm_min = $min;
        return $this;
    }

    public function setHtmMinlength($minlength)
    {
        $this->_htm_minlength = $minlength;
        return $this;
    }

    public function setHtmMultiple($multiple)
    {
        $this->_htm_multiple = $multiple;
        return $this;
    }

    public function setHtmName($name)
    {
        $this->_htm_name = $name;
        return $this;
    }

    public function setHtmNoValidate($no_validate)
    {
        $this->_htm_no_validate = $no_validate;
        return $this;
    }

    public function setHtmOninput($oninput)
    {
        $this->_htm_oninput = $oninput;
        return $this;
    }

    public function setHtmOptimum($optimum)
    {
        $this->_htm_optimum = $optimum;
        return $this;
    }

    public function setHtmPattern($pattern)
    {
        $this->_htm_pattern = $pattern;
        return $this;
    }

    public function setHtmPlaceholder($placeholder)
    {
        $this->_htm_placeholder = $placeholder;
        return $this;
    }

    public function setHtmReadonly($readonly)
    {
        $this->_htm_readonly = $readonly;
        return $this;
    }

    public function setHtmRel($rel)
    {
        $this->_htm_rel = $rel;
        return $this;
    }

    public function setHtmRequired($required)
    {
        $this->_htm_required = $required;
        return $this;
    }

    public function setHtmReset($reset)
    {
        $this->_htm_reset = $reset;
        return $this;
    }

    public function setHtmRows($rows)
    {
        $this->_htm_rows = $rows;
        return $this;
    }

    public function setHtmSelected($selected)
    {
        $this->_htm_selected = $selected;
        return $this;
    }

    public function setHtmSize($size)
    {
        $this->_htm_size = $size;
        return $this;
    }

    public function setHtmSpellcheck($spellcheck)
    {
        $this->_htm_spellcheck = $spellcheck;
        return $this;
    }

    public function setHtmStep($step)
    {
        $this->_htm_step = $step;
        return $this;
    }

    public function setHtmType($type)
    {
        $this->_htm_type = $type;
        return $this;
    }

    public function setHtmValue($value)
    {
        $this->_htm_value = $value;
        return $this;
    }

    public function setWpSelected($wp_selected)
    {
        $this->_wp_selected = $wp_selected;
        return $this;
    }

    public function setHtmWrap($wrap)
    {
        $this->_htm_wrap = $wrap;
        return $this;
    }
}