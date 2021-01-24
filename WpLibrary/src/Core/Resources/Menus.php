<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 6-12-2020
 * Time: 14:39
 */

namespace src\Core\Resources;


use src\Core\View\Menus\Themes\mainTheme\PrimaryMenu;

trait Menus
{
    protected $_menu;
    protected function _menus_hooks(){
        add_action('after_setup_theme', array($this, 'navigation_menus'));
    }

    protected function _primary_menu(){
        $this->_menu = new PrimaryMenu();
        return $this->_menu;
    }

    public function primary_menu(){
        return $this->_primary_menu();
    }

    protected function _navigation_menus(){
        register_nav_menus(
            array(
                'main_theme_primary_menu' => 'PrimaryMenu'
            )
        );
    }

    public function navigation_menus(){
        $this->_navigation_menus();
    }
}