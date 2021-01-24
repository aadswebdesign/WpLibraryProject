<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 11:00
 */

namespace src\Core\Resources;


trait AfterThemeSetup
{


    protected function _after_theme_hooks()
    {
        add_action( 'after_setup_theme', array($this, 'AfterThemeSetup') );
    }

    /**
     * @Description: provide your custom settings for 'after_setup_theme' here
     */
    protected function _AfterThemeSetup(){
        add_filter('show_admin_bar', '__return_false');
        add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        add_theme_support( 'post-formats', array('aside', 'img', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat', 'section','svg' ) );
        add_theme_support( 'post-thumbnails');
        set_post_thumbnail_size( 150, 150, true );
    }

    public function AfterThemeSetup(){
        $this->_AfterThemeSetup();
    }



}