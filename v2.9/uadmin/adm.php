<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//detect admin root folder
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {$protocol = 'http://';} else { $protocol = 'https://';}

DEFINE('UADMIN_AB_ROOT', $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/'); //url
DEFINE('UADMIN_CLASSES_DIR', dirname((__FILE__)) . '/classes/'); //php
DEFINE('UADMIN_HOME_FILE', basename(__FILE__));
DEFINE('UADMIN_VERSION', "2.9");

//######### NEW ########################
DEFINE('UADMIN_ROOT_DIR_URL', $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/'); //url
DEFINE('UADMIN_ROOT_DIR_PATH', dirname((__FILE__)) . '/');


require_once('php_components/php_check.php');


require_once 'php_components/session.php';

require_once 'class/user.php';
require_once 'class/action.php';
require_once 'class/plugin.php';



require_once 'php_components/functions.php';






if (!isset($k_user)) {
    require_once 'homepage_components/login.php';
}

$php_js=new stdClass();//new 

require_once($k_plugin->path.'functions.php');



require_once 'homepage_components/header.php';

require_once 'homepage_components/nav.php';

// $php_js->plugins_groups=$plugins_groups;


$php_js->k_plugin=$k_plugin;
$php_js->k_user=$k_user;
$php_js->users=USER::get_all_users_safe();//new 2018 june
$php_js->actions=$actions;//new 2018 june

$php_js->host=$_SERVER['SERVER_NAME'];
?>

<script type="text/javascript">
		var php_js=<?php echo  json_encode($php_js) ?>
</script>
<?php


require_once($k_plugin->path.'main.php');



require_once 'homepage_components/footer.php';
