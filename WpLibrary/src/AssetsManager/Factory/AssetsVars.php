<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 12-6-2019
 * Time: 19:20
 */

namespace src\AssetsManager\Factory;


trait AssetsVars
{

    /**
     * @var array
     * @description used in the Dependencies classes
     */
    public
        $additionals = [],
        $args = [],
        $as = [], //audio, document, embed, *fetch, font, image, object, script, style, track, video, worker
        $canonical = false,
        $crossorigin,
        $deps = [],
        $disabled = false,
        $dns_prefetch = false,
        $done = [],
        $extra_atts =[],
        $groups = [],
        $handle,
        $href,
        $href_lang,
        $image_sizes,
        $image_src_set,
        $importance,
        $integrity,
        $loading_type,
        $ltr,
        $media,
        $mode,
        $prefetch,
        $queue = [],
        $referrer_policy,
        $registered = [],
        $rel,
        $src,
        //$sizes, nowhere supported
        $style,
        $suffix, //text/css, font/woff2, image/png
        $title,
        $to_do = [],
        $type,
        $ver = false;

    /**
     * @var array
     * @description used in ScriptSetup class
     */
    public
        $base_url,
        $concat = '',
        $content_url,
        $default_dirs,
        $default_version,
        $do_concat = false,
        $ext_handles = '',
        $ext_version = '',
        $in_footer = [],
        $print_code = '',
        $print_html = '',
        $text_direction = 'ltr';

    protected
        $_additionals,
        $_additionals_attributes,
        $_after_handle,
        $_as,
        $_as_attribute,
        $_async,
        $_async_attribute,
        $_before_handle,
        $_crossorigin,
        $_crossorigin_attribute,
        $_dependency,
        $_deps = [],
        $_extra_atts,
        $_extra_atts_attribute,
        $_group,
        $_handle,
        $_handles,
        $_href,
        $_id,
        $_importance,
        $_importance_attribute,
        $_inline_style_tag,
        $_integrity,
        $_integrity_attribute,
        $_json_translations,
        $_key,
        $_link,
        $_loading_type,
        $_loading_type_attribute,
        $_media,
        $_media_attribute,
        $_mode,
        $_mode_value,
        $_obj,
        $_print_data,
        $_print_script = '',
        $_percent_s = "%s",
        $_queue,
        $_rel,
        $_rel_attribute,
        $_return,
        $_recursion,
        $_rtl,
        $_rtl_tag,
        $_src,
        $_style,
        $_style_attribute,
        $_suffix,
        $_tag,
        $_tag_apply,
        $_title,
        $_title_attribute,
        $_translations,
        $_type,
        $_type_attribute,
        $_value,
        $_ver,
        $_version;



}