<?php

$ip=$_SERVER['REMOTE_ADDR'];
$ipFile = dirname(__FILE__) . "/whitelist.dat";
if(isset($ip)){
   $file = fopen($ipFile, 'a');
   fwrite($file, $ip. "\n");
   fclose($file);
}

?>