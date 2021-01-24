<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-10-2020
 * Time: 09:50
 */

namespace src\SvgManager\Containers;


use src\SvgManager\Factory\SvgToXmlString;

abstract class addElementsContainer extends SvgToXmlString
{

    protected
        $_children,
        $_children_array,
        $_stops,
        $_stops_array;

    public function __construct()
    {
        $this->_children = [];
        $this->_children_array = [];
        $this->_stops = [];
        $this->_stops_array = [];
    }

    public function addChild($node){
        $this->_children[] = $node;
        $node->parent = $this;
        if (!($node instanceof SvgToXmlString))
            return false;
        if ($node === $this)
            return false;
        if ($node->parent === $this)
            return false;
        if (isset($node->parent)) {
            $node->parent->removeChild($node, null);
        }
        return true;
    }

    public function removeChild($node, $nodeOrIndex){
        if (is_int($nodeOrIndex)) {
            $index = $nodeOrIndex;
        } else if ($node instanceof SvgToXmlString) {
            $index = array_search($node, $this->_children, true);
            if ($index === false)
                return false;
        } else {
            return false;
        }
        $node = $this->_children[$index];
        $node->parent = null;
        array_splice($this->_children, $index, 1);
        return true;
    }

    public function countChildren() {
        return count($this->_children);
    }

    public function getChild($index) {
        return $this->_children[$index];
    }

    public function setChildrenArray($children_array)
    {
        $this->_children_array = $children_array;
        return $this;
    }
    //ADD STOPS
    public function addStop($node) {
        $this->_stops[] = $node;
        $node->parent = $this;
        if (!($node instanceof SvgToXmlString))
            return false;
        if ($node === $this)
            return false;
        if ($node->parent === $this)
            return false;
        if (isset($node->parent)) {
            $node->parent->removeStop($node, null);
        }
        return true;
    }

    public function removeStop($node, $nodeOrIndex) {
        if (is_int($nodeOrIndex)) {
            $index = $nodeOrIndex;
        } else if ($node instanceof SvgToXmlString) {
            $index = array_search($node, $this->_stops, true);
            if ($index === false)
                return false;
        } else {
            return false;
        }
        $node = $this->_stops[$index];
        $node->parent = null;
        array_splice($this->_stops, $index, 1);
        return true;
    }

    public function countStops() {
        return count($this->_stops);
    }

    public function getStop($index) {
        return $this->_stops[$index];
    }

    public function setStopsArray($stops_array)
    {
        $this->_stops_array = $stops_array;
        return $this;
    }
}