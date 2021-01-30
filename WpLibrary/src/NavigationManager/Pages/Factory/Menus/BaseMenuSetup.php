<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 12:15
 */

namespace src\NavigationManager\Pages\Factory\Menus;


trait BaseMenuSetup
{
    protected
        $_args,
        $_lib_defaults,
        $_defaults,
        $_items,
        $_menu,
        $_menu_id_slugs = [],
        $_menu_items,
        $_menu_output,
        $_nav_menu,
        $_percent_1 = '%1$s',
        $_percent_2 = '%2$s',
        $_percent_3 = '%3$s',
        $_show_container = false,
        $_sorted_menu_items,
        $_return,
        $_wrap_class,
        $_wrap_id;



    protected function _defaults(){
        $this->_lib_defaults = [
            'a_active_additional_atts' => '',
            'a_active_classes' => 'a-link a-link-active',
            'a_active_prefix' => 'active_',
            'a_nonactive_additional_atts' => '',
            'a_nonactive_classes' => 'a-link a-link-non-active',
            'a_nonactive_prefix' => 'nonactive_',
            'after_element',
            'create_menu_file' => false,
            'i_active_id' => '',
            'i_nonactive_id' => '',
            'menu_spacer' =>'',
            'menu_item_class' => 'menu-item relative',
            'menu_item_id' => 'menu_item',
            'menu_item_inner_class' => ' relative',
            'menu_item_inner_id' => 'inner_menu_item',
            'pre_element' => '',
            'prefix' => 'theme_name',
            'set_menu_name' => 'menu',
            'set_menu_path' => 'themes/menu_files/',
            'ul_sub_menu_class' => 'sub-menu relative',
            'ul_sub_menu_id' => 'ul_main_site'
        ];
        $this->_defaults = [
            'after' => '',
            'before' => '',
            'container' => 'nav',
            'container_class' => '',
            'container_id' => '',
            'container_role' => '',
            'container_style' => '',
            'container_style_value' => 0,
            'depth' => 0,
            'echo' => false,
            'fallback_cb' => 'awd_page_menu',
            'items_wrap' => "<ul id='" . $this->_percent_1 . "' class='" . $this->_percent_2 . "'>" . $this->_percent_3 . "</ul>", //'<ul id="%1$s" class="%2$s">%3$s</ul>'
            'link_before' => '',
            'link_after' => '',
            'media' => '',
            'menu' => '',
            'menu_class' => 'menu relative',
            'menu_id' => 'primair_menu',
            'theme_location' => '',
            'walker' => '',
        ];
        return array_merge($this->_defaults, $this->_lib_defaults);
    }

    /**
     * @return mixed
     */
    public function getMenuOutput()
    {
        return $this->_menu_output;
    }

    public function create_menu_file(){
        if($this->_args->create_menu_file == true){
            $menu_data = $this->getMenuOutput();
            $menu_create_file = ASSETS . $this->_args->set_menu_path . $this->_args->set_menu_name . ".txt";
            if(!file_exists(ASSETS . $this->_args->set_menu_path))
                mkdir(ASSETS .  $this->_args->set_menu_path, 0, true );
            if(!is_file($menu_create_file))
                fopen($menu_create_file, 'a+');
            file_put_contents($menu_create_file, $menu_data, 1);
        }
        //todo adding/creating an option field that is fetchable by the rest-api
    }
}