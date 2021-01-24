<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-12-2020
 * Time: 11:26
 */

namespace src\HtmlTagsManager\Factory;


abstract class AddElements extends ToElemString
{
    protected
        $_elements,
        $_elements_array;

    public function __construct()
    {
        $this->_elements = [];
        $this->_elements_array = [];
    }

    public function addElement($node){
        $this->_elements[] = $node;
        $node->parent = $this;
        if (!($node instanceof ToElemString))
            return false;
        if ($node === $this)
            return false;
        if ($node->parent === $this)
            return false;

        if (isset($node->parent))
            $node->parent->removeElement($node, null);
        return true;
    }

    public function removeElement($node, $nodeOrIndex){
        if (is_int($nodeOrIndex))
            $index = $nodeOrIndex;
        else if($node instanceof ToElemString){
            $index = array_search($node, $this->_elements, true);
            if ($index === false)
                return false;
        } else
            return false;
        $node = $this->_elements[$index];
        $node->parent = null;
        array_splice($this->_elements, $index, 1);
        return true;
    }

    public function countElements(){
        return count($this->_elements);
    }

    public function getElement($index){
        return $this->_elements[$index];
    }

    public function addElements($elements_array){
        $this->_elements_array =  $elements_array;
        return $this;
    }

}