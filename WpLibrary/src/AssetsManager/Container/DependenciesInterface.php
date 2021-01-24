<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 28-11-2020
 * Time: 07:58
 */

namespace src\AssetsManager\Container;


interface DependenciesInterface
{
    public function doItems(  $handles, $group = false );
    public function doItem( $handle, $group = false);
    public function allDeps( $handles, $recursion = false, $group = false );
    public function recurseDeps( $queue, $handle );
    public function addAssets(...$params);
    public function dequeueAssets( $handles );
    public function enqueueAssets( $handles );
    public function removeAssets( $handles );
    public function queryAssets( $handle, $list = 'registered' );
    public function addData( $handle, $key, $value);
    public function getData( $handle, $key );
    public function setGroup( $handle, $recursion, $group );
}