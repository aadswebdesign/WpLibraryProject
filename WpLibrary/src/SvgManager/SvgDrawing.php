<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-10-2020
 * Time: 12:53
 */

namespace src\SvgManager;
use src\SvgManager\Fragments\SvgBlock;
use src\SvgManager\Containers\addElementsContainer;
final class SvgDrawing extends addElementsContainer
{
    private $__svg_block;

    public function __construct($viewbox = null, $x = null, $y = null, $width = null, $height = null)
    {
        parent::__construct();
        $this->__svg_block = new SvgBlock($viewbox, $x, $y, $width, $height);
    }

    public function getSvgBlock()
    {
        return $this->__svg_block;
    }

    public function toXMLString(){
        $this->_svg_print .= $this->__svg_block;
        return $this->_svg_print;
    }
}