<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 4-12-2020
 * Time: 21:15
 */

namespace src\NavigationManager\Pages\Container;


interface PageWalkerInterface
{

    /**
     * @param $output
     * @param int $depth
     * @param array $args
     * @description Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args =[] );

    /**
     * @param $output
     * @param int $depth
     * @param array $args
     * @description Ends the list after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = [] );

    /**
     * @param $output
     * @param $object
     * @param int $depth
     * @param array $args
     * @description Ends the element output, if needed.
     */
    public function end_el(&$output, $object, $depth = 0, $args = [] );

    /**
     * @param $element
     * @param $children_elements
     * @param $max_depth
     * @param $depth
     * @param $args
     * @param $output
     * @description Traverse elements to create list from elements.
     */
    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output );

    /**
     * @param $elements
     * @param $max_depth
     *  @return string
     * @description Displays an array of elements hierarchically.
     */
    public function walk($elements, $max_depth );

    /**
     * @param $elements
     * @param $max_depth
     * @param $page_num
     * @param $per_page
     * @return string
     * @description produce a page of nested elements
     */
    public function paged_walk($elements, $max_depth, $page_num, $per_page );

    /**
     * @param $elements
     * @description Calculates the total number of root elements.
     * @return int
     */
    public function get_number_of_root_elements($elements );

    /**
     * @param $e
     * @param $children_elements
     * @description Unset all the children for a given top level element.
     */
    public function unset_children($e, &$children_elements );

}