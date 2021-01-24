<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 21-11-2020
 * Time: 21:31
 */

namespace src\Core\Wp;
use src\AssetsManager\Setups\ScriptSetup;
use src\AssetsManager\Setups\LinksSetup;


class WpAssetsLoader
{
    /**
     * WpAssetsLoader constructor.
     */
    public function __construct()
    {
        $this->_loader_hooks();

        if(LIB){
            require(LIB . 'src/AssetsManager/Functions/scripts.php');
            require(LIB . 'src/AssetsManager/Functions/links.php');
        }
    }

    protected function _loader_hooks(){
        add_action('wp_head', array($this,'enqueue_assets'), 1);
        add_action('wp_head', array($this,'print_links'), 2);
        add_action('wp_head', array($this,'assets_print_head_scripts'), 9);
        add_action('print_links', array($this,'print_links_base'));
        add_action('assets_footer', array($this,'assets_print_footer_scripts'), 20);
        add_action('assets_print_footer_scripts', array($this,'footer_assets'));
    }

    public function enqueue_assets() {
        do_action( 'enqueue_assets' );
    }

    // SCRIPTS SECTION
    public function print_head_scripts_base() {
        global  $concatenate_scripts; // awd_todo
        if ( ! did_action( 'assets_print_head_scripts' ) )
            do_action( 'assets_print_head_scripts' );
        $assets_scripts = assets_scripts();
        $this->assets_concat_settings();
        $assets_scripts->assets_do_concat = $concatenate_scripts;
        $assets_scripts->do_assets_head_items();
        $assets_scripts->assets_reset();
        return $assets_scripts->done;
    }

    public function print_footer_scripts_base() {
        global $assets_scripts, $concatenate_scripts;
        if(!($assets_scripts instanceof ScriptSetup))
            return array();
        $this->assets_concat_settings();
        $assets_scripts->assets_do_concat = $concatenate_scripts;
        $assets_scripts->do_assets_footer_items();
        $assets_scripts->assets_reset();
        return $assets_scripts->done;
    }

    public function assets_print_head_scripts() {
        if ( ! did_action( 'assets_print_head_scripts' ) )
            do_action( 'assets_print_head_scripts' );
        global $assets_scripts;
        if(!($assets_scripts instanceof ScriptSetup))
            return array();
        return $this->print_head_scripts_base();
    }

    public function footer_assets() {
        $this->print_footer_scripts_base();
    }

    public function assets_print_footer_scripts() {
        do_action( 'assets_print_footer_scripts' );
    }

    // STYLES SECTION
    public function print_links(){
        do_action( 'print_links');
    }

    public function print_links_base(){
        global $assets_links, $concatenate_scripts;
        if ( ! ( $assets_links instanceof LinksSetup ) )
            return false;
        $this->assets_concat_settings();
        $assets_links->assets_do_concat = $concatenate_scripts;
        $assets_links->do_link_items();
        $assets_links->links_reset();
        return $assets_links->done;
    }

    /**
     * @description Compressing of assets
     */
    public function assets_concat_settings() {
        global $concatenate_scripts, $compress_scripts, $compress_css;
        $compressed_output = ( ini_get( 'zlib.output_compression' ) || 'ob_gzhandler' == ini_get( 'output_handler' ) );
        if ( ! isset( $concatenate_scripts ) ):
            $concatenate_scripts = defined( 'CONCATENATE_SCRIPTS' ) ? CONCATENATE_SCRIPTS : true;
            if ( ( ! is_admin() && ! did_action( 'login_init' ) ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) )
                $concatenate_scripts = false;
        endif;
        if ( ! isset( $compress_scripts ) ):
            $compress_scripts = defined( 'COMPRESS_SCRIPTS' ) ? COMPRESS_SCRIPTS : true;
            if ( $compress_scripts && ( ! get_site_option( 'can_compress_scripts' ) || $compressed_output ) )
                $compress_scripts = false;
        endif;
        if ( ! isset( $compress_css ) ):
            $compress_css = defined( 'COMPRESS_CSS' ) ? COMPRESS_CSS : true;
            if ( $compress_css && ( ! get_site_option( 'can_compress_scripts' ) || $compressed_output ) )
                $compress_css = false;
        endif;
    }








}