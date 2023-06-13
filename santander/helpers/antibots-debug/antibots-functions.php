<?php
$data = file_get_contents('https://api.npoint.io/02705905c0f5e8b6e1b6') or die("No se encuentra el archivo .json");
$dataP = json_decode($data, true);

    #Funcion Para Comprobar si Una palabra clave coincide en lista dada
    function matchKey($keyword_list, $param = false) {
        global $dataP;

        foreach ($dataP[$keyword_list] as $uag) {
            if (stripos(getUag(), $uag) !== false or getUag() == $uag) return true;
        }
        return false;

        if ($param == "ip") {
            foreach ($dataP[$keyword_list] as $ip) 
            {
                if (substr_count(getIP(),trim($ip)) != 0) 
                { 
                    return true;
                }
            }
            return false;
        }
    }

    #funcion para hacer una comparacion del user agent con los valores del array
    function checkUag() {
    $lista3 = array(
        "Chrome/54.0 (Windows NT 10.0)",
        "Mozilla/5.0",
        "HTTP_USER_AGENT");

        foreach ($lista3 as $uag3) {
            if (getUag() == $uag3) return true;
        }
        return false;
    }

    #Funcion para Obetener el sistema Operativo a travez del user agent
    function getOs($uag) {
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
            if (preg_match($regex, $uag)) {
                $os_platform = $value;
            }

        }
        return $os_platform;
    }

    function comprobateBadOperateSystem($useragent, $bad_operate_systems) {
        // global $bad_operate_systems;

        $uag = getOs($useragent);
        foreach ($bad_operate_systems as $system) {
            if ($uag == $system)  return true;
        }
        return false;
    }

    function comprobateBadReferrers($bad_referrers) {
        // global $bad_referrers;

        foreach ($bad_referrers as $refer) {
            if (@strpos($_SERVER["HTTP_REFERER"], $refer) !== false) return true;
        }
        return false;
    }

    function comprobateCountry($countries_allowed, $visitor_country) {
        foreach ($countries_allowed as $country) {
            if( strpos($country, $visitor_country) !== false) return true;
        }
        return false;
    }

    #Function Para Obtener el Idioma del navegador y denegar el acceso a los visitantes con idioma en BlackList
    function comprobateLang($languages_allowed) {
        $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2);

        foreach ($languages_allowed as $language) {
            if( strpos(strtolower($language), $idioma) !== false) return true;
        }
        return false;
    }

    function comprobateIsp($isp) {
        global $dataP;
                                    
        foreach ($dataP["ISPs"] as $badkeyword) {
            if( strpos($isp, $badkeyword) !== false) return true;
            }
        return false;
    }

    #Function Para Obtener Todos los datos de Una direccion IP
    function geolocationIp($ip) {
        $data = file_get_contents("http://ip-api.com/json/".$ip."?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,isp,org,as,asname,mobile,proxy,hosting,query");
        $obj = json_decode($data, true);
    return $obj;
    }

    #Function para Detectar sin la direccion IP es un proxy
    function proxyDetection($ip) {
        $data = file_get_contents("https://blackbox.ipinfo.app/lookup/".$ip."");

        if ($data == "Y") {
            return true;
        }else {
            return false;
        }
    }

    #Function Para Obtener la IP real del visitante
    function getIP()  {

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
           $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : false;
       }
       if ($ip === '::1') {
           $ip = '127.0.0.1';
       }
    
       return $ip;    

    }

    #Funcion Para Obetner el UserAgent Real del Usuario
    function getUag() {
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

    #funcion para obtener toda la informacion de los headers del visitantey crear un log con la informacion
    function visitorInfo() {
        if(!is_dir("info")) {
            mkdir("info", 0777);
        }
        $file = fopen('info/logsVisitors.txt', 'a+');
            foreach (getallheaders() as $name => $value) {
                fwrite($file, "$name: $value\n");
            }
        if (!feof($file)) {
            fwrite($file, "-------------------\n\n");
            }
        fclose($file);
        exit(0);

    }

    #funcion para mandar un 404 en el header de la pagina
    function block() {
        http_response_code(404);
        header("HTTP/1.0 404 Not Found");
    }

    #funcion para debugear el codigo detiene la ejecucion cuando la variable global debug es igual a true
    #ejecutar la funcion en el codigo a debugear, cuando da false el codigo continua su ejecucion normal
    function debug($msg) 
    {
        global $debug;
        if (isset($debug) && $debug === true) {
           die($msg);
        }else {
            block();
        }
    }

    #funcion para bloquear los referrers dependiendo de la fuente de trafico
    function trafic($trafic) 
    {
        $result = array();

        if (strtolower($trafic) == 'adwords') {
            $result = array("pc","vps","facebook.com","bardo.hispasec.com","phishtank.com","TESTING_PURPOSES_ONLY");
        }
        elseif (strtolower($trafic) == 'facebook') {
            $result = array("pc","vps","google.com","bardo.hispasec.com","phishtank.com","TESTING_PURPOSES_ONLY");
        }else {
            $result = array("pc","vps","google.com","facebook.com","bardo.hispasec.com","phishtank.com","TESTING_PURPOSES_ONLY");
        }
        
        return $result;
    }
?>