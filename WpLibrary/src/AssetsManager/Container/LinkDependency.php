<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-11-2020
 * Time: 22:46
 */

namespace src\AssetsManager\Container;

use src\AssetsManager\Factory\DependencyVars;

class LinkDependency
{
    use DependencyVars;
    use AssetsData;

    public function __construct()
    {
        @list($this->mode, $this->handle, $this->href, $this->deps, $this->ver, $this->rel, $this->type, $this->as, $this->media, $this->crossorigin, $this->integrity, $this->importance, $this->extra_atts, $this->args ) = func_get_args();
        if ( ! is_array( $this->deps ) )
            $this->deps = [];

    }
}