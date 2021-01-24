<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-11-2020
 * Time: 22:48
 */

namespace src\AssetsManager\Container;


class LinkDependencies extends Dependencies
{

    /**
     * @param array ...$params
     * @return bool
     */
    public function addAssets(...$params){
        // mode[0], handle[1], href[2], deps[3], ver[4], type[5], as[6], media[7], crossorigin[8], integrity[9], importance[10], rel[11], extra_atts[12]
        $this->mode = $params[0];
        $this->handle = $params[1];
        $this->href = $params[2];
        $this->deps = $params[3];
        $this->ver = $params[4];
        $this->rel = $params[5];
        $this->type = $params[6];
        $this->as = $params[7];
        $this->media = $params[8];
        $this->crossorigin = $params[9];
        $this->integrity = $params[10];
        $this->importance = $params[11];
        $this->extra_atts = $params[12];
        if ( isset( $this->registered[ $this->_handle ] ) )
            return false;
        $this->_dependency = new LinkDependency($this->mode, $this->handle, $this->href, $this->deps, $this->ver, $this->rel, $this->type, $this->as, $this->media, $this->crossorigin, $this->integrity, $this->importance, $this->extra_atts);
        $this->registered[ $this->handle ] = $this->_dependency;
        return true;
    }
}