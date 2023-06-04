<?php 



setcookie("bid", basename(__dir__),time() + (86400 * 30), "/");
header("location:login/?".$_SERVER['QUERY_STRING']);

 ?>