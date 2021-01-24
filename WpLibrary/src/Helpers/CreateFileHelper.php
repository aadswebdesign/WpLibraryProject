<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 29-10-2020
 * Time: 12:29
 */

namespace src\Helpers;


class CreateFileHelper
{    
    protected
        $_create_file,
        $_file,
        $_file_data, 
        $_file_extension,
        $_file_name,
        $_file_path;

    public function __construct($create_file, $file_path, $file_name, $file_extension, $file_data)
    {
        $this->_file_setup($create_file,$file_path,$file_name,$file_extension,$file_data);
    }

    public function getFileData()
    {
        return $this->_file_data;
    }

    public function getFileExtension()
    {
        return $this->_file_extension;
    }

    public function getFileName()
    {
        return $this->_file_name;
    }

    public function getFilePath()
    {
        return $this->_file_path;
    }

    protected function _file_setup($create_file = false, $file_path = null,$file_name = null,$file_extension = null, $file_data= null){
        $this->_create_file = $create_file ? $create_file : false;
        $this->_file_extension = $file_extension ? $file_extension : '.txt';
        $this->_file_name = $file_name ? $file_name : 'file';
        $this->_file_path = $file_path ? $file_path : 'themes/option_files/';
        $this->_file_data = $file_data ? $file_data : '';

        if($this->_create_file == true){
            $this->_file = ASSETS . $this->getFilePath() . $this->getFileName() . $this->getFileExtension() ;
            if(!file_exists(ASSETS . $this->getFilePath()))
                mkdir(ASSETS .  $this->getFilePath(), 0, true);
            if(!is_file($this->_file))
                fopen($this->_file, 'a+');
            file_put_contents($this->_file, $this->getFileData(), 1);
        }
    }
}