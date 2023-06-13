<?php
/**
 * Get information about who visits your website
 * @package UserInfo
 * @author @k3map <t.me/@k3map>
 * @version 1.0
 * @copyright Copyright (c) 2021 K3map
 * @link https://github.com/k3map/UserInfo-PHP-
 */

class UserInfo
{
    /**
     * Get user IP
     * @return string
     */
    public static function getIP()  
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        elseif(isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif(isset($_SERVER["HTTP_X_FORWARDED"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif(isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif(isset($_SERVER["HTTP_FORWARDED"])) {
            $ip = $_SERVER["HTTP_FORWARDED"];
        }
        else {
            $ip = (isset($_SERVER["REMOTE_ADDR"]) == "::1") ? "127.0.0.1" : $_SERVER["REMOTE_ADDR"];
        }
        
        return $ip;
    }

    /**
     * Verified user use a proxy
     * @return boolean
     */
    public static function isProxy()
    {
        $result = false;
        //for proxy servers
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $addresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);

            if (count($addresses) > 0) {
                $result = true;
            }
        }

        return $result;
    }
    
    /**
     * Get user User-Agent
     * @return string
     */
    public static function getUag() 
    {
        $data = array(
        // Header can occur on devices using Opera Mini.
        'HTTP_X_OPERAMINI_PHONE_UA',
        // Vodafone specific header: http://www.seoprinciple.com/mobile-web-community-still-angry-at-vodafone/24/
        'HTTP_X_DEVICE_USER_AGENT',
        'HTTP_X_ORIGINAL_USER_AGENT',
        'HTTP_X_SKYFIRE_PHONE',
        'HTTP_X_BOLT_PHONE_UA',
        'HTTP_DEVICE_STOCK_UA',
        'HTTP_X_UCBROWSER_DEVICE_UA',
        // Sometimes, bots (especially Google) use a genuine user agent, but fill this header in with their email address
        'HTTP_FROM',
        'HTTP_X_SCANNER', // Seen in use by Netsparker
           // The default User-Agent string.
        'HTTP_USER_AGENT',
        );
    
        foreach ($data as $uag) {
            if (isset($_SERVER[$uag])) {
                $uag = $_SERVER[$uag];
            }
        }
        return $uag;
    }

    /**
     * Get user Operative System
     * @return string
     */
    public static function getOs()
    {
        $user_agent = UserInfo::getUag();
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }
        return $os_platform;
    }

    /**
     * Get user Browser
     * @return string
     */
    public static function getBrowser()
    {
        $user_agent = UserInfo::getUag();
        $browsers = array(
            'Opera'   => '/OPR\/|Opera/',
            'Edge'    => '/Edge/',
            'Chrome'  => '/Chrome/',
            'Safari'  => '/Safari/',
            'Firefox' => '/Firefox/',
            'Yandex'  => '/YaBrowser/',
            'Internet Explorer' => '/MSIE|Trident\/7/',
        );

        foreach ($browsers as $browser => $regex) 
        {
            if (preg_match($regex, $user_agent)) return $browser;
        }
        return 'Other';
    }

    /**
     * Get user Languaje
     * @return string
     */
    public static function getLang()
    {
        $lang = strtoupper(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2));
        return (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $lang : '');
    }

    /**
     * Get user Referer
     * @return string
     */
    public static function getReferer()
    {
        return (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
    }

    /**
     * Get user Headers
     * @return string
     */
    public static function getHeaders()
    {
        $headers = '';
        if (function_exists('getallheaders')) {
            foreach (getallheaders() as $header_name => $header_value)
            {
                $headers .= $header_name." : ".$header_value."<br>";
            }
        }else {
            foreach ($_SERVER as $header_name => $header_value) 
            {
                if (substr($header_name, 0, 5) == 'HTTP_') 
                {
                    $headers .= $header_name." : ".$header_value."<br>";
                }
            }
        }
        return $headers;
    }

    /**
     * Get all User information
     * @return string
     */
    public static function getAllBrowserInfo()
    {
        $user_agent = UserInfo::getUag();
        $browser = UserInfo::getBrowser();
        $languaje = UserInfo::getLang();
        $operative_system = UserInfo::getOs();
        $ip = UserInfo::getIP();
        $referer = UserInfo::getReferer();
        $match = preg_match('/'.$browser.'\/[0-9,.]+/', $user_agent, $browser_version);

        $broser_info = array(
            'user_agent' => $user_agent,
            'browser' => $browser,
            'browser_version' => $browser_version[0],
            'languaje' => $languaje,
            'ip' => $ip,
            'referer' => $referer,
            'operative_system' => $operative_system
        );

        return $broser_info;
    }

}

