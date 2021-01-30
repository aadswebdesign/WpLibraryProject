<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 13-12-2020
 * Time: 02:07
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\TagConsts;
use src\HtmlTagsManager\Factory\ToElemString;
use src\HtmlTagsManager\Factory\Form\FormAttributes;


class InputElem extends ToElemString
{
    use FormAttributes;
    private $__type = ['checkbox','color','date','datetime-local','email','file','hidden','image','month','number','password','radio','range','reset','search','submit','tel','time','url','week'];

    protected
        $_types = [];

    public function __construct($type)
    {
        $this->__type = $type;
        $input_args = func_get_args();
        switch( $this->__type){
            case('checkbox'):
                self::__construct_type_checkbox(...$input_args);
                break;
            case('color'):
                self::__construct_type_checkbox(...$input_args);
                break;
            case('date'):
                self::__construct_type_date(...$input_args);
                break;
            case('datetime-local'):
                self::__construct_type_dateTimeLocal(...$input_args);
                break;
            case('email'):
                self::__construct_type_email(...$input_args);
                break;
            case('file'):
                self::__construct_type_file(...$input_args);
                break;
            case('hidden'):
                self::__construct_type_hidden(...$input_args);
                break;
            case('image'):
                self::__construct_type_image(...$input_args);
                break;
            case('month'):
                self::__construct_type_month(...$input_args);
                break;
            case('number'):
                self::__construct_type_number(...$input_args);
                break;
            case('password'):
                self::__construct_type_password(...$input_args);
                break;
            case('radio'):
                self::__construct_type_radio(...$input_args);
                break;
            case('range'):
                self::__construct_type_range(...$input_args);
                break;
            case('reset'):
                self::__construct_type_reset(...$input_args);
                break;
            case('search'):
                self::__construct_type_search(...$input_args);
                break;
            case('submit'):
                self::__construct_type_submit(...$input_args);
                break;
            case('tel'):
                self::__construct_type_tel(...$input_args);
                break;
            case('time'):
                self::__construct_type_time(...$input_args);
                break;
            case('url'):
                self::__construct_type_url(...$input_args);
                break;
            case('week'):
                self::__construct_type_week(...$input_args);
                break;
            default:
            self::__construct_type_text(...$input_args);
        }
    }

    /**
     * @param string $type
     * @param null $name
     * @param string $value
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param string $title
     * @param null $checked
     * @param boolean $required
     * @param null $attributes
     * @param string $form
     */
    //1:type(checkbox),2:name,3:value,4:id,5:class,6:styles,7:title,8:checked,9:required,10:attributes,11:form
    protected function __construct_type_checkbox($type = 'checkbox', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $checked = null, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_checked = $checked;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param string $value
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param string $title
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(color),2:name,3:value,4:id,5:class,6:styles,7:title,8:required,9:attributes,10:form
    protected function __construct_type_color($type = 'color', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param string $value
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param string $title
     * @param null $min
     * @param null $max
     * @param boolean $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(date),2:name,3:value,4:id,5:class,6:styles,7:title,8:min,9:max,10:required,11:attributes,12:form
    protected function __construct_type_date($type = 'date', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $min=null, $max=null, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param string $value
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param string $title
     * @param null $min
     * @param null $max
     * @param boolean $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(date-local),2:name,3:value,4:id,5:class,6:styles,7:title,8:min,9:max,10:required,11:attributes,12:form
    protected function __construct_type_dateTimeLocal($type = 'datetime-local', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $min=null, $max=null, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_id = $id;
        $this->_htm_value = $value;
        $this->_htm_title = $title;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $value
     * @param null $id
     * @param null $class
     * @param null $styles
     * @param string $title
     * @param null $placeholder
     * @param null $list
     * @param bool $multiple
     * @param null $minlength
     * @param null $maxlength
     * @param null $pattern
     * @param bool $readonly
     * @param null $size
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(email),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:minlength,10:maxlength,11:required,12:attributes,13:form
    protected function __construct_type_email($type = 'email', $name=null, $value = null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $list = null, $multiple = false, $minlength=null, $maxlength=null, $pattern=null, $size= null, $readonly = false, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_list = $list;
        $this->_htm_multiple = $multiple;
        $this->_htm_minlength = $minlength;
        $this->_htm_maxlength = $maxlength;
        $this->_htm_pattern = $pattern;
        $this->_htm_size = $size;
        $this->_htm_readonly = $readonly;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param string $value
     * @param string $title
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $accept
     * @param bool $multiple
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(file),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:accept,10:multiple,11:required,12:attributes,13:form
    protected function __construct_type_file($type='file', $value=null, $name=null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $accept = null, $multiple = false, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_accept = $accept;
        $this->_htm_multiple = $multiple;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $value
     * @param null $id
     * @param null $form
     */
    //1:type(hidden),2:name,3:value,4:id,5:form
    protected function __construct_type_hidden($type='hidden', $name=null, $value=null, $id=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_id = $id;
        $this->_htm_value = $value;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $alt
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $src
     * @param null $height
     * @param null $width
     * @param bool $required
     * @param null $attributes
     * @param null $form
     * @param null $form_action
     * @param null $form_enctype
     * @param null $form_method
     * @param null $form_target
     * @param null $form_no_validate
     */
    //1:type(image),2:name,3:value,4:id,5:class,6:styles,7:alt,8:placeholder,9:src,10:height,11:width,12:required,13:attributes,14:form,15:form_action,16:form_enctype,17:form_target,18:form_no_validate
    protected function __construct_type_image($type='image', $name=null, $value=null, $id=null, $class=null, $styles=null, $alt = null, $placeholder=null, $src = null, $height = null, $width = null, $required = false, $attributes=null, $form = null, $form_action = null, $form_enctype = null, $form_method = null, $form_target = null, $form_no_validate = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_alt = $alt;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_src = $src;
        $this->_htm_height = $height;
        $this->_htm_width = $width;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
        $this->_htm_form_action = $form_action;
        $this->_htm_form_enctype = $form_enctype;
        $this->_htm_form_method = $form_method;
        $this->_htm_form_target = $form_target;
        $this->_htm_form_no_validate = $form_no_validate;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $list
     * @param null $min
     * @param null $max
     * @param null $step
     * @param bool $readonly
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(month),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:list,10:min,11:max,12:step,13:readonly,14:required,15:attributes,16:form
    protected function __construct_type_month($type='month', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $list=null, $min=null, $max=null, $step=null, $readonly = false, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_title = $title;
        $this->_htm_styles = $styles;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_list = $list;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_step = $step;
        $this->_htm_readonly = $readonly;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $list
     * @param null $min
     * @param null $max
     * @param bool $readonly
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(number),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:list,10:min,11:max,12:readonly,13:required,14:attributes,15:form
    protected function __construct_type_number($type='number', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $list=null, $min=null, $max=null, $readonly = false, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_list = $list;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_readonly = $readonly;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $minlength
     * @param null $maxlength
     * @param null $pattern
     * @param null $size
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(password),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:minlength,10:maxlength,11:pattern,12:size,13:required,14:attributes,15:form
    protected function __construct_type_password($type='password', $name=null, $value=null, $id=null, $class=null, $styles=null, $title=null, $placeholder=null, $minlength=null, $maxlength=null, $pattern=null, $size = null, $required = true, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_minlength = $minlength;
        $this->_htm_maxlength = $maxlength;
        $this->_htm_pattern = $pattern;
        $this->_htm_size = $size;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param string $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param bool $checked
     * @param null $attributes
     * @param null $form
     */
    //1:type(radio),2:name,3:value,4:id,5:class,6:styles,7:title,8:checked,14:attributes,15:form
    protected function __construct_type_radio($type = 'radio', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $checked = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_checked = $checked;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $list
     * @param null $min
     * @param null $max
     * @param null $step
     * @param null $attributes
     * @param null $form
     */
    //1:type(range),2:name,3:value,4:id,5:class,6:styles,7:title,8:list,9:min,10:max,11:step,12:required,13:attributes,14:form
    protected function __construct_type_range($type = 'range', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $list=null, $min=null, $max=null, $step=null, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_title = $title;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_list = $list;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_step = $step;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $access_key
     * @param null $attributes
     * @param null $form
     */
    //1:type(reset),2:name,3:value,4:id,5:class,6:styles,7:title,8:access_key,9:required,10:attributes,11:form
    protected function __construct_type_reset($type = 'reset', $name=null, $id=null, $value=null, $class=null, $styles=null, $title = null, $access_key = null, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_access_key = $access_key;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $list
     * @param null $minlength
     * @param null $maxlength
     * @param null $pattern
     * @param null $size
     * @param bool $readonly
     * @param bool $spellcheck
     * @param null $attributes
     * @param null $form
     */
    //1:type(search),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:list ,10:minlength,11:maxlength,12:pattern,13:size, 14:readonly,15:spellcheck,16:required,17:attributes,18:form
    protected function __construct_type_search($type = 'search', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $list=null, $minlength=null, $maxlength=null, $pattern=null, $size= null, $readonly = false, $spellcheck = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_list = $list;
        $this->_htm_minlength = $minlength;
        $this->_htm_maxlength = $maxlength;
        $this->_htm_pattern = $pattern;
        $this->_htm_size = $size;
        $this->_htm_readonly = $readonly;
        $this->_htm_spellcheck = $spellcheck;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $access_key
     * @param bool $disabled
     * @param null $attributes
     * @param null $form
     * @param null $form_action
     * @param null $form_enctype
     * @param null $form_method
     * @param null $form_target
     * @param null $form_no_validate
     */
    //1:type(submit),2:name,3:value,4:id,5:class,6:styles,7:title,8:access_key,9:disabled,10:attributes,11:form,12:form_action,13:form_enctype,14:form_target,15:form_no_validate
    protected function __construct_type_submit($type = 'submit', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $access_key = null, $disabled = false, $attributes=null, $form = null, $form_action = null, $form_enctype = null, $form_method = null, $form_target = null, $form_no_validate = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_access_key = $access_key;
        $this->_htm_disabled = $disabled;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
        $this->_htm_form_action = $form_action;
        $this->_htm_form_enctype = $form_enctype;
        $this->_htm_form_method = $form_method;
        $this->_htm_form_target = $form_target;
        $this->_htm_form_no_validate = $form_no_validate;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $list
     * @param null $minlength
     * @param null $maxlength
     * @param null $pattern
     * @param null $size
     * @param bool $readonly
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(tel),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:list,10:minlength,11:maxlength,12:pattern,13:size, 14:readonly,15:required,16:attributes,17:form
    protected function __construct_type_tel($type='tel', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $list=null, $minlength=null, $maxlength=null, $pattern=null, $size= null, $readonly = false, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_list = $list;
        $this->_htm_minlength = $minlength;
        $this->_htm_maxlength = $maxlength;
        $this->_htm_pattern = $pattern;
        $this->_htm_size = $size;
        $this->_htm_readonly = $readonly;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param string $value
     * @param null $class
     * @param null $styles
     * @param null $title
     * @param null $list
     * @param null $placeholder
     * @param bool $spellcheck
     * @param boolean $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(text),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:list,10:spellcheck,11:required,12:attributes,13:form
    protected function __construct_type_text($type = 'text', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $placeholder=null, $list=null, $spellcheck = false, $required = false, $attributes = null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_list = $list;
        $this->_htm_spellcheck = $spellcheck;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $list
     * @param null $min
     * @param null $max
     * @param null $step
     * @param null $pattern
     * @param bool $readonly
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(time),2:name,3:value,4:id,5:class,6:styles,7:title,8:list,9:min,10:max,11:step,12:pattern,13:readonly,14:required,15:attributes,16:form
    protected function __construct_type_time($type = 'time', $name=null, $value=null, $id=null, $class=null, $styles=null, $title = null, $list=null, $min=null, $max=null, $step=null, $pattern=null, $readonly = false, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_list = $list;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_step = $step;
        $this->_htm_pattern = $pattern;
        $this->_htm_readonly = $readonly;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $placeholder
     * @param null $list
     * @param null $minlength
     * @param null $maxlength
     * @param null $pattern
     * @param null $size
     * @param bool $readonly
     * @param bool $spellcheck
     * @param bool $required
     * @param null $attributes
     * @param null $form
     */
    //1:type(url),2:name,3:value,4:id,5:class,6:styles,7:title,8:placeholder,9:list,10:min,11:max,12:pattern,13:size,14:readonly,15:spellcheck,16:required,17:attributes,18:form
    protected function __construct_type_url($type = 'url', $name=null, $id=null, $value=null, $title = null, $class=null, $styles=null, $placeholder=null, $list=null, $minlength=null, $maxlength=null, $pattern=null, $size= null, $readonly = false, $spellcheck = false, $required = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_placeholder = $placeholder;
        $this->_htm_list = $list;
        $this->_htm_minlength = $minlength;
        $this->_htm_maxlength = $maxlength;
        $this->_htm_pattern = $pattern;
        $this->_htm_size = $size;
        $this->_htm_readonly = $readonly;
        $this->_htm_spellcheck = $spellcheck;
        $this->_htm_required = $required;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    /**
     * @param string $type
     * @param null $name
     * @param null $id
     * @param null $value
     * @param null $title
     * @param null $class
     * @param null $styles
     * @param null $min
     * @param null $max
     * @param null $step
     * @param bool $readonly
     * @param null $attributes
     * @param null $form
     */
    //1:type(week),2:name,3:value,4:id,5:class,6:styles,7:title,8:min,9:max,10:step,11:readonly,12:spellcheck,13:required,14:attributes,15:form
    protected function __construct_type_week($type = 'week', $name=null, $id=null, $value=null, $title = null, $class=null, $styles=null, $min=null, $max=null, $step=null, $readonly = false, $attributes=null, $form = null){
        $this->_htm_type = $type;
        $this->_types = $this->_htm_type;
        $this->_htm_name = $name;
        $this->_htm_value = $value;
        $this->_htm_id = $id;
        $this->_htm_class = $class;
        $this->_htm_styles = $styles;
        $this->_htm_title = $title;
        $this->_htm_min = $min;
        $this->_htm_max = $max;
        $this->_htm_step = $step;
        $this->_htm_readonly = $readonly;
        $this->_htm_attributes = $attributes;
        $this->_htm_form = $form;
    }

    protected function _toElemString(){
        $this->_html = __(TagConsts::ELEM_INPUT);
        //--A--
        $this->_html .= __($this->_el_attr_accept());
        $this->_html .= __($this->_el_attr_access_key());
        $this->_html .= __($this->_el_attr_alt());
        $this->_html .= __($this->_el_attr_attributes());
        $this->_html .= __($this->_el_attr_autocomplete());
        //--C--
        $this->_html .= __($this->_el_attr_capture());
        $this->_html .= __($this->_el_attr_checked());
        $this->_html .= __($this->_el_attr_class());
        //--D--
        $this->_html .= __($this->_el_attr_disabled());
        //--F--
        $this->_html .= __($this->_el_attr_files());
        $this->_html .= __($this->_el_attr_form());
        $this->_html .= __($this->_el_attr_form_action());
        $this->_html .= __($this->_el_attr_form_enctype());
        $this->_html .= __($this->_el_attr_form_method());
        $this->_html .= __($this->_el_attr_form_no_validate());
        //--H--
        $this->_html .= __($this->_el_attr_height());
        //--I--
        $this->_html .= __($this->_el_attr_id());
        //--L--
        $this->_html .= __($this->_el_attr_list());
        $this->_html .= __($this->_el_attr_low());
        //--M--
        $this->_html .= __($this->_el_attr_max());
        $this->_html .= __($this->_el_attr_maxlength());
        $this->_html .= __($this->_el_attr_min());
        $this->_html .= __($this->_el_attr_minlength());
        $this->_html .= __($this->_el_attr_multiple());
        //--N--
        $this->_html .= __($this->_el_attr_name());
        //--P--
        $this->_html .= __($this->_el_attr_pattern());
        $this->_html .= __($this->_el_attr_placeholder());
        //--R--
        $this->_html .= __($this->_el_attr_readonly());
        $this->_html .= __($this->_el_attr_rel());
        $this->_html .= __($this->_el_attr_required());
        //--S--
        $this->_html .= __($this->_el_attr_size());
        $this->_html .= __($this->_el_attr_src());
        $this->_html .= __($this->_el_attr_spellcheck());
        $this->_html .= __($this->_el_attr_step());
        $this->_html .= __($this->_el_attr_styles());
        //--T--
        $this->_html .= __($this->_el_attr_title());
        $this->_html .= __($this->_el_attr_type());
        //--V--
        $this->_html .= __($this->_el_attr_value());
        //--W--
        $this->_html .= __($this->_el_attr_width());
        $this->_html .= __(TagConsts::ELEM_CLOSING);
        return (string)$this->_html;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}