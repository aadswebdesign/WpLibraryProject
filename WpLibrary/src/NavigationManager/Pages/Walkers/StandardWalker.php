<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 06:20
 */

namespace src\NavigationManager\Pages\Walkers;

use src\NavigationManager\Pages\Factory\PageWalker;
use src\NavigationManager\Pages\Factory\Options;

class StandardWalker extends PageWalker
{
    use Options;

    public function __construct()
    {
        $this->_tree_type = ['post_type', 'taxonomy', 'custom'];
        $this->_db_fields = ['parent' => 'menu_item_parent', 'id' => 'db_id'];
    }

    /**
     * @param $output
     * @param int $depth
     * @param array $args
     * @description Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = [] ) {
        $this->_args = $args;
        $this->_indent = str_repeat("\t", $depth);
        $ul_sub_menu_class = 'ul_sub_menu_class';
        $ul_sub_menu_id = 'ul_sub_menu_id';
        if(!empty($this->_args->$ul_sub_menu_id))
            $output .= "\n$this->_indent<ul id='". $this->_args->$ul_sub_menu_id . "' class='". $this->_args->$ul_sub_menu_class . "'>\n";
        else
            $output .= "\n$this->_indent<ul class='". $this->_args->$ul_sub_menu_class . "'>\n";
    }

    /**
     * @param $output
     * @param int $depth
     * @param array $args
     * @description Ends the list after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = [] ) {
        $this->_args = $args;
        $this->_indent = str_repeat("\t", $depth);
        $output .= "$this->_indent</ul>\n";
    }

    /**
     * @param &$output
     * @param $item
     * @param int $depth
     * @param array $args
     * @param int $id
     * @description Start the elements output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0 ) {
        $this->_args = $args;
        $this->_item = $item;
        $this->_indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $this->id = $id; //todo
        $classes = empty( $this->_item->classes ) ? array() : (array) $this->_item->classes;
        $menu_item_inner_class = 'menu_item_inner_class';
        $classes[] = $this->_args->$menu_item_inner_class;
        $class_names = join( ' ', apply_filters( 'nav_menu', array_filter( $classes ), $this->_item, $this->_args ) );
        $this->_class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $menu_item_inner_id = 'menu_item_inner_id';
        $id = apply_filters( 'nav_menu_item-id', $this->_args->$menu_item_inner_id.'_'. $item->ID, $this->_item, $this->_args );
        $this->_id =  $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $menu_item_id = 'menu_item_id';
        $menu_item_class = 'menu_item_class';
        $output .= $this->_indent . '<li id="'. $this->_args->$menu_item_id . '_'  . $this->_item->ID . '" class="' . $this->_args->$menu_item_class  .'" tabindex="'. $this->_item->ID .'" >';
        $output .= '<div' . $this->_id . $this->_class_names .'>';
        $atts['title']  = ! empty( $this->_item->attr_title ) ? $this->_item->attr_title : '';
        $atts['target'] = ! empty( $this->_item->target )     ? $this->_item->target     : '';
        $atts['rel']    = ! empty( $this->_item->xfn )        ? $this->_item->xfn        : '';
        $atts['href']   = ! empty( $this->_item->url )        ? $this->_item->url        : '';
        global $post;
        $this->_post_id = $post->ID;
        $this->_atts = apply_filters( 'nav_menu_link_attributes', $atts, $this->_item, $this->_args );
        foreach ( $this->_atts as $attr => $value ) {
            if ( ! empty( $value ) ){
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $this->_attributes = ' ' . $attr . '="' . $value . '"';
            }
        }
        $before = 'before';
        $a_active_class = 'a_active_class';
        $i_active_id = 'i_active_id';
        $i_nonactive_id = 'i_nonactive_id';
        $a_extra_attributes = 'a_extra_attributes';
        $a_nonactive_class = 'a_nonactive_class';


        $this->_item_output = $args->$before;
        if($this->_post_id == $item->object_id) {
            $this->_item_output .= '<a class="'. $this->_args->$a_active_class .'"' . $args->$a_extra_attributes . ' >';
            $this->_item_output .= '<i id="' . $args->$i_active_id . '_' . $this->_item->ID .'" class="awd-link-label awd-link-label-active absolute">' . apply_filters( 'the_title', $this->_item->title, $this->_item->ID) . '</i>';
            $this->_item_output .= '</a>';
        }else{
            $this->_item_output .= '<a' . $this->_attributes . ' class="'. $this->_args->$a_nonactive_class .'"' . $args->$a_extra_attributes . ' >';
            $this->_item_output .= '<i id="' . $args->$i_nonactive_id . '_' . $this->_item->ID .'" class="awd-link-label awd-link-label-nonactive absolute">' . apply_filters( 'the_title', $this->_item->title, $this->_item->ID ) . '</i>';
            $this->_item_output .= '</a>';
        }
        $after = 'after';
        $this->_item_output .= $args->$after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $this->_item_output, $this->_item, $depth, $this->_args, $this->_item->ID );
    }

    /**
     * @param $output
     * @param $item
     * @param int $depth
     * @param array $args
     * @description  Ends the element output, if needed.
     */
    public function end_el(&$output, $item, $depth = 0, $args = [] ) {
        $menu_spacer = 'menu_spacer';
        if(!empty($args->$menu_spacer))
            $output .= '</div></li>' . $args->$menu_spacer . "\n";
        else
            $output .= '</div></li>' . "\n";
    }
}