<?php
//new php file

if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>U-Panel |
            <?php echo UADMIN_VERSION ?>
        </title>
        <link rel="shortcut icon" type="image/png" href="favicon.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!--FontAwesome-->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!--FontAwesome-->
        <!-- Animate.css -->
        <link rel="stylesheet" href="bower_components/animate.css/animate.min.css">
        <!-- Animate.css -->
        <!--BS3 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!--BS3 -->
        <link rel="stylesheet" href="css/main.css">
    </head>
    <style type="text/css">
    /*body {
    font-family: 'Open Sans Condensed', sans-serif !important;
}*/
    </style>
    <!--jQuery-->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!--jQuery-->

    <body>
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="card animated zoomIn">
                        <div class="card-header">
                            Sign In <small class="float-right">V.<?php echo UADMIN_VERSION ?></small>
                        </div>
                        <div class="card-body ">
                            <form name="login-form" id="login-form" novalidate onsubmit="login();return false">
                                <div class="form-group">
                                    <label for="user">
                                        Username
                                    </label>
                                    <input type="text" class="form-control" id="user" name="user" autofocus="true" placeholder="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="user">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-secondary btn-block ">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        <!-- BS3-->
        <!-- <script src="bower_components/bootstrap/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script> -->
        <!-- BS3-->
        
        <!-- Bootstrap notify-->

        <script src="node_modules/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
        <!-- Bootstrap notify-->
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>

    </html>
    <?php
exit;   
?>