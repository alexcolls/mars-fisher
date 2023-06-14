<?php
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}
$actions = array();
//USER

class ACTION
{

    public function __construct($row)
    {
        foreach ($row as $key => $val) {

            //filters..
            //filters..

            $this->{$key} = $val;
        }

    }

    public static function actions_filter($act_obj, $reject_callback = null,$save_to_activity=false) // editect on 2019. add reject callback+save to activities

    {
        global $actions;
        global $k_user;

        $tmp = array_filter($actions, function ($act) use ($act_obj) {
            return $act->id == $act_obj->id;
        });

        if (!empty($tmp)) {
            if (!in_array($act_obj->id, $k_user->perm_action)) {

                //write to activity action success!
                if($save_to_activity){
                     ACTIVITY::save($act_obj->id, 1);

                }

                return true;
            };

            if ($reject_callback != null) {
                $reject_callback();
            }

            //write to activity action fail!
             if($save_to_activity){
                  ACTIVITY::save($act_obj->id, 0);

             }    
            echo $act_obj->err_mes;
            exit;
        } else {

            // if action happnd first time, it wil create actuon obejct on sql , adn let user to colite thi action only at thei time. afte thsi action wil appear on action stting
            $sql_res = USER::$sql->exec("insert into actions(id,desc) values('$act_obj->id','$act_obj->desc')");
            return true;
        }
    }
};

class ACTIVITY
{

    public static function get_all()
    {

        $activities = array();
        $res = USER::$sql->query("select * from activities");
        while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
            $activities[] = $row;
        }
        return $activities;

    }


    public static function del_all()
    {

       
        $res = USER::$sql->query("delete from activities");
        

    }

    public static function save($act_id, $st = 1)
    {

        $time = time();
        global $k_user;
       
        $sql_res = USER::$sql->exec("insert into activities(time,user,action,st) values('$time','$k_user->ui','$act_id','$st')");

    }

}

$res = USER::$sql->query("select  * from actions");
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
    $actions[] = new ACTION($row);
}




// var_dump(ACTION::actions_filter(json_decode('{"id":"someact2","err_mes":"Sorry, you cann not perfome this operation. Contact admin","desc":"Some action"}')));
