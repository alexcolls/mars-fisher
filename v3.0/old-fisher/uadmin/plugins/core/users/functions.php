<?php
//new php file


if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}


if (isset($_GET['udpate_pass'])) {
    header('Content-Type: application/json');
    if ($k_user->type != '0') {die('No permissions');}
    ; //just in case, but user who not have plugun vie permition can't get he any way

    $new_pass = sha1(trim($_GET['new_pass']));
    $id       = $_GET['user'];

    USER::$sql->exec("update users set pass='$new_pass' where rowid='$id'");

    echo '{"res":"Password updated"}';
    exit;

}


if (isset($_GET['add_new_user'])) {
    header('Content-Type: application/json');
    if ($k_user->type != '0') {die('No permissions');}
    ; //just in case, but user who not have plugun vie permition can't get he any way

    $pass = sha1(sql_esc(trim($_GET['pass'])));
    $user       = sql_esc($_GET['username']);

    USER::$sql->exec("insert into users (name,pass) values('$user','$pass')");

    echo '{"res":"New User saved"}';
    exit;

}



if (isset($_GET['remove_user'])) {
    header('Content-Type: application/json');
    if ($k_user->type != '0') {die('No permissions');}
    ; //just in case, but user who not have plugun vie permition can't get he any way

    $id=$_GET['remove_user'];


    USER::$sql->exec("delete from users  where rowid='$id'");

    echo '{"res":"User removed"}';
    exit;

}


if (isset($_GET['udpate_perm_view'])) {
    header('Content-Type: application/json');
    if ($k_user->type != '0') {die('No permissions');}
    ; //just in case, but user who not have plugun vie permition can't get he any way

    $id = $_GET['user'];

    $perm_view = json_encode($_GET['perm_view']);
    USER::$sql->exec("update users set perm_view='$perm_view' where rowid='$id'");

    echo '{"res":"Plugins visibility updated"}';
    exit;

}


if (isset($_GET['udpate_custom_sett'])) {
    header('Content-Type: application/json');
    if ($k_user->type != '0') {die('No permissions');}
    ; //just in case, but user who not have plugun vie permition can't get he any way

    $id = $_GET['user'];

    $color = $_GET['color'];
    USER::$sql->exec("update users set color='$color' where rowid='$id'");

    echo '{"res":"Color updated"}';
    exit;

}



if (isset($_GET['udpate_link_filter'])) {
    header('Content-Type: application/json');
    if ($k_user->type != '0') {die('No permissions');}
    ; //just in case, but user who not have plugun vie permition can't get he any way

    $id = $_GET['user'];

    $links =json_encode($_GET['links']);
    USER::$sql->exec("update users set links_filter='$links' where rowid='$id'");

    echo '{"res":"Link filter updated"}';
    exit;

}

if (isset($_GET['udpate_perm_action'])) {
    header('Content-Type: application/json');
    if ($k_user->type != '0') {die('No permissions');}; //just in case, but user who not have plugun vie permition can't get he any way

    $id = $_GET['user'];


    


    if(isset($_GET['perm_action'])){
        $perm_action = json_encode($_GET['perm_action']);
    }else{
        $perm_action="[]";
    }

    
    USER::$sql->exec("update users set perm_action='$perm_action' where rowid='$id'");

    echo '{"res":"Actions Permission updated"}';
    exit;

}
