<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-6-2019
 * Time: 17:19
 */

namespace src\AssetsManager\Container;


class ScriptDependencies extends Dependencies
{
    public function addAssets( ...$params){
        //script: handle, src, deps, ver, type, async, crossorigin, integrity, additionals
        $this->handle = $params[0];
        $this->src = $params[1];
        $this->deps = $params[2];
        $this->ver = $params[3];
        $this->type = $params[4];
        $this->loading_type = $params[5];
        $this->crossorigin = $params[6];
        $this->integrity = $params[7];
        $this->additionals = $params[8];
        $this->args = $params[9];
        if ( isset( $this->registered[ $this->_handle ] ) )
            return false;
        $this->_dependency = new ScriptDependency( $this->handle, $this->src, $this->deps, $this->ver, $this->type, $this->loading_type, $this->crossorigin, $this->integrity , $this->additionals, $this->args );
        $this->registered[ $this->handle ] = $this->_dependency;
        return true;
    }
}