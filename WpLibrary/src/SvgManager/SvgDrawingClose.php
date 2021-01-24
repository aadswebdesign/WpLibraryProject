<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-10-2020
 * Time: 14:50
 */

namespace src\SvgManager;
use src\SvgManager\Fragments\SvgBlockClose;
use src\SvgManager\Containers\addElementsContainer;
use src\SvgManager\Factory\CreateSVGFile;
use src\SvgManager\Factory\CreateExternalStyleSheet;


class SvgDrawingClose extends addElementsContainer
{
    use CreateSVGFile;
    use CreateExternalStyleSheet;
    private $__svg_block;

    public function __construct() {
        parent::__construct();
        $this->__svg_block = new SvgBlockClose();
    }

    public function getSvgBlockEnd()
    {
        return $this->__svg_block;
    }

    public function toXMLString(){
        $this->_svg_print .= $this->__svg_block;
        $this->create_stylesheet();
        $this->create_svg_file();
        return $this->_svg_print;
    }
}