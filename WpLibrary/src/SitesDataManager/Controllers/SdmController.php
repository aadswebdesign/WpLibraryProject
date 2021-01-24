<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-12-2020
 * Time: 19:15
 */
namespace src\SitesDataManager\Controllers;

use src\SitesDataManager\Factory\SdmVars;
use src\SitesDataManager\RestPoints\SdmRestPoint;
use src\SitesDataManager\Factory\SdmConsts;
class SdmController
{
    use SdmRestPoint;
    use SdmVars;

    public function __construct()
    {
        add_action('rest_api_init', array($this, 'registerRoutes'));
    }

    public function registerRoutes(){

        register_rest_route(SdmConsts::WP_V2, SdmConsts::SDM_SEPARATOR. SdmConsts::SDM_THEME_MANAGER, [
            [
                'methods'  => SdmConsts::SDM_POST_PUT_METHOD,
                'callback' => [$this, 'updateRestPointSiteData'],
                'permission_callback' => '__return_true',
                'args' =>[
                    'show_in_rest' => true
                ]
            ]
        ]);
        register_rest_route(SdmConsts::WP_V2, SdmConsts::SDM_SEPARATOR. SdmConsts::SDM_THEME_MANAGER, [
            [
                'methods'  => SdmConsts::SDM_GET_METHOD,
                'callback' => [$this, 'getRestPointSiteData'],
                'permission_callback' => '__return_true',
            ]
        ]);
    }
}