<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 31-10-2020
 * Time: 18:13
 */

namespace src\HtmlTagsManager\Factory;


abstract class ToElemString
{

    /**
     * @return mixed
     */
    public abstract function toElemString();

    /**
     * @return mixed
     */
    public function __toString() {
        return $this->toElemString();
    }
}