<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 9-6-2019
 * Time: 17:59
 */

namespace src\AssetsManager\Setups;

use src\AssetsManager\Container\ScriptDependencies;

class ScriptSetup extends ScriptDependencies //assets
{
    private $type_attr = '';
    public function __construct() {
        add_action( 'init', array( $this, 'assetsInit' ), 0 );

    }

    public function assetsInit() {
        if (
            function_exists( 'is_admin' ) && ! is_admin()
            &&
            function_exists( 'current_theme_supports' ) && ! current_theme_supports( 'html5', 'script' )
        ) {
            $this->type_attr = " type='text/javascript'";
        }
    }

    public function assets_print_scripts( $handles = false, $group = false ) {
        return $this->doItems( $handles, $group );
    }

    public function assets_print_scripts_l10n( $handle, $echo = true ) {
        return $this->print_extra_script( $handle, $echo );
    }

    public function print_extra_script( $handle, $echo = true ) {
        $output = $this->getData( $handle, 'data' );

        if ( ! $output )
            return false;


        if ( ! $echo )
            return $output;

        $this->_print_script = "<script $this->type_attr>\n"; //used by localize script

        if ( $this->type_attr )
            $this->_print_script .= "/* <![CDATA[ */\n";

        $this->_print_script .= "$output\n";

        if ( $this->type_attr )
            $this->_print_script .= "/* ]]> */\n";


        $this->_print_script .= "</script>\n";
        _e($this->_print_script);

        return true;
    }

    public function doItem( $handle, $group = false ) {
        if ( ! parent::doItem( $handle ) )
            return false;
            if ( 0 === $group && $this->groups[ $handle ] > 0 ):
                $this->in_footer[] = $handle;
            return false;
        endif;
        if ( false === $group && in_array( $handle, $this->in_footer, true ) )
            $this->in_footer = array_diff( $this->in_footer, (array) $handle );

        $this->_obj = $this->registered[ $handle ];

        if ( null === $this->_obj->ver )
            $ver = '';
        else
            $ver = $this->_obj->ver;

        if ( isset( $this->args[ $handle ] ) )
            $ver = $ver ? $ver . '&amp;' . $this->args[ $handle ] : $this->args[ $handle ];

        $this->_src = $this->_obj->src;

        $this->_type = $this->_obj->type;
        if($this->_type == 'ApplicationEcmaScript')
            $this->_type_attribute =  esc_attr(" type=application/ecmascript");
        elseif($this->_type == 'Module')
            $this->_type_attribute =  esc_attr(" type=module");
        elseif($this->_type == 'TextBabel')
            $this->_type_attribute =  esc_attr(" type=text/babel");
        elseif($this->_type == 'TextJavaScript')
            $this->_type_attribute =  esc_attr(" type=text/javascript");
        elseif($this->_type == 'TextJsx')
            $this->_type_attribute =  esc_attr(" type=text/jsx");
        else
            $this->_type_attribute = null;
        $this->_loading_type = $this->_obj->loading_type;
        if($this->_loading_type == "Async")
            $this->_loading_type_attribute = esc_attr(" async");
        elseif($this->_loading_type == "Defer")
            $this->_loading_type_attribute = esc_attr(" defer");
        else
            $this->_loading_type_attribute = null;
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

        $this->_additionals = $this->_obj->additionals; //todo change to extra_atts
        if(!empty($this->_additionals)){
            $additionals = implode(' ', $this->_additionals);
            $this->_additionals_attributes = esc_attr(" $additionals");
        }else
            $this->_additionals_attributes = null;

        $cond_before = $cond_after = '';
        $conditional = isset( $this->_obj->extra['conditional'] ) ? $this->_obj->extra['conditional'] : '';
        if ( $conditional ):
            $cond_before = "<!--[if {$conditional}]>\n";
            $cond_after  = "<![endif]-->\n";
        endif;
        $this->_before_handle = $this->assets_print_inline_script( $handle, 'before', false );
        $this->_after_handle  = $this->assets_print_inline_script( $handle, 'after', false );
        if ( $this->_before_handle )
            $this->_before_handle = sprintf( "<script>\n" . $this->_percent_s ."\n</script>\n", $this->_before_handle );
        if ( $this->_after_handle )
            $this->_after_handle = sprintf( "<script>\n" . $this->_percent_s ."\n</script>\n", $this->_after_handle );
        if ( $this->_before_handle || $this->_after_handle )
            $inline_script_tag = "{$cond_before}{$this->_before_handle}{$this->_after_handle}{$cond_after}";
         else
            $inline_script_tag = '';
        if ( $this->do_concat ):
            if (( $this->_before_handle || $this->_after_handle ) ):
                $this->do_concat = false;
                $this->_print_scripts($handle);
                $this->assets_reset();
            elseif ( ! $conditional ):
                $this->print_code     .= $this->assets_print_scripts_l10n( $handle, false );
                $this->concat         .= "$handle,";
                $this->ext_version .= "$handle$ver";
            else:
                $this->ext_handles .= "$handle,";
                $this->ext_version .= "$handle$ver";
            endif;
        endif;
        $has_conditional_data = $conditional && $this->getData( $handle, 'data' );
        if ( $has_conditional_data )
            echo $cond_before;
        $this->assets_print_scripts_l10n( $handle );
        if ( $has_conditional_data )
            echo $cond_after;
        if ( ! $this->_src ):
            if ( $inline_script_tag ):
                if ( $this->do_concat )
                    $this->print_html .= $inline_script_tag;
                else
                    echo $inline_script_tag;
            endif;
            return true;
        endif;
        $this->_translations = $this->assets_print_translations( $handle, false );
        if ( $this->_translations )
            $this->_translations = sprintf( "<script>\n" . $this->_percent_s ."\n</script>\n", $this->_translations );
        if ( ! preg_match( '|^(https?:)?//|', $this->_src ) && ! ( $this->content_url && 0 === strpos( $this->_src, $this->content_url ) ) )
            $this->_src = $this->base_url . $this->_src;
        if ( ! empty( $ver ) )
            $this->_src = add_query_arg( 'ver', $ver, $this->_src );
        $this->_src = esc_url( apply_filters( 'assets_script_loader_src', $this->_src, $handle ) );
        if ( ! $this->_src )
            return true;

        $this->_tag = "{$this->_translations}{$cond_before}{$this->_before_handle}<script $this->_type_attribute src='$this->_src' $this->_loading_type_attribute $this->_crossorigin_attribute  $this->_integrity_attribute $this->_additionals_attributes></script>\n{$this->_after_handle}{$cond_after}";
        $tag = apply_filters( 'assets_script_loader_tag', $this->_tag, $handle, $this->_src );

        if ( $this->do_concat )
            $this->print_html .= $tag;
        else
            echo $tag;
        return true;
    }

    public function assets_add_inline_script( $handle, $data, $position = 'after' ) {
        if ( ! $data )
            return false;
        if ( 'after' !== $position )
            $position = 'before';
        $script   = (array) $this->getData( $handle, $position );
        $script[] = $data;
        return $this->addData( $handle, $position, $script );
    }

    public function assets_print_inline_script( $handle, $position = 'after', $echo = true ) {
        $output = $this->getData( $handle, $position );
        if ( empty( $output ) )
            return false;
        $output = trim( implode( "\n", $output ), "\n" );
        if ( $echo )
            printf( "<script>\n$this->_percent_s\n</script>\n", $output ); //todo
        return $output;
    }

    public function assets_localize( $handle, $object_name, $l10n, $type ) {
        global $type_attribute;
        $this->_type = $type;
        if($this->_type == 'ApplicationEcmaScript')
            $this->_type_attribute =  esc_attr(" type=application/ecmascript");
        elseif($this->_type == 'Module')
            $this->_type_attribute =  esc_attr(" type=module");
        elseif($this->_type == 'TextBabel')
            $this->_type_attribute =  esc_attr(" type=text/babel");
        elseif($this->_type == 'TextJavaScript')
            $this->_type_attribute =  esc_attr(" type=text/javascript");
        elseif($this->_type == 'TextJsx')
            $this->_type_attribute =  esc_attr(" type=text/jsx");
        else
            $this->_type_attribute = null;
        $type_attribute = $this->_type_attribute;

        foreach ( (array) $l10n as $key => $value ):
            if ( ! is_scalar( $value ) )
                continue;
            $l10n[ $key ] = html_entity_decode( (string) $value, ENT_QUOTES, 'UTF-8' );
        endforeach;
        $script = "var $object_name = " . wp_json_encode( $l10n ) . ';';
        if ( ! empty( $after ) )
            $script .= "\n$after;";
        $data = $this->getData( $handle, 'data' );
        if ( ! empty( $data ) )
            $script = "$data\n$script";
        return $this->addData( $handle, 'data', $script );
    }

    public function set_assets_group( $handle, $recursion, $group = false ) {
        if ( isset( $this->registered[ $handle ]->args ) && $this->registered[ $handle ]->args === 1 )
            $grp = 1;
        else
            $grp = (int) $this->getData( $handle, 'group' );
        if ( false !== $group && $grp > $group )
            $grp = $group;
        return parent::setGroup( $handle, $recursion, $grp );
    }

    public function set_assets_translations( $handle, $domain = 'default', $path = null ) {
        if ( ! isset( $this->registered[ $handle ] ) )
            return false;
        $obj = $this->registered[ $handle ];
        if ( ! in_array( 'wp-i18n', $obj->deps, true ) )
            $obj->deps[] = 'wp-i18n';
        return $obj->_dependency->set_assets_translations( $domain, $path );
    }

    public function assets_print_translations( $handle, $echo = true ) {
        if ( ! isset( $this->registered[ $handle ] ) || empty( $this->registered[ $handle ]->textdomain ) )
            return false;
        $domain = $this->registered[ $handle ]->textdomain;
        $path   = $this->registered[ $handle ]->translations_path;
        $this->_json_translations = load_script_textdomain( $handle, $domain, $path );
        if ( ! $this->_json_translations )
            $this->_json_translations = '{ "locale_data": { "messages": { "": {} } } }';
        $output = <<<JS
( function( domain, translations ) {
	var localeData = translations.locale_data[ domain ] || translations.locale_data.messages;
	localeData[""].domain = domain;
	wp.i18n.setLocaleData( localeData, domain );
} )( "{$domain}", "{$this->_json_translations}" );
JS;
        if ( $echo )
            printf( "<script>\n" . $this->_percent_s ."\n</script>\n", $output );
        return $output;
    }

    public function allDeps( $handles, $recursion = false, $group = false ) {
        $r = parent::allDeps( $handles, $recursion, $group );
        if ( ! $recursion )
            $this->to_do = apply_filters( 'print_scripts_array', $this->to_do );
        return $r;
    }

    public function do_assets_head_items() {
        $this->doItems( false, 0 );
        return $this->done;
    }

    public function do_assets_footer_items() {
        $this->doItems( false, 1 );
        return $this->done;
    }

    protected function _print_scripts($handle = null){
        $this->_print_data = $this->getData( $handle, 'data' );
        $this->_print_script = "<script>\n";
        $this->_print_script .= "$this->_print_data\n";
        $this->_print_script .= "</script>\n";
        _e($this->_print_script);
    }

    public function assets_reset() {
        $this->do_concat      = false;
        $this->print_code     = '';
        $this->concat         = '';
        $this->print_html     = '';
        $this->ext_version    = '';
        $this->ext_handles    = '';
    }
}