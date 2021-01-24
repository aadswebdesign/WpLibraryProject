<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-12-2020
 * Time: 21:31
 */

namespace src\NavigationManager\Pages\Factory;

use \src\NavigationManager\Pages\Container\PageWalkerInterface;


class PageWalker implements PageWalkerInterface
{
    use PageWalkerVars;

    public function start_lvl(&$output, $depth = 0, $args =[] ){}

    public function end_lvl(&$output, $depth = 0, $args = [] ){}

    public function end_el(&$output, $object, $depth = 0, $args = [] ){}

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output ){
        $this->_max_dept = $max_depth;
        $this->_element = $element;
        if(! $this->_element) return;

        $id_field = $this->_db_fields['id'];
        $this->_field_id = $this->_element->$id_field;

        $this->_has_children = ! empty( $children_elements[$this->_field_id]);
        if ( isset( $args[0] ) && is_array( $args[0] ) )
            $args[0]['has_children'] = $this->_has_children;

        $this->_cb_args =  array_merge( [&$output, $element, $depth], $args);
        call_user_func_array(array($this, 'start_el'), $this->_cb_args);


        if(($this->_max_dept === 0 || $this->_max_dept > $depth+1) && isset( $children_elements[$this->_field_id])){
            foreach ( $children_elements[$this->_field_id] as $child ){
                if ( !isset($this->_new_level) ) {
                    $this->_new_level = true;
                    $this->_cb_args = array_merge( [&$output, $depth], $args);
                    call_user_func_array(array($this, 'start_lvl'), $this->_cb_args);
                }
                $this->display_element($child, $children_elements, $this->_max_dept, $depth + 1, $args, $output);
            }
        }
        unset($children_elements[$this->_field_id]);

        if ( isset($this->_new_level) && $this->_new_level ){
            $this->_cb_args =  array_merge( [&$output, $depth], $args);
            call_user_func_array(array($this, 'end_lvl'), $this->_cb_args);
        }

        $this->_cb_args = array_merge( [&$output, $element, $depth], $args);
        call_user_func_array(array($this, 'end_el'), $this->_cb_args);


    }

    public function walk($elements, $max_depth ){
        $this->_max_dept = $max_depth;
        $this->_elements = $elements;
        $args = array_slice(func_get_args(), 2);
        if ( $this->_max_dept < -1 || empty( $this->_elements ) ) return $this->_output;
        $parent_field = $this->_db_fields['parent'];
        if ( -1 == $this->_max_dept ) {
            foreach ( $this->_elements as $e )
                $this->display_element( $e, $this->_empty_array, 1, 0, $args, $this->_output );
            return $this->_output;
        }
        foreach ( $this->_elements as $e) {
            //if ( empty( $e->$this->_parent_field ) )
            if ( empty( $e->$parent_field ) )
                $this->_top_level_el[] = $e;
            else
                $this->_children_el[ $e->$this->_parent_field ][] = $e;
        }
        if ( empty($this->_top_level_el) ) {
            $first = array_slice( $this->_elements, 0, 1 );
            $root = $first[0];
            foreach ( $this->_elements as $e){
                if ( $root->$this->_parent_field == $e->$this->_parent_field )
                    $this->_top_level_el[] = $e;
                else
                    $this->_children_el[ $e->$this->_parent_field ][] = $e;
            }
        }
        foreach ( $this->_top_level_el as $e )
            $this->display_element( $e, $this->_children_el, $this->_max_dept, 0, $args, $this->_output );

        if ( ( $this->_max_dept == 0 ) && count( $this->_children_el ) > 0 ) {
            foreach ( $this->_children_el as $orphans )
                foreach ( $orphans as $op )
                    $this->display_element( $op, $this->_empty_array, 1, 0, $args, $this->_output );
        }
        return $this->_output;

    }

    public function paged_walk($elements, $max_depth, $page_num, $per_page ){
        $this->_max_dept = $max_depth;
        $this->_elements = $elements;
        $this->_page_num = $page_num;
        $this->_per_page = $per_page;

        if(empty($this->_elements) || $this->_max_dept < -1) return null;

        $args = array_slice( func_get_args(), 4 );
        $this->_parent_field = $this->_db_fields['parent'];
        if ( -1 == $this->_max_dept )
            $this->_total_top = count($this->_elements);
        if($this->_page_num < 1 || $this->_per_page < 0){
            $this->_paging = false;
            $this->_start = 0;
            if ( -1 == $this->_max_dept )$this->_end = $this->_total_top;
            $this->_max_pages = 1;
        }else{
            $this->_paging = true;
            $this->_start = ( (int)$this->_page_num - 1 ) * (int)$this->_per_page;
            $this->_end = $this->_start + $this->_per_page;
            if ( -1 == $this->_max_dept )
                $this->_max_pages = ceil($this->_total_top / $this->_per_page);
        }

        if ( -1 == $this->_max_dept ){
            if ( !empty($args[0]['reverse_top_level']) ) {
                $this->_elements = array_reverse( $this->_elements );
                $this->_old_start = $this->_start;
                $this->_start = $this->_total_top - $this->_end;
                $this->_end = $this->_total_top - $this->_old_start;
            }
            foreach ( $this->_elements as $e){
                $this->_count++;
                if ( $this->_count < $this->_start )
                    continue;
                if ( $this->_count >= $this->_end )
                    break;
                $this->display_element( $e, $this->_empty_array, 1, 0, $args, $this->_output );
            }
            return $this->_output;
        }
        foreach ( $this->_elements as $e){
            if ( 0 == $e->$this->_parent_field )
                $this->_top_level_el[] = $e;
            else
                $this->_children_el[ $e->$this->_parent_field ][] = $e;
        }
        $this->_total_top = count($this->_top_level_el);

        if($this->_paging)
            $this->_max_pages = ceil($this->_total_top / $this->_per_page);
        else
            $this->_end = $this->_total_top;

        if ( !empty($args[0]['reverse_top_level']) ) {
            $this->_top_level_el = array_reverse($this->_top_level_el);
            $this->_old_start = $this->_start;
            $this->_start = $this->_total_top - $this->_end;
            $this->_end = $this->_total_top - $this->_old_start;
        }
        if ( !empty($args[0]['reverse_children']) ) {
            foreach ( $this->_children_el as $parent => $children )
                $this->_children_el[$parent] = array_reverse( $children );
        }

        foreach ( $this->_top_level_el as $e ) {
            $this->_count++;
            if ( $this->_end >= $this->_total_top && $this->_count < $this->_start )
                $this->unset_children( $e, $this->_children_el );
            if ( $this->_count < $this->_start )
                continue;
            if ( $this->_count >= $this->_end )
                break;
            $this->display_element( $e, $this->_children_el, $this->_max_dept, 0, $args, $this->_output );
        }
        if ( $this->_end >= $this->_total_top && count( $this->_children_el ) > 0 ) {
            foreach ( $this->_children_el as $orphans )
                foreach ( $orphans as $op )
                    $this->display_element( $op, $this->_empty_array, 1, 0, $args, $this->_output );
        }
        return $this->_output;
    }

    public function get_number_of_root_elements($elements ){
        $this->_elements = $elements;
        $num = 0;
        $this->_parent_field = $this->_db_fields['parent'];
        foreach ( $this->_elements as $e) {
            if ( 0 == $e->$this->_parent_field )
                $num++;
        }
        return $num;
    }

    public function unset_children($e, &$children_elements ){
        if ( ! $e || ! $children_elements ) return;
        $id_field = $this->_db_fields['id'];
        $this->_field_id = $e->$id_field;
        if ( !empty($children_elements[$this->_field_id]) && is_array($children_elements[$this->_field_id]) )
            foreach ( (array) $children_elements[$this->_field_id] as $child )
                $this->unset_children( $child, $children_elements );
        unset($children_elements[$this->_field_id]);
    }
}