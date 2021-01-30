<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:54
 */

namespace src\Core\View\Components;

use src\Core\Factory\CoreOptions;
class HeadModule
{
    use CoreOptions;

    protected function _html_head(){
        $this->_html = __("<head>");
        ob_start();
        $this->_custom_head();
        wp_head();
        $this->_html .= __(ob_get_clean());
        $this->_html .= __("</head>");
        return $this->_html;
    }

    protected function _custom_head(){
        do_action('critical_css');
        do_action('custom_head');
    }

}