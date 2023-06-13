<?php 

function makeHit(){
	$hit = file_get_contents(__DIR__ . "/hits.txt");
	file_put_contents(__DIR__ . "/hits.txt", $hit + 1);
}


function getHit(){
	return file_get_contents(__DIR__ . "/hits.txt");
}

function addUniqueIP($ip=NULL){
	$ip = ($ip!=NULL) ? $ip : getIP();
	$iplist = file_get_contents(__DIR__ . '/iplist.txt');
	$iplist = explode(",", $iplist);
	if(!in_array(trim($ip), $iplist)){
		$file = fopen(__DIR__ . "/iplist.txt", 'a+');
		fwrite($file, "," . trim($ip));
		fclose($file);
	}
}

function getUniqueVisitor(){
	$file = file_get_contents(__DIR__ . "/iplist.txt");
	$file = explode(",", $file);
	return count($file);
}
function getBlocked(){
	$file = file_get_contents(__DIR__ . "/visits_blocked.txt");
	$file = explode("-------------------", $file);
	return count($file);
}


// other 


?>