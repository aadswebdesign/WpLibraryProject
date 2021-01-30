<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 10:50
 */

namespace src\Core;

use src\Core\Resources\Merge;
use src\Core\Wp\WpAssetsLoader;


use src\Factory\Definitions;
use src\SitesDataManager\SdmManager;

class Core extends Merge
{
 use Definitions;
    /**
     * Core constructor.
     */
    public function __construct()
    {

        parent::__construct();
        new WpAssetsLoader();
        new SdmManager();


    }
}