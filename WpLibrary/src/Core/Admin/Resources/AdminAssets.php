<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 17-1-2021
 * Time: 14:25
 */

namespace src\Core\Admin\Resources;

trait AdminAssets
{
    public $_class;
    protected function _admin_assets_hooks(){
        add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
        //todo pass this to an other file
        add_filter( 'admin_body_class', array($this, 'admin_body_class'), 10, 1 );

    }

    protected function _admin_scripts(){
        //wp_enqueue_script('');
    }
    protected function _admin_styles(){
        wp_enqueue_style('admin-styles-css', ASSETS_ADMIN_URI. 'styles/admin-styles.css', [], '0.01');
    }

    public function admin_assets(){
            $this->_admin_scripts();
            $this->_admin_styles();
    }
    protected function _admin_body_class(){
        $this->_class = ' awd-admin-body ';
        return $this->_class;
    }

    public function admin_body_class(){
        return $this->_admin_body_class();
    }

}
