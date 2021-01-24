<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 15-11-2020
 * Time: 09:56
 */

namespace src\Factory;


trait Definitions
{

    /**
     * Definitions constructor.
     */
    protected function _definitions()
    {
        //relative based
        if(!defined('LIB'))
            define( 'LIB', TEMPLATEPATH . '/../WpLibrary/');
        if(!defined('ASSETS'))
            define( 'ASSETS', LIB . 'assets/');
        if(!defined('ASSETS_ADMIN'))
            define('ASSETS_ADMIN', ASSETS .'admin/');
        if(!defined('ASSETS_CORE'))
            define('ASSETS_CORE', ASSETS .'core/');
        if(!defined('ASSETS_LIBS'))
            define('ASSETS_LIBS', ASSETS .'libs/');
        if(!defined('ASSETS_THEMES'))
            define('ASSETS_THEMES', ASSETS .'themes/');
        //url based
        if(!defined('LIB_ASSETS_URI'))
            define('ASSETS_URI', get_template_directory_uri() .'/../WpLibrary/assets/');
        if(!defined('ASSETS_ADMIN_URI'))
            define('ASSETS_ADMIN_URI', ASSETS_URI .'admin/');
        if(!defined('ASSETS_CORE_URI'))
            define('ASSETS_CORE_URI', ASSETS_URI .'core/');
        if(!defined('ASSETS_LIBS_URI'))
            define('ASSETS_LIBS_URI', ASSETS_URI .'libs/');
        if(!defined('ASSETS_THEMES_URI'))
            define('ASSETS_THEMES_URI', ASSETS_URI .'themes/');
    }
}