<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-6-2019
 * Time: 17:11
 */

namespace src\AssetsManager\Container;
use src\AssetsManager\Factory\DependencyVars;


class ScriptDependency
{
    use DependencyVars;
    use AssetsData;

    public function __construct() {

        list( $this->handle, $this->src, $this->deps, $this->ver, $this->type, $this->loading_type, $this->crossorigin, $this->integrity, $this->additionals, $this->args ) = func_get_args();
        if ( ! is_array( $this->deps ) )
            $this->deps = [];
    }
}