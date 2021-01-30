<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 30-11-2020
 * Time: 11:06
 */

use src\AssetsManager\Setups\LinksSetup;

function assets_links(){
    global $assets_links;
    if(!($assets_links instanceof LinksSetup ))
        $assets_links = new LinksSetup();
    return $assets_links;
}

function assets_print_styles( $handles = false ) {
    if ( '' === $handles )
        $handles = false;
    if ( ! $handles )
        do_action( 'assets_print_styles' );
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    global $assets_links;
    if ( ! ( $assets_links instanceof LinksSetup ) ):
        if ( ! $handles )
            return array();
    endif;
    return assets_links()->doItems( $handles );
}

function assets_add_inline_style( $handle, $data ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    if ( false !== stripos( $data, '</style>' ) ):
        _doing_it_wrong(
            __FUNCTION__,
            sprintf(
            /* translators: 1: <style>, 2: add_inline_style() */
                __( 'Do not pass %1$s tags to %2$s.' ),
                '<code>&lt;style&gt;</code>',
                '<code>assets_add_inline_style()</code>'
            ),
            '0.0.1'
        );
        $data = trim( preg_replace( '#<style[^>]*>(.*)</style>#is', '$1', $data ) );
    endif;
    return assets_links()->add_inline_style( $handle, $data );
}

// mode[0], handle[1], href[2], deps[3], ver[4], rel[5], type[6], as[7], media[8], crossorigin[9], integrity[10], importance[11], extra_atts[12]
function assets_register_link($mode= null, $handle, $href, $deps= [], $ver= false, $rel= null, $type= null, $as= null, $media= null, $crossorigin= null, $integrity= null, $importance= null, $extra_atts =null ){
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    return assets_links()->addAssets($mode, $handle, $href, $deps, $ver, $rel, $type, $as, $media, $crossorigin, $integrity, $importance, $extra_atts );
}

function assets_deregister_link( $handle ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    assets_links()->removeAssets( $handle );
}

// mode[0], handle[1], href[2], deps[3], ver[4], rel[5], type[6], as[7], media[8], crossorigin[9], integrity[10], importance[11], extra_atts[12]
function assets_enqueue_link($mode = null, $handle, $href = '', $deps = [], $ver = false, $rel= null, $type= null, $as= null, $media= null, $crossorigin= null, $integrity= null, $importance= null, $extra_atts =null){
    _assets_maybe_doing_it_wrong( __FUNCTION__ );

    $assets_links = assets_links();
    if ( $href ):
        $_handle = explode( '?', $handle );
        $assets_links->addAssets($mode, $_handle[0], $href, $deps, $ver, $rel, $type, $as, $media, $crossorigin, $integrity, $importance, $extra_atts );
    endif;
    $assets_links->enqueueAssets( $handle );
}

function assets_dequeue_link( $handle ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    assets_links()->dequeueAssets( $handle );
}

function link_style_is( $handle, $list = 'enqueued' ) {
    _assets_maybe_doing_it_wrong( __FUNCTION__ );
    return (bool) assets_links()->queryAssets( $handle, $list );
}

function assets_link_add_data( $handle, $key, $value ) {
    return assets_links()->addData( $handle, $key, $value );
}
