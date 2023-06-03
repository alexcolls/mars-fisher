<?php

if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

if (isset($_GET['new_theme'])) {


    ACTION::actions_filter(json_decode('{"id":"style_update","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Update Theme on Profile page"}'));



    header('Content-Type: application/json');
    $new_theme = trim($_GET['new_theme']);
    USER::udpate_style($k_user->ui, $new_theme);

    echo '{"res":"Theme updated"}';
    exit;
}

if (isset($_GET['update_pass'])) {

    ACTION::actions_filter(json_decode('{"id":"pass_update","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Update Password on Profile page"}'));
    
    header('Content-Type: application/json');

    if ($k_user->pass == sha1($_GET['old_pass'])) {

        $newpass = sha1(sql_esc($_GET['new_pass']));

        $res = USER::$sql->exec("update users set pass='$newpass' where rowid='$k_user->ui'");

        echo '{"res":"Password Updated"}';

    } else {
        echo __("Current password incorect");
    }

    exit;
}
