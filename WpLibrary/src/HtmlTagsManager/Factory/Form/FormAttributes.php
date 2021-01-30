<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 07:03
 */

namespace src\HtmlTagsManager\Factory\Form;

use src\HtmlTagsManager\Factory\Base\BaseAttributes;

trait FormAttributes
{
    use FormOptions;
    use BaseAttributes;

    //-- A --
    protected function _el_attr_accept(){
        if(!empty($this->_htm_accept))
            $this->_html .= " accept='" . $this->_htm_accept . "'";
        return $this->_attr;
    }
    protected function _el_attr_access_key(){
        if(!empty($this->_htm_access_key))
            $this->_html .= " accesskey='" . $this->_htm_access_key . "'";
        return $this->_attr;
    }

    protected function _el_attr_action(){
        if(!empty($this->_htm_action))
            $this->_html .= " action='" . $this->_htm_action . "'";
        return $this->_attr;
    }

    protected function _el_attr_autocomplete(){
        if($this->_htm_autocomplete == true)
            $this->_html .= " autocomplete='on'";
        return $this->_attr;
    }

    protected function _el_attr_autofocus(){
        if($this->_htm_autofocus == true)
            $this->_html .= " autofocus='true'";
        return $this->_attr;
    }
    //--C--
    protected function _el_attr_capture(){
        if(!empty($this->_htm_capture))
            $this->_html .= " capture='" . $this->_htm_capture . "'";
        return $this->_attr;
    }

    protected function _el_attr_checked(){
        if($this->_htm_checked == true)
            $this->_html .= " checked";
        return $this->_attr;
    }

    protected function _el_attr_cols(){
        if(!empty($this->_htm_cols))
            $this->_html .= " cols='" . $this->_htm_cols . "'";
        return $this->_attr;
    }

    //--D--
    protected function _el_attr_disabled(){
        if($this->_htm_disabled == true)
            $this->_html .= " disabled";
        return $this->_attr;
    }
    //--E--
    protected function _el_attr_enctype(){
        if(!empty($this->_htm_enctype))
            $this->_html .= " enctype='" . $this->_htm_enctype . "'";
        return $this->_attr;
    }
    //--F--
    protected function _el_attr_files(){
        if(!empty($this->_htm_files))
            $this->_html .= " files='" . $this->_htm_files . "'";
        return $this->_attr;
    }

    protected function _el_attr_for(){
        if(!empty($this->_htm_for))
            $this->_html .= " for='" . $this->_htm_for . "'";
        return $this->_attr;
    }

    protected function _el_attr_form(){
        if(!empty($this->_form))
            $this->_html .= " form='" . $this->_form . "'";
        return $this->_attr;
    }

    protected function _el_attr_form_action(){
        if(!empty($this->_htm_form_action))
            $this->_html .= " formaction='" . $this->_htm_form_action . "'";
        return $this->_attr;
    }

    protected function _el_attr_form_enctype(){
        if(!empty($this->_form_enctype))
            $this->_html .= " formenctype='" . $this->_form_enctype . "'";
        return $this->_attr;
    }

    protected function _el_attr_form_method(){
        if(!empty($this->_htm_form_method))
            $this->_html .= " formmethod='" . $this->_htm_form_method . "'";
        return $this->_attr;
    }

    protected function _el_attr_form_target(){
        if(!empty($this->_htm_form_target))
            $this->_html .= " formtarget='" . $this->_htm_form_target . "'";
        return $this->_attr;
    }

    protected function _el_attr_form_no_validate(){
        if(!empty($this->_htm_form_no_validate))
            $this->_html .= " formnovalidate='" . $this->_htm_form_no_validate . "'";
        return $this->_attr;
    }

    //--H-- $_htm_hidden
    protected function _el_attr_hidden(){
        if($this->_htm_hidden == true)
            $this->_html .= " hidden";
        return $this->_attr;
    }

    protected function _el_attr_high(){
        if(!empty($this->_htm_high))
            $this->_html .= " high='" . $this->_htm_high . "'";
        return $this->_attr;
    }

    //--L--
    protected function _el_attr_label(){
        if(!empty($this->_htm_label))
            $this->_html .= " label='" . $this->_htm_label . "'";
        return $this->_attr;
    }

    protected function _el_attr_list(){
        if(!empty($this->_htm_list))
            $this->_html .= " list='" . $this->_htm_list . "'";
        return $this->_attr;
    }

    protected function _el_attr_low(){
        if(!empty($this->_htm_low))
            $this->_html .= " low='" . $this->_htm_low . "'";
        return $this->_attr;
    }

    //--M--
    protected function _el_attr_max(){
        if(!empty($this->_htm_max))
            $this->_html .= " max='" . $this->_htm_max . "'";
        return $this->_attr;
    }

    protected function _el_attr_maxlength(){
        if(!empty($this->_htm_maxlength))
            $this->_html .= " maxlength='" . $this->_htm_maxlength . "'";
        return $this->_attr;
    }

    protected function _el_attr_method(){
        if(!empty($this->_htm_method))
            $this->_html .= " method='" . $this->_htm_method . "'";
        return $this->_attr;
    }

    protected function _el_attr_min(){
        if(!empty($this->_htm_min))
            $this->_html .= " min='" . $this->_htm_min . "'";
        return $this->_attr;
    }

    protected function _el_attr_minlength(){
        if(!empty($this->_htm_minlength))
            $this->_html .= " minlength='" . $this->_htm_minlength . "'";
        return $this->_attr;
    }

    protected function _el_attr_multiple(){
        if($this->_htm_multiple == true)
            $this->_html .= " multiple";
        return $this->_attr;
    }
    //N
    protected function _el_attr_name(){
        if(!empty($this->_htm_name))
            $this->_html .= " name='" . $this->_htm_name . "'";
        return $this->_attr;
    }

    protected function _el_attr_no_validate(){
        if($this->_htm_no_validate == true )
            $this->_html .= " novalidate";
        return $this->_attr;
    }
    //--O--
    protected function _el_attr_oninput(){
        if(!empty($this->_oninput))
            $this->_html .= " oninput='" . $this->_oninput . "'";
        return $this->_attr;
    }

    protected function _el_attr_optimum(){
        if(!empty($this->_htm_optimum))
            $this->_html .= " '" . $this->_htm_optimum . "'";
        return $this->_attr;
    }

    //--P--
    protected function _el_attr_pattern(){
        if(!empty($this->_htm_pattern))
            $this->_html .= " pattern='" . $this->_htm_pattern . "'";
        return $this->_attr;
    }

    protected function _el_attr_placeholder(){
        if(!empty($this->_htm_placeholder))
            $this->_html .= " placeholder='" . $this->_htm_placeholder . "'";
        return $this->_attr;
    }

    //R
    protected function _el_attr_readonly(){
        if($this->_htm_readonly == true)
            $this->_html .= " readonly";
        return $this->_attr;
    }
    protected function _el_attr_rel(){
        if(!empty($this->_htm_rel))
            $this->_html .= " rel='" . $this->_htm_rel . "'";
        return $this->_attr;
    }

    protected function _el_attr_required(){
        if($this->_htm_required == true)
            $this->_html .= " required";
        return $this->_attr;
    }

    protected function _el_attr_reset(){
        if($this->_htm_reset == true)
            $this->_html .= __("type='reset' ");
        return $this->_attr;
    }

    protected function _el_attr_rows(){
        if(!empty($this->_htm_rows))
            $this->_html .= " rows='" . $this->_htm_rows . "'";
        return $this->_attr;
    }
    //--S--
    protected function _el_attr_selected(){
        if($this->_htm_selected == true)
            $this->_html .= " selected";
        return $this->_attr;
    }

    protected function _el_attr_size(){
        if(!empty($this->_htm_size))
            $this->_html .= " size='" . $this->_htm_size . "'";
        return $this->_attr;
    }

    protected function _el_attr_spellcheck(){
        if($this->_htm_spellcheck == true)
            $this->_html .= " spellcheck='true'";
        return $this->_attr;
    }

    protected function _el_attr_step(){
        if(!empty($this->_htm_step))
            $this->_html .= " step='" . $this->_htm_step . "'";
        return $this->_attr;
    }

    //--T--
    protected function _el_attr_type(){
        if(!empty($this->_htm_type))
            $this->_html .= " type='" . $this->_htm_type . "'";
        return $this->_attr;
    }

    //--V--
    protected function _el_attr_value(){
        if(!empty($this->_htm_value))
            $this->_html .= " value='" . $this->_htm_value . "'";
        return $this->_attr;
    }
    //--W--
    //todo if needed?
    protected function _el_attr_wp_checked(){
        if($this->_wp_checked == true)
            $this->_html .= " checked";
        return $this->_attr;
    }

    //todo if needed?
    protected function _el_attr_wp_selected(){
        if($this->_wp_selected == true)
            $this->_html .= " selected";
        return $this->_attr;
    }

    //todo leave it commented for now!
    //protected function _el_attr_wp_setup(){
    //if(!empty($this->))
    //$this->_html .= " '" . $this-> . "'";
    //return $this->_attr;
    //}

    protected function _el_attr_wrap(){
        if(!empty($this->_htm_wrap))
            $this->_html .= " wrap='" . $this->_htm_wrap . "'";
        return $this->_attr;
    }
}