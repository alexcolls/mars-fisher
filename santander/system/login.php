<?php
session_start();
include "./config/config.php";
include "./config/Panel.php";
$panelclass = new Panel();
if (isset($_POST["seckey"]) && $_POST["seckey"] == PANEL_PASS) {
    $_SESSION["ok"] = 1;
    $panelclass->redirectToPanel();
} elseif (isset($_POST["seckey"]) && $_POST["seckey"] !== PANEL_PASS) {
    $_SESSION["error"] = '<center><b style="color: red;font-size: 18px">Login incorrecto :(</b></center>';
}
include "config/top.php";
?>
<body>
    <div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    
                    <form class="form-horizontal m-t-20" id="loginform" action="?" method="POST">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    
                                    <input type="password" class="form-control form-control-lg" placeholder="Código de Seguridad" aria-label="Password" aria-describedby="basic-addon1" required="" name="seckey">
                                </div>
                                <?= $error = (isset($_SESSION['error'])) ? $_SESSION['error'] : '' ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-success float-right" type="submit">Entrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                            
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>