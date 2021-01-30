<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 15:13
 */

namespace src\NavigationManager\Pages\Factory\Menus;


trait SvgMenuSetup
{
    use BaseMenuSetup;

    protected function _menu_setup($args = []){
        $this->_args = wp_parse_args($args, $this->_defaults());

        $this->_args = apply_filters('wp_nav_menu_args', $this->_args);
        $this->_args = (object)$this->_args;

        $this->_nav_menu =  apply_filters('pre_wp_nav_menu', null, $this->_args);

        if (null !== $this->_nav_menu) {
            if ($this->_args->echo) {
                _e($this->_nav_menu);
                return null; //edition
            }
            return $this->_nav_menu;
        }

        // Get the nav menu based on the requested menu
        $this->_menu = wp_get_nav_menu_object($this->_args->menu);

        // Get the nav menu based on the theme_location
        if (!$this->_menu && $this->_args->theme_location && ($locations = get_nav_menu_locations()) && isset($locations[$this->_args->theme_location]))
            $this->_menu = wp_get_nav_menu_object($locations[$this->_args->theme_location]);

        // get the first menu that has items if we still can't find a menu
        if (!$this->_menu && !$this->_args->theme_location) {
            $menus =  wp_get_nav_menus();

            foreach ($menus as $menu_maybe) {
                if ($this->_menu_items = wp_get_nav_menu_items($menu_maybe->term_id, array('update_post_term_cache' => false))) {
                    $this->_menu = $menu_maybe;
                    break;
                }
            }
        }

        // If the menu exists, get its items.
        if ($this->_menu && !is_wp_error($this->_menu) && !isset($this->_menu_items)){
            $this->_menu_items = wp_get_nav_menu_items($this->_menu->term_id, array('update_post_term_cache' => false));
        }

        /*
         * If no menu was found:
         *  - Fall back (if one was specified), or bail.
         *
         * If no menu items were found:
         *  - Fall back, but only if no theme location was specified.
         *  - Otherwise, bail.
         */
        if ((!$this->_menu || is_wp_error($this->_menu) || (isset($this->_menu_items) && empty($this->_menu_items) && !$this->_args->theme_location))
            && $this->_args->fallback_cb && is_callable($this->_args->fallback_cb)
        )
            return call_user_func($this->_args->fallback_cb, (array)$this->_args);

        if (!$this->_menu || is_wp_error($this->_menu))
            return false;

        $this->_nav_menu = $this->_items = ''; //todo or just $items?

        // Set up the $this->_menu_item variables
        _wp_menu_item_classes_by_context($this->_menu_items);

        $this->_sorted_menu_items = $menu_items_with_children = array();
        $wrap_count = count($this->_menu_items);
        $this->_args->container_style_value = $this->_args->container_style_value * $wrap_count . 'px';
        if ($this->_args->container) {
            $allowed_tags = apply_filters('wp_nav_menu_container_allowedtags', array('div', 'nav', 'section'));

            if (in_array($this->_args->container, $allowed_tags)) {
                $this->_show_container = true;
                $class = $this->_args->container_class ? " class='" . esc_attr($this->_args->container_class) .  "'" : " class='" . $this->_menu->slug . "-menu-container'";
                $id = $this->_args->container_id ? " id='" .esc_attr($this->_args->container_id) . "'" : "";
                $media = $this->_args->media ? " media='" . esc_attr($this->_args->media) . "'" : "";
                $role = $this->_args->container_role ? " role='" . esc_attr($this->_args->container_role) . "'" : "";
                $style = $this->_args->container_style ? " style='" . esc_attr($this->_args->container_style) . esc_attr($this->_args->container_style_value) . "'" : "";
                if(!empty($this->_args->pre_element)&& !empty($this->_args->after_element))
                    $this->_nav_menu .= $this->_args->pre_element . '<' . $this->_args->container . $id . $role . $class . $style . $media . '>'; //todo
                else
                    $this->_nav_menu =  '<' . $this->_args->container . $id . $role . $class . $style . $media . '>';
            }
        }

        foreach ((array)$this->_menu_items as $menu_item) {
            $this->_sorted_menu_items[$menu_item->menu_order] = $menu_item;
            if ($menu_item->menu_item_parent)
                $menu_items_with_children[$menu_item->menu_item_parent] = true;
        }

        // Add the menu-item-has-children class where applicable
        if ($menu_items_with_children) {
            foreach ($this->_sorted_menu_items as &$menu_item) {
                if (isset($menu_items_with_children[$menu_item->ID]))
                    $menu_item->classes[] = 'menu-item-has-children';
            }
        }
        unset($this->_menu_items, $menu_item);

        $this->_sorted_menu_items = apply_filters('wp_nav_menu_objects', $this->_sorted_menu_items, $this->_args);

        $this->_items .= walk_nav_menu_tree($this->_sorted_menu_items, $this->_args->depth, $this->_args);
        unset($this->_sorted_menu_items);

        // Attributes
        if (!empty($this->_args->menu_id))
            $this->_wrap_id = $this->_args->menu_id;
        else {
            $this->_wrap_id = 'menu-' . $this->_menu->slug;
            while (in_array($this->_wrap_id, $this->_menu_id_slugs)) {
                if (preg_match('#-(\d+)$#', $this->_wrap_id, $matches))
                    $this->_wrap_id = preg_replace('#-(\d+)$#', '-' . ++$matches[1], $this->_wrap_id);
                else
                    $this->_wrap_id = $this->_wrap_id . '-1';
            }
        }

        $this->_menu_id_slugs[] = $this->_wrap_id;
        $this->_wrap_class = $this->_args->menu_class ? $this->_args->menu_class : '';

        //Filter the HTML list content for navigation menus.
        $this->_items = apply_filters('wp_nav_menu_items', $this->_items, $this->_args);

        //Filter the HTML list content for a specific navigation menu.
        $this->_items = apply_filters("wp_nav_menu_{$this->_menu->slug}_items", $this->_items, $this->_args);

        // Don't print any markup if there are no items at this point.
        if (empty($this->_items)) return false;

        $this->_nav_menu .= sprintf($this->_args->items_wrap, esc_attr($this->_wrap_id), esc_attr($this->_wrap_class), $this->_items);
        unset($this->_items);

        if ($this->_show_container){
            if(!empty($this->_args->pre_element) && !empty($this->_args->after_element))
                $this->_nav_menu .= '</' . $this->_args->container . '>'. $this->_args->after_element;
            else
                $this->_nav_menu .= '</' . $this->_args->container . '>';
        }

        $this->_nav_menu = apply_filters('wp_nav_menu', $this->_nav_menu, $this->_args);

        if ($this->_args->echo){
            _e($this->_nav_menu);
            $this->_return = false;
        }else{
            $this->_return = $this->_nav_menu;
        }
        $this->_menu_output =  $this->_nav_menu;
        //$this->create_menu_file();
        return $this->_return;
    }

    public function menu_setup($args){
        return $this->_menu_setup($args);
    }

}