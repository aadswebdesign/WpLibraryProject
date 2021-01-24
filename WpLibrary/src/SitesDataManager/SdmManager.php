<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-12-2020
 * Time: 19:11
 */

namespace src\SitesDataManager;


use src\SitesDataManager\Controllers\SdmController;

class SdmManager
{

    /**
     * SdmManager constructor.
     */
    public function __construct()
    {
        new SdmController();
    }
}