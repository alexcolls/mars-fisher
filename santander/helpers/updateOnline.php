<?php
include '../system/config/config.php';
include '../system/config/db.class.php';
include "../system/config/User.php";

if (isset($_GET['user_id'])) {
    $userclass = new User();
    $db  = new db(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $user_s = $_GET['user_id'];
    $db->update($userclass->updateTime($user_s));
    echo 'hola';
}