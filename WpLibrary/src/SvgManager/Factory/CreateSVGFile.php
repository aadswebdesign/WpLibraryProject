<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 8-10-2020
 * Time: 10:59
 */

namespace src\SvgManager\Factory;

trait CreateSVGFile
{
    use SvgManagerOptions;

    public function create_svg_file() {
        if($this->_create_svg_file == true){
            $svg_file_data = $this->getSvgPrint();
            $svg_create_file =  ASSETS .  $this->getSvgFilePath() . $this->getSvgFileName() . SvgManagerConsts::SVG;
            if(!file_exists(ASSETS .  $this->getSvgFilePath()))
                mkdir(ASSETS .  $this->getSvgFilePath(), 0, true);
            if(!is_file($svg_create_file))
                fopen($svg_create_file, 'a+');
            file_put_contents($svg_create_file, $svg_file_data, 1);
        }
    }
}