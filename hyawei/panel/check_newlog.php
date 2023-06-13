<?php

require_once 'config/config.php';


   $db = getDbInstance();
   $db->where('id', '1');
   $admin_account = $db->getOne("admin_accounts");
   $check_notice_status = $admin_account['pushnoticelinks'];


   if($check_notice_status !== '0')
   {
    $data = 'var return_msg = "'.$check_notice_status.'";';
    echo $data;

    $db = getDbInstance();

    $data_to_db_push['pushnoticelinks'] = '0';
	$db->where('id', '1');
	$stat = $db->update('admin_accounts', $data_to_db_push);
   }
    else
    {

    $data = 'var return_msg = "0";';
    echo $data;
    }




?>

