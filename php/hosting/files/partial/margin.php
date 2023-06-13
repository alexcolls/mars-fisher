<?php

include '../../CONFIG.php';


$conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
if (!$conn) {
	die("Connection failed: You need to buy script from the coder, else it would not work!");
}




if (!function_exists('mysqli_fetch_all')) {
    function mysqli_fetch_all(mysqli_result $result) {
        $data = [];
        while ($data[] = $result->fetch_assoc()) {}
        return $data;
    }
}


?>
