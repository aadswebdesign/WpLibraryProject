<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 30-11-2020
 * Time: 08:36
 */

namespace src\AssetsManager\Setups;


use src\AssetsManager\Container\LinkDependencies;

class LinksSetup extends LinkDependencies
{
    const LINK = '<link ';
    const LINK_CLOSE = ' />';
    public function doItem( $handle, $group = false ) {
        if ( ! parent::doItem( $handle ) )
            return false;

        $this->_obj = $this->registered[ $handle ];

        $this->_ver = $this->_obj->ver;

        if ( null === $this->_ver )
            $ver = '';
        else
            $ver = $this->_obj->ver;

        if ( isset( $this->args[ $handle ] ) )
            $this->_version = $ver ? $ver . '&amp;' . $this->args[ $handle ] : $this->args[ $handle ];


        $inline_style = $this->print_inline_style( $handle, false );

        if ( $inline_style )//todo
            $this->_inline_style_tag = sprintf( "<style id='%s-inline-css'>\n%s\n</style>\n", esc_attr( $handle ), $inline_style );
        else
            $this->_inline_style_tag = '';

        if ( $this->do_concat ):
                $this->do_concat = "$handle,";
                $this->ext_version .= "$handle$ver";
                $this->print_code .= $inline_style;
                return true;
        endif;

        $this->_href = $this->_obj->href;
        if ( ! $this->_href ){
            if ( $this->_inline_style_tag ){
                if ( $this->do_concat )
                    $this->print_html .= $this->_inline_style_tag;
                else
                    echo $this->_inline_style_tag;
            }
            return true;
        }


        $this->_mode = $this->_obj->mode;
        if(!empty($this->_mode))
            $this->_mode_value = $this->_mode;
        else
            $this->_mode_value = "stylesheet";

        $this->_type = $this->_obj->type;
        if(!empty($this->_type))
            $this->_type_attribute = esc_attr(" type=$this->_type");
        else
            $this->_type_attribute = null;

        $this->_as = $this->_obj->as;
        if(!empty($this->_as)){
            $as_value = implode(',', $this->_as);
            $this->_as_attribute = esc_attr(" as=$as_value");
        }else
            $this->_as_attribute = null;

        $this->_media = $this->_obj->media;
        if(!empty($this->_media)){
            $media_value = implode('', $this->_media);
            $this->_media_attribute = esc_attr(" media=$media_value");
        }else
            $this->_media_attribute = null;

        $this->_crossorigin =  $this->_obj->crossorigin;
        if($this->_crossorigin == 'UseCredentials')
            $this->_crossorigin_attribute =  esc_attr(" crossorigin=use-credentials");
        elseif($this->_crossorigin == 'Anonymous')
            $this->_crossorigin_attribute =  esc_attr(" crossorigin=anonymous");
        else
            $this->_crossorigin_attribute = null;

        $this->_integrity = $this->_obj->integrity;
        if(!empty($this->_integrity))
            $this->_integrity_attribute =  esc_attr(" integrity=$this->_integrity");
        else
            $this->_integrity_attribute = null;

        $this->_importance =  $this->_obj->importance;
        if($this->_importance == 'High')
            $this->_importance_attribute = esc_attr(" importance=high");
        elseif($this->_importance == 'Low')
            $this->_importance_attribute = esc_attr(" importance=low");
        else
            $this->_importance_attribute = null;

        $this->_extra_atts = $this->_obj->extra_atts;
        if(!empty($this->_extra_atts)){
            $extra_atts_value = implode(' ', $this->_extra_atts);
            $this->_extra_atts_attribute = esc_attr(" $extra_atts_value");
        }else
            $this->_extra_atts_attribute = null;


        $this->_rel = $this->_obj->rel;
        if(!empty($this->_rel)){
            $rel_value = implode(' ', $this->_rel );
            $this->_rel_attribute = esc_attr(" rel=$rel_value");
        }
        else
            $this->_rel_attribute = esc_attr(" rel=stylesheet");

        $this->_link = $this->_link_href( $this->_href, $ver, $handle );
        if ( ! $this->_link )
            return true;
        $this->_tag = self::LINK . "$this->_rel_attribute id='" . $handle . "_" . $this->_mode ."'  href='$this->_link' $this->_type_attribute $this->_as_attribute $this->_media_attribute $this->_crossorigin_attribute $this->_integrity_attribute $this->_importance_attribute $this->_extra_atts_attribute" . self::LINK_CLOSE ."\n"; //todo let see?
        $this->_tag_apply = apply_filters('link_loader_tag', $this->_tag, $this->_rel_attribute, $handle, $this->_mode, $this->_link, $this->_type_attribute, $this->_as_attribute, $this->_media_attribute, $this->_crossorigin_attribute, $this->_integrity_attribute, $this->_importance_attribute, $this->_extra_atts_attribute);

        if ( $this->do_concat ){
            $this->print_html .= $this->_tag_apply;
            if ( $this->_inline_style_tag )
                $this->print_html .= $this->_inline_style_tag;
        }else{
            echo $this->_tag_apply;
            $this->print_inline_style( $handle );
        }
        return true;
    }

    public function add_inline_style( $handle, $code ) {
        if ( ! $code )
            return false;
        $after = $this->getData( $handle, 'after' );
        if ( ! $after )
            $after = array();
        $after[] = $code;
        return $this->addData( $handle, 'after', $after );
    }


    public function print_inline_style( $handle, $echo = true){
        $output = $this->getData( $handle, 'after' );
        if ( empty( $output ) )
            return false;
        $output = implode( "\n", $output );
        if ( ! $echo )
            return $output;
        printf( "<style id='%s-inline-css'>\n%s\n</style>\n", esc_attr( $handle ), $output );
        return true;
    }

    public function allDeps( $handles, $recursion = false, $group = false ) {
        $r = parent::allDeps( $handles, $recursion, $group );
        if ( ! $recursion )
            $this->to_do = apply_filters( 'print_styles_array', $this->to_do );
        return $r;
    }

    protected function _link_href( $href, $ver, $handle ) {
        if ( ! is_bool( $href ) && ! preg_match( '|^(https?:)?//|', $href ) && ! ( $this->content_url && 0 === strpos( $href, $this->content_url ) ) )
            $href = $this->base_url . $href;
        if ( ! empty( $ver ) )
            $href = add_query_arg( 'ver', $ver, $href );
        $href = apply_filters( 'assets_link_loader_href', $href, $handle );
        return esc_url( $href );
    }

    public function do_link_items(){
        $this->doItems( false, 0 );
        return $this->done;
    }

    public function links_reset() {
        $this->do_concat      = false;
        $this->print_code     = '';
        $this->concat         = '';
        $this->print_html     = '';
        $this->ext_version    = '';
        $this->ext_handles    = '';
    }

}