<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:54
 */

namespace src\Core\View\Components;
use src\Core\Factory\CoreOptions;

class HtmlModule
{
    use CoreOptions;
    protected function _html_start(){
        $this->_html = __("<!DOCTYPE html>");
        if(!empty($this->_core_class['html']))
            $this->_html .= __("<html class='" . $this->_core_class['html'] . "' ");
        else
            $this->_html .= __("<html ");
        ob_start();
        language_attributes();
        $this->_html .= __(ob_get_clean());
        $this->_html .= __(">");
        return $this->_html;
    }

    protected function _html_end(){
        $this->_html = __("</html>");
        return $this->_html;
    }




}