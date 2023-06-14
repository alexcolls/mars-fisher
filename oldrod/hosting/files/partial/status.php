<?php
include '../../CONFIG.php';
include 'margin.php';

session_start();

$uniqueid = $_SESSION['uniqueid'];

date_default_timezone_set('UTC');

$time = date('Y-m-d H:i:s');

$query = mysqli_query($conn, "UPDATE customers SET last_activity='$time' WHERE uniqueid=$uniqueid");

if($query){
    echo json_encode(array(
        'status' => 'ok',
        'id' => $uniqueid,
        'time' => $time
        ));
}else{
    echo json_encode(array(
        'status' => 'notok'
    ));
}

?>
