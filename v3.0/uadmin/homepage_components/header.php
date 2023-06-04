<?php 
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}
 ?>


<!DOCTYPE html>
<html>

<head>
    <title>Unknown |
        <?php echo UADMIN_VERSION ?>
    </title>
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--FontAwesome-->
    <link rel="stylesheet" href="bower_components/components-font-awesome/css/font-awesome.min.css">
    <!--FontAwesome-->

    <!--BS3 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!--BS3 -->


    <!-- BS on fly -->
    <link rel="stylesheet" id="theme_css" href="https://bootswatch.com/4/<?php echo $k_user->style ?>/bootstrap.min.css" />  
    <!-- BS on fly -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="bower_components/animate.css/animate.min.css">
    <!-- Animate.css -->


    
    <!-- Hover.css -->
    <!-- <link rel="stylesheet" href="bower_components/hover/css/hover-min.css"> -->
    <!-- Hover.css -->
    
    <link rel="stylesheet" href="css/main.css">


</head>

<!--jQuery-->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!--jQuery-->

<!-- DataTable -->
<link rel="stylesheet" href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">



<!-- <link rel="stylesheet" href="bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->

<link rel="stylesheet" href="node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

<!-- <link rel="stylesheet" href="bower_components/datatables.net-select-bs4/css/select.bootstrap4.min.css"> -->

<!-- DataTable -->

<body>