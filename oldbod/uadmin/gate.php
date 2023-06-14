<?php
//new php file
define("MAIN_GATE", "1");


error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");





if(!isset($_GET['pl'])){
	header("HTTP/1.0 404 Not Found");
	exit;
}else{
	$plugin=$_GET['pl'];
	
	if(!file_exists('plugins/custom/'.$plugin.'/gate.php') || !file_exists('plugins/custom/'.$plugin.'/main.php')){
		header("HTTP/1.0 404 Not Found");
	    exit;
	}else{
		
		include 'plugins/custom/'.$plugin.'/gate.php';
	}
}


 ?>
