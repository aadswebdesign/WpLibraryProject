<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-9-2016
 * Time: 16:38
 */

namespace src\SvgManager\Factory;


/**
 * Class SvgToXmlString
 * @package inc\SvgManager\Factory
 */
abstract class SvgToXmlString
{
    use SvgManagerAttributes;

    public abstract function toXMLString();

    public function __toString() {
        return $this->toXMLString();
    }
}