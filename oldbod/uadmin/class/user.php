<?php





if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

$users = array();
//USER

class USER
{
    static $sql;

    public function __construct($row)
    {
        foreach ($row as $key => $val) {

            //filters...
            if ($key == "perm_view") {
                $this->perm_view = json_decode($val);
                continue;
            }

            if ($key == "perm_action") {
                $this->perm_action = json_decode($val);
                continue;
            }

            if ($key == "links_filter") {
                $this->links_filter = json_decode($val);
                continue;
            }

            if ($key == "style") {
                if ($val == "") {
                    $val = "cosmo";
                }
            }

            //filters..

            $this->{$key} = $val;
        }

    }



    public static function get_all_users_safe(){

        $users_safe=array();

        global $users;


        $users_safe=array_map(function($user){
            unset($user->pass);
            // unset($user->ui);
            return $user;
        },$users);


    
        return $users_safe;
    }
    public static function udpate_style($ui, $style)
    {

        $res = self::$sql->exec("update users set style='$style' where rowid='$ui'");

    }

    public static function get_user_by_ui($ui)
    {
        global $users;
        foreach ($users as $user) {
            if ($user->ui == $ui) {
                return $user;
            }
        }
        return false;
    }
};

USER::$sql = new sqlite3('plugins/core/users/public/.ht_user.sqlite');

$res = USER::$sql->query("select rowid as ui, * from users");
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
    $users[] = new USER($row);
}

if (isset($_SESSION['user'])) {
    $user_found = USER::get_user_by_ui($_SESSION['user']);
    if ($user_found && isset($_SESSION['pass']) && $user_found->pass == $_SESSION['pass'] && $_SESSION['ip']==$_SERVER['REMOTE_ADDR']) {
        $k_user = USER::get_user_by_ui($_SESSION['user']);
    }
}
