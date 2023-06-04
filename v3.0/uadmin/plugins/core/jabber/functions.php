<?php

if (!defined('UADMIN_AB_ROOT')) {die("You not have permissions");}

require_once 'jabberHelper.php';

if (isset($_GET['test_jab'])) {

    // ACTION::actions_filter(json_decode('{"id":"pass_update","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Update Password on Profile page"}'));

    header('Content-Type: application/json');

    $from_jab  = esc__($_GET['from_jab']);
    $from_pass = esc__($_GET['from_pass']);
    $to_jab    = esc__($_GET['to_jab']);

    if (function_exists('send_jabber')) {
        send_jabber('test', (array) $to_jab);
    }
    echo '{"res":"Test message Sent"}';
    exit;
}

if (isset($_GET['save_jab'])) {

    ACTION::actions_filter(json_decode('{"id":"jabber_update","err_mes":"Sorry, you can not perform this operation. Contact admin","desc":"Update Jabb on Jabber plugin"}'));
    header('Content-Type: application/json');

    $from_jab  = esc__($_GET['from_jab']);
    $from_pass = esc__($_GET['from_pass']);
    $res       = $sql->exec("update main set jab='$from_jab' , pass='$from_pass' ");
    echo '{"res":"Jabber saved"}';

    exit;
}
