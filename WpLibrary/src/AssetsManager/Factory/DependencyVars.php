<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 28-11-2020
 * Time: 06:49
 */

namespace src\AssetsManager\Factory;


trait DependencyVars
{
    public
        $additionals = [], //todo deprecate
        $args = [],
        $as = [], //audio, document, embed, *fetch, font, image, object, script, style, track, video, worker
        $canonical = false,
        $crossorigin = null, //anonymous, use-credentials
        $disabled = false,
        $dns_prefetch = false,
        $deps = [],
        $extra = [],
        $extra_atts = [],
        $group = 0,
        $handle,
        $href,
        $href_lang,
        $image_sizes,
        $image_src_set,
        $importance = null,
        $integrity = null,
        $loading_type = null,
        $ltr, //todo implementing in CssLinkDependency
        $media = [],
        $mode,
        $prefetch,
        $referrer_policy,
        $rel = [], //stylesheet, icon, apple-touch-icon-precomposed, prefetch, preload
        $src,
        //$sizes, nowhere supported
        $style,
        $suffix,
        $title,
        $type = null,
        $ver = false; //todo lookup

    protected
        $_name,
        $_textdomain,
        $_translations_path;
}