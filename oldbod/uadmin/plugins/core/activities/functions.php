<?php
//new php file
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

if (isset($_GET['get_all'])) {
    header('Content-Type: application/json');
    $activities = ACTIVITY::get_all();
    $res=new stdClass();
    $res->data=$activities;
    echo json_encode($res);
    exit;

}


if (isset($_GET['del_all'])) {
    header('Content-Type: application/json');
    $activities = ACTIVITY::del_all();
    $res=new stdClass();
    $res->res="Done";
    echo json_encode($res);
    exit;

}



