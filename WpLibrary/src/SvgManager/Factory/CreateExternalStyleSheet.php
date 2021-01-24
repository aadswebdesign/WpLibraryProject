<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 10:49
 */

namespace src\SvgManager\Factory;

trait CreateExternalStyleSheet{
    use SvgManagerOptions;

    public function create_stylesheet() {
        if($this->_external_stylesheet == true){
            $create_stylesheet = ASSETS . $this->getStylesheetPath() . $this->getStylesheetName()  . '.css';
            if(!file_exists(ASSETS . $this->getStylesheetPath()))
                mkdir(ASSETS .  $this->getStylesheetPath(), 0, true);
            if(!is_file($create_stylesheet))
                fopen($create_stylesheet, 'a+');
        }
    }
}