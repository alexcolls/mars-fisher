<?php
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}
// $_SESSION['user']=1;//qqq

$plugins = array();

$plugins_groups=array();



class CORE_PLUGIN
{

    public function __construct($file)
    {

        $plug_name = file_get_contents($file);
        preg_match("/Plugin name:(.*);/", $plug_name, $matches);
        $this->name = trim($matches[1]);

        

        $this->type     = "core";
        $this->id       = basename(dirname($file));
        $this->mid      = basename(dirname($file));
        $this->url      = dirname($file);
        $this->ab_url   = realpath(dirname($file));
        $this->path     = realpath(dirname($file)) . '/';
        $this->url_     = UADMIN_AB_ROOT . dirname($file) . '/';
        $this->ajax_url = UADMIN_AB_ROOT . UADMIN_HOME_FILE . "?p=" . $this->id;
    }

    public static function get_plugin_by_ui($ui)
    {
        global $plugins;
        foreach ($plugins as $plugin) {
            if ($plugin->id == $ui) {
                return $plugin;
            }
        }
        return false;
    }

};

class CUSTOM_PLUGIN
{

    public function __construct($file)
    {
        $plug_name = file_get_contents($file);
        preg_match("/Plugin name:(.*);/", $plug_name, $matches);
        $this->name = trim($matches[1]);

        $plugin_group = file_get_contents($file);
        preg_match("/\/Group:(.*);/", $plugin_group, $matches);

        if (!empty($matches)) {




            $this->group = trim($matches[1]);
        }

        $this->type     = "custom";
        $this->id       = basename(dirname($file));
        $this->mid      = basename(dirname($file));
        $this->url      = dirname($file);
        $this->ab_url   = realpath(dirname($file));
        $this->path     = realpath(dirname($file)) . '/';
        $this->url_     = UADMIN_AB_ROOT . dirname($file) . '/';
        $this->ajax_url = UADMIN_AB_ROOT . UADMIN_HOME_FILE . "?p=" . $this->id;
    }


    public static function get_plugin_by_ui($ui)
    {
        global $plugins;
        foreach ($plugins as $plugin) {
            if ($plugin->id == $ui) {
                return $plugin;
            }
        }
        return false;
    }

};

$cwd=getcwd();//2019 udpate
chdir(__DIR__);//2019 udpate
chdir("../");//2019 udpate
foreach (glob('plugins/core/*/main.php') as $main) {
    $plugins[] = new CORE_PLUGIN($main);
}
foreach (glob('plugins/custom/*/main.php') as $main) {
    $plugins[] = new CUSTOM_PLUGIN($main);
}
chdir($cwd);//2019 udpate




foreach ($plugins as $plugin) {
    if(property_exists($plugin,'group')){

        $plugin_group=$plugin->group;
        if(array_key_exists($plugin_group, $plugins_groups)){
            $plugins_groups[$plugin_group][]=$plugin;
        }else{
            $plugins_groups[$plugin_group]=array($plugin);
        }


    }
}



//
//
//
//
//
//
//

if (isset($k_user)) {
    if (isset($_GET['p']) && $_GET['p'] != '' && CORE_PLUGIN::get_plugin_by_ui($_GET['p'])) {

        if ($k_user->type == 0) {
            $k_plugin = CORE_PLUGIN::get_plugin_by_ui($_GET['p']);
        } else {

            if (in_array($_GET['p'], $k_user->perm_view)) {
                $k_plugin = CORE_PLUGIN::get_plugin_by_ui($_GET['p']);
            } else {
                $k_plugin = CORE_PLUGIN::get_plugin_by_ui('welcome');
            }

        }

    } else {
        $k_plugin = CORE_PLUGIN::get_plugin_by_ui('welcome');
    }
}

// print_r($plugins_groups);


    
// exit;

//
//
//
//
//
//
//
//
//
//
//
