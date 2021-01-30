<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 31-12-2020
 * Time: 16:34
 */

namespace src\SitesDataManager\Factory;


class SdmSiteData
{
    use SdmVars;
    use SdmFormatting;
    public function __construct()
    {
        global $wpdb;
        $this->_wp_db = $wpdb;
        $this->_table_connect = "{$this->_wp_db->prefix}site_data";
    }

    protected function _load_all_items($force_cache = false){
        $this->_force_cache = $force_cache;
        if(! is_multisite())
            $this->_all_items = wp_cache_get('all_site_data_items', 'site_data_items', $this->_force_cache);
        else
            $this->_all_items = false;
        if(! $this->_all_items){
            $this->_suppress = $this->_wp_db->suppress_errors();
            $this->_all_items = $this->_wp_db->get_results("SELECT data_name, data_value, data_date FROM  $this->_table_connect WHERE autoload = 'yes'");
            if(! $this->_all_items_db)
                $this->_all_items_db = $this->_wp_db->get_results("SELECT data_name, data_value, data_date FROM  $this->_table_connect");
            $this->_wp_db->suppress_errors($this->_suppress);
            foreach((array)$this->_all_items_db as $o)
                $this->_all_items[$o->data_name]  = $o->data_value;
            if(! is_multisite()){
                $this->_all_items = apply_filters('pre_cache_all_items', $this->_all_items);
                wp_cache_add('all_site_data_items', $this->_all_items, 'site_data_items');
            }
        }
        return apply_filters('all_site_data_items', $this->_all_items);
    }

    protected function _get_site_item($item ){

        $this->_item = trim($item);
        if(empty($this->_item))
            return false;
        $this->_pre = apply_filters("pre_site_data_item_{$this->_item}", false, $this->_item);
        if (false !== $this->_pre)
            return $this->_pre;
        $this->_no_items = wp_cache_get('no_site_data_items', 'site_data_items');
        $this->_all_items = $this->_load_all_items();
        if(isset($this->_all_items[$this->_item]))
            $this->_value = $this->_all_items[$this->_item];
        else{
            $this->_value = wp_cache_get($this->_item, 'site_data_items');
            if(false === $this->_value){
                $this->_row = $this->_wp_db->get_row($this->_wp_db->prepare("SELECT data_value FROM $this->_table_connect WHERE data_name = %s LIMIT 1", $this->_item));
                if ( is_object( $this->_row ) ){
                    $this->_value = $this->_row->data_value;
                    wp_cache_add($this->_item, $this->_value, 'site_data_items');
                }else{
                    if(! is_array($this->_no_items))
                        $this->_no_items = [];
                    $this->_no_items[$this->_item] = true;
                    wp_cache_set( 'no_site_data_items', $this->_no_items, 'site_data_items' );
                }
            }
        }
        $this->_suppress = $this->_wp_db->suppress_errors();
        $this->_row = $this->_wp_db->get_row($this->_wp_db->prepare("SELECT data_value FROM $this->_table_connect WHERE data_name = %s LIMIT 1", $this->_item));
        $this->_wp_db->suppress_errors( $this->_suppress );
        if ( is_object( $this->_row ) )
            $this->_value = $this->_row->data_value;
        return apply_filters("site_data_item_{$this->_item}", maybe_unserialize( $this->_value ), $this->_item);
    }

    public function get_site_item($item){
        return $this->_get_site_item($item);
    }

    protected function _update_site_item($item, $value, $autoload = null){
        $this->_data_date = date("Y-m-d H:i:s");
        $this->_autoload = $autoload;
        //todo lookup
        $this->_value = $value;
        $this->_item = trim($item);
        if(empty($this->_item))
            return false;
        if ( is_object( $this->_value ) )
            $this->_value = clone $this->_value;
        $this->_value = $this->__sanitize_site_data($this->_item, $value);
        $this->_old_value = $this->_get_site_item($this->_item);
        $this->_value = apply_filters( "pre_update_site_data_item_{$this->_item}", $value, $this->_old_value, $this->_item );
        if ( $this->_value === $this->_old_value || maybe_serialize( $this->_value ) === maybe_serialize( $this->_old_value ) )
            return false;
        if ( apply_filters( "default_site_data_item_{$this->_item}", false, $this->_item, false ) === $this->_old_value ) {
            if(null === $this->_autoload)
                $this->_autoload = 'yes';
            return $this->_add_site_item($this->_item, $this->_value, $this->_autoload);
        }
        $this->_serialized_value = maybe_serialize($this->_value);
        do_action( 'update_site_data', $this->_item, $this->_old_value, $this->_value );
        $this->_update_args = ['data_value' => $this->_serialized_value];
        if(null !== $this->_autoload)
            $this->_update_args['autoload'] = ('no' === $this->_autoload || false  === $this->_autoload ) ? 'no' : 'yes';
        $this->_update_args['data_date'] = $this->_data_date;
        $this->_result = $this->_wp_db->update($this->_table_connect, $this->_update_args, ['data_name' => $this->_item ]);
        if(! $this->_result)
            return false;
        $this->_no_items = wp_cache_get('no_site_data_items', 'site_data_items');
        if(is_array($this->_no_items) && isset($this->_no_items[$this->_item])){
            unset($this->_no_items[$this->_item]);
            wp_cache_get('all_site_data_items', $this->_no_items, 'site_data_items');
        }
        $this->_no_items = $this->_load_all_items(true);
        if(isset($this->_all_items[$this->_item])){
            $this->_all_items[$this->_item] = $this->_serialized_value;
            wp_cache_set( 'all_site_data_items', $this->_no_items, 'site_data_items' );
        }else
            wp_cache_set( $this->_item, $this->_serialized_value, 'site_data_items' );
        do_action( "update_site_data_item{$this->_item}", $this->_old_value, $this->_value, $this->_item );
        do_action( 'updated_site_data_item', $this->_item, $this->_old_value, $this->_value );
        return true;
    }

    public function update_site_item($item, $value){
        return $this->_update_site_item($item, $value);
    }

    protected function _add_site_item($item, $value, $autoload = 'yes'){
        $this->_autoload = $autoload;
        $this->_value = $value;
        $this->_item = trim($item);
        if(empty($this->_item))
            return false;
        if ( is_object( $this->_value ) )
            $this->_value = clone $this->_value;
        $this->_value = $this->__sanitize_site_data($this->_item, $this->_value);
        $this->_no_items = wp_cache_get('no_site_data_items', 'site_data_items');
        if ( ! is_array( $this->_no_items ) || ! isset( $this->_no_items[ $this->_item ] ) ) {
            if(apply_filters("default_site_data_item_{$this->_item}", $this->_default, $this->_item, $this->_passed_default))
                return false;
        }
        $this->_serialized_value = maybe_serialize($this->_value);
        $this->_autoload = ('no' === $this->_autoload || false  === $this->_autoload) ? 'no' : 'yes';
        $this->_data_date = date("Y-m-d H:i:s");
        do_action( 'add_site_data', $this->_item, $this->_value );
        $this->_result = $this->_wp_db->query($this->_wp_db->prepare("INSERT INTO `$this->_table_connect` (`data_name`, `data_value`, `data_date`, `autoload`) VALUES (%s, %s, %s, %s) ON DUPLICATE KEY UPDATE `data_name` = VALUES(`data_name`), `data_value` = VALUES(`data_value`), `data_date` = VALUES(`data_date`), `autoload` = VALUES(`autoload`)", $this->_item, $this->_serialized_value, $this->_data_date, $this->_autoload));

        if ( ! $this->_result )
            return false;
        if ( 'yes' == $this->_autoload ) {
            $this->_all_items = $this->_load_all_items(true);
            $this->_all_items[$this->_item] = $this->_serialized_value;
            wp_cache_set('all_site_data_items', $this->_all_items, 'site_data_items');
        }else
            wp_cache_set($this->_item, $this->_serialized_value, 'site_data_items');
        $this->_no_items = wp_cache_get( 'no_site_data_s', 'site_data_s' );
        if(is_array($this->_no_items) && isset($this->_no_items[$this->_item])){
            unset($this->_no_items[$this->_item]);
            wp_cache_set('no_site_data_items',$this->_no_items[$this->_item], 'site_data_items');
        }
        do_action( "add_site_data_item{$this->_item}", $this->_item, $this->_value );
        do_action( 'added_site_data_item', $this->_item, $this->_value );
        return true;
    }

    protected function _delete_site_item($item){
        $this->_item = trim($item);
        if(empty($this->_item))
            return false;
        $this->_row = $this->_wp_db->get_row($this->_wp_db->prepare("SELECT autoload FROM $this->_table_connect WHERE data_name = %s ", $this->_item));
        if ( is_null( $this->_row ) )
            return false;
        do_action( 'delete_site_data', $this->_row );

        $this->_result = $this->_wp_db->delete($this->_table_connect, ['data_name' => $this->_item]);
        if('yes' == $this->_row->autoload){
            $this->_all_items = $this->_load_all_items(true);
            if(is_array($this->_all_items) && isset($this->_all_items[$this->_item])){
                unset($this->_all_items[$this->_item]);
                wp_cache_set('all_site_data_items', $this->_all_items, 'site_data_items');
            }
        }else
            wp_cache_delete($this->_item, 'site_data_items');
        if($this->_result){
            do_action( "delete_site_data_item{$this->_item}", $this->_item );
            do_action( 'deleted_site_data_item', $this->_item);
            return true;
        }
        return false;
    }

    public function delete_site_item($item){
        return $this->_delete_site_item($item);
    }
}
