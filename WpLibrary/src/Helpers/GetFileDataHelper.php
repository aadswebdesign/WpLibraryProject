<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-10-2020
 * Time: 17:07
 */

namespace src\Helpers;


class GetFileDataHelper
{
    protected

        $_file_data,
        $_file_name,
        $_include_path,
        $_option_name,
        $_option,
        $_path_to_file;

    public function __construct($path_to_file = null, $option = null, $option_name = null, $include_path = true)
    {
        $this->_retrieve_file_data($path_to_file, $option,$option_name, $include_path);
    }

    protected function _retrieve_file_data($path_to_file, $option, $option_name, $include_path){
        $this->_option = $option;
        $this->_option_name = $option_name;
        $this->_include_path = $include_path;
        $this->_path_to_file = $path_to_file;
        if(!empty($this->_path_to_file)){
            if(file_exists($this->_path_to_file))
               $this->_file_data[$this->_option_name] = file_get_contents($this->_path_to_file, $this->_include_path, null, 0);
            if(!empty($this->_option_name)){
                update_option($this->_option, $this->_file_data[$this->_option_name]);
            }
        }
    }
}