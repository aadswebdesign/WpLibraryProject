<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 14-11-2020
 * Time: 11:01
 */

namespace src\Core\Resources;


use src\Helpers\BrowserHelper;
use src\Helpers\MetaHelper;

trait Assets
{

    protected $_meta_field, $_meta_fields = [];


    /**
     * @description: Your core enqueue scripts and styles here!
     * @note: base scripts and styles for use in any theme!
     * @note: For this I've created my own enqueue system and will be implemented at a later stage! That package supports things like 'type=module' and many more options/attributes.
     */
    protected function _assets_hooks(){
        //$this->_browser['ipad'] = new BrowserHelper();
        //$this->_browser['iphone'] = new BrowserHelper();
        //$this->_browser['android'] = new BrowserHelper();


        //add_action('enqueue_assets', [$this, 'assets']);
        //add_action('wp_enqueue_scripts', array($this, 'wp_assets'));
        //add_action('add_meta', [$this, 'add_meta']);
        if (!is_admin()):
            //remove_action('wp_head', 'print_emoji_detection_script', 7);
            //remove_action('wp_print_styles', 'print_emoji_styles');
        endif;
        //var_dump('_assets_hooks');
    }

    protected function _scripts(){
        //assets_register_script('turbo_link_js', ASSETS_LIBS_URI . 'turbo_link/turbolinks.js', array(), '0.01', '', false );
    }

    protected function _links(){
        // mode[0], handle[1], href[2], (array)deps[3], ver[4], (array)rel[5], type[6], (array)as[7], (array)media[8], crossorigin[9], integrity[10], importance[11], (array)extra_atts[12]
        //assets_register_link('css','core-styles',  ASSETS_CORE_URI . 'styles/core-styles.css', [], '0.01' , ['stylesheet']);
    }

    public function add_meta(){
        //$this->_meta_fields['viewport'] = new MetaHelper(__('name'),__('viewport'), __('width=device-width, initial-scale=1'));
        //if($this->_browser['ipad']->IsPlatform(__('iPad'))){
            //$this->_meta_fields['viewport'] = new MetaHelper(__('name'),__('viewport'), __('width=device-width, initial-scale=0.7, maximum-scale=0.7'));
        //}
        //if($this->_browser['iphone']->IsPlatform(__('iPhone'))){
            //$this->_meta_fields['viewport'] = new MetaHelper(__('name'),__('viewport'), __('width=device-width, initial-scale=0.7'));
        //}
        //if($this->_browser['android']->IsPlatform(__('Android'))){
            //$this->_meta_fields['viewport'] = new MetaHelper(__('name'),__('viewport'), __('width=device-width, initial-scale=1.0'));
        //}
        //$this->_meta_field = implode('', $this->_meta_fields);
        //_e($this->_meta_field);
    }

    public function assets(){
        $this->_links();
        $this->_scripts();
    }

    protected function _wp_scripts(){
        //wp_enqueue_script('test-js', get_template_directory_uri() . '/../WpLibrary/assets/scripts/test.js', array(), '0.01' , false );
        if (!is_admin()):
            wp_deregister_script('wp-embed');
            wp_dequeue_style( 'wp-block-library' );
           wp_dequeue_style( 'wp-block-library-theme' );
        endif;
    }
    protected function _wp_styles(){

    }

    public function wp_assets(){
        $this->_wp_styles();
        $this->_wp_scripts();

    }



}