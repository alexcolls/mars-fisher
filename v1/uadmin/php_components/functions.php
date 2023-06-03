<?php

if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

if (isset($_GET['logout'])) {

    session_destroy();

    ACTIVITY::save("logout",1);

    header('location:?');

}

if (isset($_GET['login'])) {
    header('Content-Type: application/json');



    sleep(3);

    $user = esc__($_GET['user']);
    $pass = sha1(($_GET['pass']));
   


    $stmt=USER::$sql->prepare("select rowid as ui,count() as size from users where name=:user and pass=:pass limit 1");
    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':pass', $pass, SQLITE3_TEXT);
    $res=$stmt->execute();
    $res=$res->fetchArray(SQLITE3_ASSOC);

    // $res = USER::$sql->query("select rowid as ui,count() as size from users where name='$user' and pass='$pass' limit 1")->fetchArray(SQLITE3_ASSOC);

    if ($res['size'] > 0) {
        $_SESSION['user'] = $res['ui'];
        $_SESSION['pass'] = $pass;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];//2020


//action
        
        $k_user = USER::get_user_by_ui($_SESSION['user']);
        ACTION::actions_filter(json_decode('{"id":"login","err_mes":"Sorry, access to you account has been blocked by admin","desc":"Login to uAdmin"}'),function (){
            //if reject
            session_destroy();
        },true);    


        




        echo '{"res":"Login success"}';
    } else {
        echo "Bad Logins";
    }

    exit;
}



if(isset($_GET['hash'])){

    header('location:'.UADMIN_AB_ROOT.UADMIN_HOME_FILE.base64_decode($_GET['hash']));

    exit;
}



function __($str)
{
    return $str;
}

function esc__($s)
{
    $s = htmlspecialchars($s);
    //$s=addslashes($s);
    $s = str_replace('"', '', $s);
    $s = str_replace("'", '', $s);

    $s = trim($s);
    return $s;
}

function sql_esc($str)
{
    $str = trim($str);
    return $str;
}

function exit__()
{
    require_once 'homepage_components/footer.php';exit;

}
