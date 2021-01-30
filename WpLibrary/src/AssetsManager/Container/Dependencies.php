<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 28-11-2020
 * Time: 09:22
 */

namespace src\AssetsManager\Container;

use src\AssetsManager\Factory\AssetsVars;

class Dependencies implements DependenciesInterface
{
    use AssetsVars;

    /**
     * @param $handles
     * @param bool $group
     * @return array
     */
    public function doItems($handles, $group = false ){
        $this->_handles = false === $handles ? $this->queue : (array) $handles;
        $this->_group = $group;
        $this->allDeps( $this->_handles );
        foreach ( $this->to_do as $key => $handle ):
            if ( ! in_array( $handle, $this->done, true ) && isset( $this->registered[ $handle ] ) ):
                if ( $this->doItem( $handle, $this->_group ) ) //todo lookup
                    $this->done[] = $handle;
                unset( $this->to_do[ $key ] );
            endif;
        endforeach;
        return $this->done;
    }

    /**
     * @param $handle
     * @param bool $group
     * @return bool|string
     */
    public function doItem($handle, $group = false){
        $this->_handle = $handle;
        $this->_group = $group;
        if(isset( $this->registered[ $this->_group ] ))
            $this->_return = isset( $this->registered[ $this->_handle ] ).isset( $this->registered[ $this->_group ] );
        else
            $this->_return = isset( $this->registered[ $this->_handle ] );
        return $this->_return;
    }

    public function allDeps( $handles, $recursion = false, $group = false ){
        $this->_handles = $handles;
        $this->_recursion = $recursion;
        $this->_group = $group;

        if ( ! $this->_handles = (array) $this->_handles )
            return false;
        foreach ( $this->_handles as $handle ){
            $handle_parts = explode( '?', $handle );
            $handle       = $handle_parts[0];
            $queued       = in_array( $handle, $this->to_do, true );
            if ( in_array( $handle, $this->done, true ) )  // Already done
                continue;
            $moved     = $this->setGroup( $handle, $this->_recursion, $this->_group );
            $new_group = $this->groups[ $handle ];
            if ( $queued && ! $moved ) // already queued and in the right group
                continue;
            $keep_going = true;
            if ( ! isset( $this->registered[ $handle ] ) )
                $keep_going = false; // Item doesn't exist.
            elseif ( $this->registered[ $handle ]->deps && array_diff( $this->registered[ $handle ]->deps, array_keys( $this->registered ) ) )
                $keep_going = false; // Item requires dependencies that don't exist.
            elseif ( $this->registered[ $handle ]->deps && ! $this->allDeps( $this->registered[ $handle ]->deps, true, $new_group ) )
                $keep_going = false; // Item requires dependencies that don't exist.
            if ( ! $keep_going ):
                if ( $recursion )
                    return false; // Abort this branch.
                else
                    continue; // We're at the top level. Move on to the next one.
            endif;
            if ( $queued ) // Already grabbed it and its dependencies.
                continue;
            if ( isset( $handle_parts[1] ) )
                $this->args[ $handle ] = $handle_parts[1];
            $this->to_do[] = $handle;
        }
        return true;
    }

    public function recurseDeps( $queue, $handle ){
        $this->_queue = $queue;
        $this->_handle = $handle;
        foreach ( $this->_queue as $queued ){
            if ( ! isset( $this->registered[ $queued ] ) )
                continue;
            if ( in_array( $this->_handle, $this->registered[ $queued ]->deps ) )
                return true;
            elseif ( $this->recurseDeps( $this->registered[ $queued ]->deps, $this->_handle ) )
                return true;
        }
        return false;
    }

    public function addAssets( ...$params){}

    public function dequeueAssets( $handles ){
        $this->_handles = $handles;
        foreach ( (array) $this->_handles as $handle ){
            $handle = explode( '?', $handle );
            $key    = array_search( $handle[0], $this->queue );
            if ( false !== $key ){
                unset( $this->queue[ $key ] );
                unset( $this->args[ $handle[0] ] );
            }
        }
    }

    public function enqueueAssets( $handles ){
        $this->_handles = $handles;
        foreach ( (array) $this->_handles as $handle ){
            $handle = explode( '?', $handle );
            if ( ! in_array( $handle[0], $this->queue ) && isset( $this->registered[ $handle[0] ] ) ){
                $this->queue[] = $handle[0];
                if ( isset( $handle[1] ) )
                    $this->args[ $handle[0] ] = $handle[1];
            }
        }
    }

    public function removeAssets( $handles ){
        $this->_handles = $handles;
        foreach ( (array) $this->_handles as $handle ){
            unset( $this->registered[ $handle ] );
        }

    }

    public function queryAssets( $handle, $list = 'registered' ){
        $this->_handle = $handle;
        switch ( $list ):
            case 'registered':
                if ( isset( $this->registered[ $this->_handle ] ) )
                    return $this->registered[ $this->_handle ];
                return false;
            case 'enqueued':
            case 'queue':
                if ( in_array( $this->_handle, $this->queue ) )
                    return true;
                return $this->recurseDeps( $this->queue, $this->_handle );
            case 'to_do':
                return in_array( $this->_handle, $this->to_do );
            case 'done':
                return in_array( $this->_handle, $this->done );
        endswitch;
        return false;
    }

    public function addData( $handle, $key, $value){
        $this->_handle = $handle;
        $this->_key = $key;
        $this->_value = $value;
        $returned_data = $this->_key . ' ' . $this->_value; //todo let see this is working or not?
        if ( ! isset( $this->registered[ $this->_handle ] ) )
            return false;
        return $this->registered[ $this->_handle ]->$returned_data;
    }

    public function getData( $handle, $key ){
        $this->_handle = $handle;
        $this->_key = $key;
        if ( ! isset( $this->registered[ $this->_handle ] ) )
            return false;
        if ( ! isset( $this->registered[ $this->_handle ]->extra[ $this->_key ] ) )
            return false;
        return $this->registered[ $this->_handle ]->extra[ $this->_key ];
    }

    public function setGroup( $handle, $recursion, $group ){
        $this->_handle = $handle;
        $this->_recursion = $recursion;
        $this->_group = $group;
        if ( isset( $this->groups[ $this->_handle ] ) && $this->groups[ $this->_handle ] <= $this->_group )
            return false;
        $this->groups[ $this->_handle ] = $this->_group;
        return true;
    }

}