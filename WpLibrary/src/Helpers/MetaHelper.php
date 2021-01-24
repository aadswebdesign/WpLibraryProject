<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 12-1-2021
 * Time: 09:11
 */

namespace src\Helpers;


class MetaHelper
{
    const META = '<meta ';
    const META_CLOSE = ' />';

    private $__att =['charset','http-equiv','name'];
    protected
        $_charset,
        $_content,
        $_html,
        $_http_equiv,
        $_name,
        $_param,
        $_atts = [];

    public function __construct($att)
    {
        $this->__att = $att;
        $att_args =  func_get_args();
        switch ($this->__att){
            case('charset'):
                self::__construct_attr_charset(...$att_args);
                break;
            case('http-equiv'):
                self::__construct_attr_http_equiv(...$att_args);
                break;
            case('name'):
            default:
            self::__construct_attr_name(...$att_args);
        }
    }

    protected function __construct_attr_charset($att = 'charset', $charset = null){
        $this->_param = $att;
        $this->_atts = $this->_param;
        $this->_charset = $charset;
    }

    protected function __construct_attr_http_equiv($att = 'http-equiv', $_http_equiv = null, $content=null){
        $this->_param = $att;
        $this->_atts = $this->_param;
        $this->_http_equiv = $_http_equiv;
        $this->_content = $content;
    }

    protected function __construct_attr_name($att = 'name',$name= null, $content=null){
        $this->_param = $att;
        $this->_atts = $this->_param;
        $this->_name = $name;
        $this->_content = $content;
    }

    protected function _toString(){
        $this->_html = self::META;
        switch ($this->__att) {
            case('charset'):
                if(!empty($this->_charset))
                $this->_html .= __("charset='{$this->_charset}'");
                break;
            case('http-equiv'):
                if(!empty($this->_http_equiv))
                $this->_html .= __("http-equiv='{$this->_http_equiv}'");
                if(!empty($this->_content))
                $this->_html .= __(" content='{$this->_content}'");
                break;
            case('name'):
            default:
            if(!empty($this->_name))
                $this->_html .= __("name='{$this->_name}'");
            if(!empty($this->_content))
                $this->_html .= __(" content='{$this->_content}'");
        }
        $this->_html .= self::META_CLOSE;
        return (string)$this->_html;
    }

    public function __toString()
    {
        return $this->_toString();
    }
}