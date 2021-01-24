<?php
/**
 * Created by PhpStorm.
 * User: Aad Pouw
 * Date: 25-9-2020
 * Time: 16:10
 */

namespace src\Helpers;


class BrowserHelper
{

    const DIV_CLOSE = '</div>';
    const DIV_START = '<div>';
    const EL_END = '>';
    const LI_CLOSE = '</li>';
    const LI_START = '<li ';
    const SPAN_CLOSE = '</span>';
    const SPAN_START = '<span>';
    const UL_CLOSE = '</ul>';
    const UL_START = '<ul ';



    protected
        $_accept,
        $_attribute,
        $_browser_name,
        $_browser_version,
        $_browser_version_comparison,
        $_comparison,
        $_comparisons = array(
        'Equal',
        'NotEqual',
        'GreaterThan',
        'LessThan',
        'GreaterThanOrEqualTo',
        'LessThanOrEqualTo'
    ),
        $_html = '',
        $_i,
        $_is_browser,
        $_is_platform,
        $_is_version,
        $_known,
        $_matches,
        $_message,
        $_pattern,
        $_platform,
        $_return = false,
        $_use_html = false,
        $_user_agent,
        $_user_browser,
        $_wrapper;

    /**
     * @param boolean $use_html
     * @return mixed
     */
    public function setUseHtml($use_html)
    {
        $this->_use_html = $use_html;
        return $this;
    }

    /**
     * @param $wrapper
     * @return $this
     */
    public function setWrapper($wrapper)
    {
        $this->_wrapper = $wrapper;
        return $this;
    }

    /**
     * @param $attribute
     * @return $this
     */
    public function setAttribute($attribute)
    {
        $this->_attribute = $attribute;
        return $this;
    }

    /**
     * @return array
     */
    private function _get_browser(){
        $this->_browser_name = 'Unknown';
        $this->_browser_version = "";
        $this->_platform = 'Unknown';
        $this->_user_agent = $_SERVER['HTTP_USER_AGENT'];

        // First get the platforms?
        if (preg_match('/linux|android/i', $this->_user_agent)):
            $this->_platform = 'Android';
        elseif (preg_match('/linux/i', $this->_user_agent)):
            $this->_platform = 'Linux';
        elseif (preg_match('/iPad|CPU os x/i', $this->_user_agent)):
            $this->_platform = 'iPad';
        elseif (preg_match('/iPhone|CPU os x/i', $this->_user_agent)):
            $this->_platform = 'iPhone';
        elseif(preg_match('/macintosh|mac os x/i', $this->_user_agent) ):
            $this->_platform = 'Mac';
        elseif (preg_match('/windows|win32/i', $this->_user_agent)):
            $this->_platform = 'Windows';
        endif;

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$this->_user_agent) && !preg_match('/Opera/i',$this->_user_agent)):
            $this->_browser_name = 'Internet Explorer';
            $this->_user_browser = "MSIE";
        elseif(preg_match('/Firefox/i',$this->_user_agent)):
            $this->_browser_name = 'Mozilla Firefox';
            $this->_user_browser = "Firefox";
        elseif(preg_match('/Edge/i',$this->_user_agent)):
            $this->_browser_name = 'Ms Edge';
            $this->_user_browser = "Edge";
        elseif(preg_match('/Chrome/i',$this->_user_agent)):
            $this->_browser_name = 'Google Chrome';
            $this->_user_browser = "Chrome";
        elseif(preg_match('/criOS/i',$this->_user_agent)):
            $this->_browser_name = 'Google CriOS (Chrome on iPad/iPhone)';
            $this->_user_browser = "CriOS";
        elseif(preg_match('/FxiOS/i',$this->_user_agent)):
            $this->_browser_name = 'Mozilla FxiOS (Firefox on iPad/iPhone)';
            $this->_user_browser = "FxiOS";
        elseif(preg_match('/Opera/i',$this->_user_agent)):
            $this->_browser_name = 'Opera';
            $this->_user_browser = "Opera";
        elseif(preg_match('/Safari/i',$this->_user_agent)): // or Safari?
            $this->_browser_name = 'Apple Safari';
            $this->_user_browser = "Safari";
        endif;

        // finally get the correct version number
        $this->_known = array('BrowserVersion', $this->_user_browser, 'other');
        $this->_pattern = '#(?<browser>' . join('|', $this->_known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($this->_pattern, $this->_user_agent, $this->_matches));

        $this->_i = count($this->_matches['browser']);
        if ($this->_i != 1):
            if (strripos($this->_user_agent,"BrowserVersion") < strripos($this->_user_agent,$this->_user_browser)):
                $this->_browser_version= $this->_matches['version'][0];
            else:
                $this->_browser_version= $this->_matches['version'][1];
            endif;
        else:
            $this->_browser_version= $this->_matches['version'][0];
        endif;

        if ($this->_browser_version==null || $this->_browser_version=="")$this->_browser_version="?";

        return array(
            'userAgent' => $this->_user_agent,
            'browser_name'      => $this->_browser_name,
            'browser_version'   => $this->_browser_version,
            'user_browser'      => $this->_user_browser,
            'platform'          => $this->_platform,
            'pattern'           => $this->_pattern
        );
    }

    /**
     * @return string
     */
    public function getBrowserInfo(){
        if($this->_use_html == true):
            if( isset($this->_attribute) && !isset($this->_wrapper)):
                $this->_message = self::DIV_START . 'You have to set a parent element first with setWrapper before you can use setAttribute or don\'t use it!' . self::DIV_CLOSE;
            elseif(isset($this->_wrapper)):
                $this->_message = null;
                $this->_html .= '<';
                $this->_html .= $this->_wrapper;
                if(isset($this->_attribute)):
                    $this->_html .= ' ';
                    $this->_html .= $this->_attribute;
                endif;
                $this->_html .= ' ';
                $this->_html .= $this->_attribute;
                $this->_html .= '>';
            endif;
            $this->_html .= self::UL_START .'class="browser-details-ul"' . self::EL_END;
            if(isset($this->_message)):
                $this->_html .= self::LI_START .'style="color: #000; top:auto; right:1.0em; bottom: 3.0em; left: 11.5em; font-size: 0.8em"  class="fixed"' . self::EL_END . 'Message: <span>'. $this->_message . '</span>' . self::LI_CLOSE;
            else:
                $this->_html .= self::LI_START .'class="browser-detail-li"' . self::EL_END . 'UserAgent: ' . self::SPAN_START . $this->_get_browser()['userAgent'] . self::SPAN_CLOSE . self::LI_CLOSE;
                $this->_html .= self::LI_START .'class="browser-detail-li"' . self::EL_END . 'Platform: ' . self::SPAN_START . $this->_get_browser()['platform'] . self::SPAN_CLOSE . self::LI_CLOSE;
                $this->_html .= self::LI_START .'class="browser-detail-li"' . self::EL_END . 'Browser\'s Name: ' . self::SPAN_START . $this->_get_browser()['browser_name'] . self::SPAN_CLOSE . self::LI_CLOSE;
                $this->_html .= self::LI_START .'class="browser-detail-li"' . self::EL_END . 'User\'s Browser: ' . self::SPAN_START . $this->_get_browser()['user_browser'] . self::SPAN_CLOSE . self::LI_CLOSE;
                $this->_html .= self::LI_START .'class="browser-detail-li"' . self::EL_END . 'Browser Version: ' . self::SPAN_START . $this->_get_browser()['browser_version'] . self::SPAN_CLOSE . self::LI_CLOSE;
                $this->_html .= self::LI_START .'class="browser-detail-li"' . self::EL_END . 'Pattern: ' . self::SPAN_START . $this->_get_browser()['pattern'] . self::SPAN_CLOSE . self::LI_CLOSE;
            endif;
            $this->_html .= self::UL_CLOSE;
            if(isset($this->_wrapper)):
                $this->_html .= '</';
                $this->_html .= $this->_wrapper;
                $this->_html .= '>';
            endif;
        else:
            $this->_html = implode(',', $this->_get_browser());
        endif;
        return $this->_html;
    }

    /**
     * @param $_is_browser
     * @return bool
     */
    public function IsUserBrowser($_is_browser){
        $this->_is_browser = $_is_browser;
        if($this->_is_browser === $this->_get_browser()['user_browser'])
            $this->_return = true;
        return $this->_return;
    }

    /**
     * @return bool
     */
    protected function getIsUserBrowser()
    {
        return $this->_return;
    }

    /**
     * @param $_is_platform
     * @return bool
     */
    public function IsPlatform($_is_platform){
        $this->_is_platform = $_is_platform;
        if($this->_is_platform === $this->_get_browser()['platform'] )
            $this->_return = true;
        return $this->_return;
    }

    /**
     * @return bool
     */
    public function getIsPlatform(){
        return $this->_return;
    }

    /**
     * @param $_comparison
     * @param $is_version
     * @return bool
     */
    public function IsVersion($_comparison, $is_version){
        $this->_comparison = $_comparison;
        $this->_is_version = $is_version;
        if($this->getIsPlatform() === true):
            if($this->getIsUserBrowser() === true):
                //if($this->_comparisons[0] === $this->_comparison):
                if($this->_comparisons[0] === $this->_comparison):    //preg_match()
                    if($this->_get_browser()['browser_version'] == $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[1] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] != $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[2] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] > $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[3] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] < $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[4] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] >= $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[5] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] <= $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                else:
                    $this->_browser_version_comparison = false;
                endif;
            endif;
        else:
            if($this->getIsUserBrowser() === true):
                //if($this->_comparisons[0] === $this->_comparison):
                if($this->_comparisons[0] === $this->_comparison):    //preg_match()
                    if($this->_get_browser()['browser_version'] == $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[1] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] != $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[2] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] > $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[3] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] < $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[4] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] >= $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                elseif($this->_comparisons[5] === $this->_comparison):
                    if($this->_get_browser()['browser_version'] <= $this->_is_version):
                        $this->_browser_version_comparison = true;
                    else:
                        $this->_browser_version_comparison = false;
                    endif;
                else:
                    $this->_browser_version_comparison = false;
                endif;
            endif;
        endif;
        return $this->_browser_version_comparison;
    }
}