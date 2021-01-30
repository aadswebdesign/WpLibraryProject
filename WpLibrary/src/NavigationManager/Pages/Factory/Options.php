<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 5-12-2020
 * Time: 05:30
 */

namespace src\NavigationManager\Pages\Factory;


trait Options
{
    use Vars;

    /**
     * @param string $active_wrapper_close
     * @return Vars
     */
    public function setActiveWrapperClose($active_wrapper_close)
    {
        $this->_active_wrapper_close = $active_wrapper_close;
        return $this;
    }

    /**
     * @param string $active_wrapper_open
     * @return Vars
     */
    public function setActiveWrapperOpen($active_wrapper_open)
    {
        $this->_active_wrapper_open = $active_wrapper_open;
        return $this;
    }

    /**
     * @param mixed $nonactive_wrapper_close
     * @return Vars
     */
    public function setNonactiveWrapperClose($nonactive_wrapper_close)
    {
        $this->_nonactive_wrapper_close = $nonactive_wrapper_close;
        return $this;
    }

    /**
     * @param mixed $nonactive_wrapper_open
     * @return Vars
     */
    public function setNonactiveWrapperOpen($nonactive_wrapper_open)
    {
        $this->_nonactive_wrapper_open = $nonactive_wrapper_open;
        return $this;
    }

}