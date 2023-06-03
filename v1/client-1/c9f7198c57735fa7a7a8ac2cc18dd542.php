<?php 
// Dwi F.D
error_reporting(0);
$mnHme='files';
// $rand = dechex(rand(0x000000, 0xFFFFFF));
// $DIR=md5(rand(0,80000));
// $fileSource=['0384e71458f076909d6e978e0debc9fb','bc6af3cb7f7378740276a4c60abef83f','242a9f63344ab7880aac5bd031dd5783','6f245edd418ce8898e4a05a1aeec63a8'];
// $rand = mt_rand(0,3);
// $DIR = $fileSource[$rand];

$filearray= ["first", "second", "third", "fourth", "mean", "purpose", "intervention", "inside", "middle", "medium", "translate", "read", "spokesperson", "crossing", "period", "bowel", "fascinate", "suspicion", "feeling", "flood", "finish"];

$file_rand = $filearray[mt_rand(0,20)];
$file_dir = md5($file_rand);

if (is_dir($file_dir)){
    header("location:$file_dir/index.php"); 
} else {
    function make_a_file($home,$file_dir) {
        $dir = opendir($home);
        mkdir($file_dir);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($home . '/' . $file) ) {
                    make_a_file($home . '/' . $file,$file_dir . '/' . $file);
                }
                else {
                    copy($home . '/' . $file,$file_dir . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
    
    $home=$mnHme;
    make_a_file( $home, $file_dir );
    header("location:$file_dir/index.php");
    
}

?>