<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-6-2019
 * Time: 22:37
 */

//I:\awd\htdocs\var\www\aadswebdesign\private_html\wp-content\themes\AwdLibrary\src\AwdScriptsAndStyles\Scripts\ScriptSetup.php
use src\AssetsManager\Setups\ScriptSetup;

function assets_scripts(){
    global $assets_scripts;
    if(!($assets_scripts instanceof ScriptSetup))
        $assets_scripts = new ScriptSetup;
    return $assets_scripts;
}

function _assets_maybe_doing_it_wrong( $function ) {
    if( did_action( 'init' ) || did_action( 'admin_enqueue_scripts' ) || did_action( 'enqueue_assets' )) // || did_action( 'admin_enqueue_scripts' )
        return;
    _doing_it_wrong(
        $function,
        sprintf(
            __( 'Scripts and styles should not be registered or enqueued until the %1$s hooks.'),
            '<code>enqueue_head_assets</code>'
        ),
        '3.3.0'
    );
}

function assets_print_scripts( $handles = false ) {
    do_action( 'assets_print_head_scripts' );
    if ( '' === $handles )// for wp_head
        $handles = false;
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    global $assets_scripts;
    if(!($assets_scripts instanceof ScriptSetup)):
        if ( ! $handles )
            return array();
    endif;
    return assets_scripts()->doItems( $handles );
}

function assets_add_inline_script( $handle, $data, $position = 'after' ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    if ( false !== stripos( $data, '</script>' ) ):
        _doing_it_wrong(
            __FUNCTION__,
            sprintf(
            /* translators: 1: <script>, 2: awd_add_inline_script() */
                __( 'Do not pass %1$s tags to %2$s.' ),
                '<code>&lt;script&gt;</code>',
                '<code>assets_add_inline_script()</code>'
            ),
            '0.0.1'
        );
    endif;
    $data = trim( preg_replace( '#<script[^>]*>(.*)</script>#is', '$1', $data ) );
    return assets_scripts()->assets_add_inline_script( $handle, $data, $position );
}

function assets_register_script( $handle, $src, $deps = array(), $ver = false, $type = null, $loading_type = null, $crossorigin = null, $integrity = null, $additionals = null, $in_footer = false ) {
    $assets_scripts = assets_scripts();
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    $registered = $assets_scripts->addAssets( $handle, $src, $deps, $ver, $type, $loading_type, $crossorigin, $integrity, $additionals, $in_footer);
    if ( $loading_type && $in_footer )
        $assets_scripts->addData( $handle, 'group', 0 );
    elseif($in_footer)
        $assets_scripts->addData( $handle, 'group', 1 );
    return $registered;
}

function assets_localize_script( $handle, $object_name, $l10n, $type = null ) {
    global $assets_scripts;
    $scripts_l10n_type = $type;
    if(!($assets_scripts instanceof ScriptSetup)):
        _assets_maybe_doing_it_wrong( __FUNCTION__ );
        return false;
    endif;
    return $assets_scripts->assets_localize( $handle, $object_name, $l10n, $scripts_l10n_type );
}

function assets_set_script_translations( $handle, $domain = 'default', $path = null ) {
    global $assets_scripts;
    if(!($assets_scripts instanceof ScriptSetup)):
        _assets_maybe_doing_it_wrong( __FUNCTION__ );
        return false;
    endif;
    return $assets_scripts->set_assets_translations( $handle, $domain, $path );
}

function assets_deregister_script( $handle ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    assets_scripts()->removeAssets( $handle );
}

function assets_enqueue_script( $handle, $src = '', $deps = array(), $ver = false, $type = null, $loading_type = null, $crossorigin = null, $integrity = null, $additionals = null, $in_footer = false ) {
    $assets_scripts = assets_scripts();
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    if($type == 'Module') {
        $message = "<script>console.log(`If you want to work with 'js' modules? Use 'assets_register_scripts' for all of them \"your main module too!\" and use 'assets_enqueue_script' for your main module (let say 'index.js')! `)</script>";
        _e($message);
        return;
    }

    if ( $src || $in_footer ):
        $_handle = explode( '?', $handle );
        if ( $src ){
            $assets_scripts->addAssets( $_handle[0], $src, $deps, $ver, $type, $loading_type, $crossorigin, $integrity, $additionals, $in_footer );
        }
        if ( $loading_type && $in_footer )
            $assets_scripts->addData( $_handle[0], 'group', 0 );
        elseif($in_footer)
            $assets_scripts->addData( $_handle[0], 'group', 1 );
    endif;
    $assets_scripts->enqueueAssets($handle);
}

function assets_dequeue_script( $handle ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    assets_scripts()->dequeueAssets($handle);
}

function assets_script_is( $handle, $list = 'assets_enqueued' ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    return (bool) assets_scripts()->queryAssets($handle, $list);
}

function assets_script_add_data( $handle, $key, $value ) {
    return assets_scripts()->addData( $handle, $key, $value );
}
