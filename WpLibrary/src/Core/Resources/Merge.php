<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 11:03
 */

namespace src\Core\Resources;
use src\Core\Admin\Resourses\Admin_Assets;
use src\Factory\Definitions;


class Merge
{
    use Definitions;
    use AfterThemeSetup;
    use Assets;
    use Data;
    use Functions;
    use Menus;
    use Admin_Assets;

    /**
     * Merge constructor.
     */
    public function __construct()
    {
        $this->_definitions();
        $this->_functions_hooks();
        $this->_after_theme_hooks();
        $this->_assets_hooks();
        $this->_data_hooks();
        $this->_menus_hooks();
        $this->_admin_assets_hooks();
    }
}