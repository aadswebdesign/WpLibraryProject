<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 14:25
 */

namespace src\HtmlTagsManager\Elements\Form;

use src\HtmlTagsManager\Factory\AddElements;


final class FormBlock extends AddElements
{

    private $__form_block;
    protected $_print_form;

    //1:action,2:method,3:id,4:title,5:class,6:styles,7:rel,8:target,9:oninput,10:attributes
    public function __construct($action = null, $method = null, $id = null, $title = null, $class = null, $styles = null, $rel = null, $target = null, $oninput = null, $attributes = null)
    {
        parent::__construct();
        $this->__form_block = new FormFragment($action, $method, $id, $title, $class, $styles, $rel, $target, $oninput, $attributes);
    }

    public function getFormBlock(){
        return $this->__form_block;
    }

    protected function _toElemString(){
        $this->_print_form = $this->__form_block;
        return (string)$this->_print_form;
    }

    public function toElemString(){
        return $this->_toElemString();
    }
}