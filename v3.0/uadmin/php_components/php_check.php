<?php
if (!defined('UADMIN_AB_ROOT')) {die("You not have permissions");}
$php_check_errors=array();
	


if(!function_exists("file_get_contents")){
	$php_check_errors[]="Missing or broken function -file_get_contentss    Read <a href='documentation.html'>Documentation</a>";
}


if(!function_exists("xml_parser_create")){
	$php_check_errors[]="Missing or broken function -xml_parser_create. Fix:  apt-get install php7.0-xml     Read <a href='documentation.html'>Documentation</a>";
}

if(!function_exists("json_decode")){
	$php_check_errors[]="Missing or broken function -json_decode   Read <a href='documentation.html'>Documentation</a>";
}

if(!function_exists("json_encode")){
	$php_check_errors[]="Missing or broken function -json_encode   Read <a href='documentation.html'>Documentation</a>";
}


if(!class_exists('sqlite3')){
	$php_check_errors[]="Missing or broken Class -sqlite3. Fix: apt-get install  php7.0-sqlite3   Read <a href='documentation.html'>Documentation</a>";
}



if(!empty($php_check_errors)){

	foreach($php_check_errors as $error){
		echo "<div>".$error."</div>";
	}

	die();
}


?>
