<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 05:23
 */

namespace src\NavigationManager\Pages\Walkers;

use src\NavigationManager\Pages\Factory\PageWalker;
use src\NavigationManager\Pages\Factory\Options;
use src\NavigationManager\Pages\Walkers\Container\ActivePage;
use src\NavigationManager\Pages\Walkers\Container\NonActivePages;

class SvgWalker extends PageWalker
{
    use Options;
    use ActivePage;
    use NonActivePages;

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
        $ul_sub_menu_class = 'ul-sub-menu';
        $ul_sub_menu_id = 'ul_sub_menu';
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
     * @param $output
     * @param $item
     * @param int $depth
     * @param array $args
     * @param int $id
     * @description Start the elements output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0 ) {

        $this->_args = $args;
        $this->_item = $item;
        $this->_item_slug = strtolower($item->title);
        $this->_indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $this->id = $id; //todo

        $this->_item->classes  = str_replace("menu-item","menu-item-block",$this->_item->classes);
        $classes = empty( $this->_item->classes ) ? array() : (array) $this->_item->classes;
        $menu_item_inner_class = 'menu_item_inner_class';
        $classes[] = $this->_args->$menu_item_inner_class;
        $class_names = join( ' ', apply_filters( 'nav_menu', array_filter( $classes ), $this->_item, $this->_args ) );
        $this->_class_names = $class_names ? " class='" . esc_attr( $class_names ) . "'" : "";
        $menu_item_inner_id = 'menu_item_inner_id';
        $id = apply_filters( 'nav_menu_item-id', $this->_args->$menu_item_inner_id . '_' . $this->_item_slug, $this->_item, $this->_args );
        $this->_id =  $id ? " id='" . esc_attr( $id ) .  "'" : "";
        $prefix = 'prefix';
        $menu_item_class = 'menu_item_class';
        $output .=  $this->_indent . "<li id='" . $this->_args->$prefix . $item->title . "' class='" . $this->_args->$menu_item_class . "' tabindex='". $this->_item->ID ."' >";
        $output .= '<div' . $this->_id . $this->_class_names .'>';
        $this->_atts['title']  = ! empty( $this->_item->attr_title ) ? $this->_item->attr_title : '';
        $this->_atts['target'] = ! empty( $this->_item->target )     ? $this->_item->target     : '';
        $this->_atts['rel']    = ! empty( $this->_item->xfn )        ? $this->_item->xfn        : '';


        $this->_atts['href'] = ! empty( $this->_item->url )  ? $this->_item->url : '';

        global $post;
        $this->_post_id = $post->ID;

        $this->_atts = apply_filters( 'nav_menu_link_attributes', $this->_atts, $this->_item, $this->_args );

        foreach ( $this->_atts as $attr => $value ) {
            if ( ! empty( $value ) ){
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $this->_attributes = " " . $attr . "='" . $value . "'";
            }
        }
        $before = 'before';
        $this->_item_output = $this->_args->$before;
        $this->_item_slug = strtolower($item->title);
        if($this->_post_id == $item->object_id)
            $this->_walker_active();
        else{
            $this->_walker_nonactive();
        }
        $after = 'after';
        $this->_item_output .= $this->_args->$after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $this->_item_output, $this->_item, $depth, $this->_args, $this->_item->ID );
    }

    /**
     * @param &$output
     * @param $item
     * @param int $depth
     * @param array $args
     * @description  Ends the element output, if needed.
     */
    public function end_el(&$output, $item, $depth = 0, $args = [] ) {
        $output .= '</div></li>' . $this->_args->menu_spacer . "\n";

    }

}