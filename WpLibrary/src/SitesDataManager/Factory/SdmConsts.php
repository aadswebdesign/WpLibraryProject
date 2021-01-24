<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-12-2020
 * Time: 19:09
 */

namespace src\SitesDataManager\Factory;


class SdmConsts
{

    //SDM METHODS
    const SDM_CRUD_METHODS = 'GET, POST, PUT, PATCH, DELETE';
    const SDM_DELETE_METHOD = 'DELETE';
    const SDM_GET_METHOD = 'GET';
    const SDM_POST_METHOD = 'POST';
    const SDM_POST_PUT_METHOD = 'POST, PUT';
    const SDM_PUT_METHOD = 'PUT';
    const SDM_UPDATE_METHOD = 'POST, PUT, PATCH';

    //SDM REST ROUTE
    const SDM_SEPARATOR = '/';
    const SDM_SITEURL = 'siteurl';

    //SDM SPECIFICS
    const SDM_SITE_DATA = 'site_data';
    const SDM_THEME_DATA = 'theme_data';
    const SDM_THEME_MANAGER = 'theme_manager';
    const SDM_THEME_NAME = 'theme_name';


    //WP SPECIFICS
    const WP_V2 = 'wp/v2';












}