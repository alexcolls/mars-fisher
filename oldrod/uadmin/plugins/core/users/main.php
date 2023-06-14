<?php
/*
  Plugin name:Users;

*/
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}





$php_js->users=$users;


// This script remove admin from user list
foreach($php_js->users as $key=>$val){
    if($val->type=='0'){
        unset($php_js->users[$key]);
    }
}   

$php_js->users=array_values($php_js->users);
// This script remove admin from user listx







$php_js->plugins=$plugins;
$php_js->actions=$actions;


?>
<script type="text/javascript">
var php_js = <?php echo json_encode($php_js) ?>
</script>
<script type="text/javascript" src="bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="bower_components/checklist-model/checklist-model.js"></script>

<!-- <link rel="stylesheet" href="<?php echo $k_plugin->url_ ?>users.css"> -->
<div class="mt-3" ng-app="users-app" ng-controller="users-crtl" ng-cloak>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action" ng-repeat="user in users track by $index " ng-click="$parent.selected_user=users[$index]" ng-class="{'active':$parent.selected_user.ui==user.ui}">
                        {{user.name}}
                        <button class="btn btn-danger btn-sm float-right" ng-click="remove_user($event,user.ui,$index)">
                            <span class="fa fa-trash-o"></span>
                        </button>
                    </div>
                    <div class="list-group-item" href="javascript:void(0)" ng-click="add_new()"> <i class="fa fa-plus-circle "></i> Add new</div>
                </div>
            </div>
            <div class="col" ng-show="users.length>0">
                <!--  -->
                <div class="accordion" id="userSettAccordion">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link p-0" type="button" data-toggle="collapse" data-target="#pass">
                                <h6 class="m-0">Change password for {{selected_user.name}}</h6>
                            </button>
                        </div>
                        <div id="pass" class="collapse show" data-parent="#userSettAccordion">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" ng-model="data.new_pass" placeholder="Enter new Password..." name="new_pass" class="form-control" id="new_pass" class="">
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-outline-primary" ng-click="udpate_pass();">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link p-0" type="button" data-toggle="collapse" data-target="#visibility">
                                <h6 class="m-0">Plugins visibility for {{selected_user.name}}</h6>
                            </button>
                        </div>
                        <div id="visibility" class="collapse" aria-labelledby="headingTwo" data-parent="#userSettAccordion">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" ng-model="data.plugin_search" placeholder="Search Plugin..." name="plugin_search" class="form-control" id="plugin_search" class="">
                                    <!-- <span class="fa fa-search icon-6"></span> -->
                                </div>
                                <div class="plugins-list">
                                    <div class="plugin-item clearfix" ng-repeat="plugin in plugins | filter:data.plugin_search | orderBy:'name'" ng-hide="plugin.id=='welcome'">
                                        <span class="plugin-name">{{plugin.name}}</span>
                                        <span class="plugin-ch pull-right ">
                                            <input type="checkbox" ng-checked="selected_user.perm_view.indexOf(plugin.id)!=-1" ng-disabled="plugin.id=='profile' || plugin.id=='users'" ng-click="change_selected_user_prem_view(plugin.id,selected_user.perm_view.indexOf(plugin.id)!=-1)">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 50px;text-align: right;">
                                    <button class="btn btn-outline-primary" ng-click="udpate_perm_view()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link p-0" type="button" data-toggle="collapse" data-target="#actions">
                                <h6 class="m-0">Actions Permission for {{selected_user.name}}</h6>
                            </button>
                        </div>
                        <div id="actions" class="collapse" data-parent="#userSettAccordion">
                            <div class="card-body">
                                <div class="">
                                    <input type="text" ng-model="data.action_search" placeholder="Search Actions..." name="action_search" class="form-control" id="action_search" class="">
                                </div>
                                <div class="plugins-list">
                                    <div class="plugin-item clearfix" ng-repeat="action in actions | filter:data.action_search | orderBy:'desc'">
                                        <span class="plugin-name">{{action.desc}}</span>
                                        <span class="plugin-ch pull-right ">
                                            <input type="checkbox" ng-checked="selected_user.perm_action.indexOf(action.id)==-1" ng-disabled="action.id=='udpate_style'" ng-click="change_selected_user_perm_action(action.id,selected_user.perm_action.indexOf(action.id)!=-1)">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 50px;text-align: right;">
                                    <button class="btn btn-outline-primary" ng-click="udpate_perm_action()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link p-0" type="button" data-toggle="collapse" data-target="#custom">
                                <h6 class="m-0">Custom settings for {{selected_user.name}}</h6>
                            </button>
                        </div>
                        <div id="custom" class="collapse" data-parent="#userSettAccordion">
                            <div class="card-body">
                                <label for="" style="color: {{selected_user.color}};font-weight: 700;font-size: 20px">{{selected_user.name }}</label>
                                <div class="">
                                    <a href="javascript:void(0)" class="" ng-click="selected_user.color='red'"> <span class="fa fa-circle" style="color: red;font-size: 20px"></span> </a>
                                    <a href="javascript:void(0)" class="" ng-click="selected_user.color='blue'"> <span class="fa fa-circle" style="color: blue;font-size: 20px"></span> </a>
                                    <a href="javascript:void(0)" class="" ng-click="selected_user.color='black'"> <span class="fa fa-circle" style="color: black;font-size: 20px"></span> </a>
                                    <a href="javascript:void(0)" class="" ng-click="selected_user.color='green'"> <span class="fa fa-circle" style="color: green;font-size: 20px"></span> </a>
                                    <a href="javascript:void(0)" class="" ng-click="selected_user.color='silver'"> <span class="fa fa-circle" style="color: silver;font-size: 20px"></span> </a>
                                    <a href="javascript:void(0)" class="" ng-click="selected_user.color='orange'"> <span class="fa fa-circle" style="color: orange;font-size: 20px"></span> </a>
                                </div>
                               
                                <div class="form-group" style="margin-top: 50px;text-align: right;">
                                    <button class="btn btn-outline-primary" ng-click="udpate_custom_sett()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link p-0" type="button" data-toggle="collapse" data-target="#link_filter">
                                <h6 class="m-0">Links visibility for {{selected_user.name}}</h6>
                            </button>
                        </div>
                        <div id="link_filter" class="collapse" data-parent="#userSettAccordion">
                            <div class="card-body">
                               <b>{{selected_user.name}} can see only ...</b> <small class="float-right">( ex: link1,link2,link3... )</small>
  
                               <textarea name="links_filter" id="links_filter" ng-focus="link_focus_callback()" data-ng-blur="link_blur_callback()" ng-list data-ng-model="selected_user.links_filter"  class="form-control">qweqw,qweqw,eqwe,qweqwe,qwe,qw</textarea>

                               <b>*</b> = see all. ( default )
                               
                                <div class="form-group" style="margin-top: 50px;text-align: right;">
                                    <button class="btn btn-outline-primary" ng-click="udpate_link_filter()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
               
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js/users.js"></script>
    <script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js/users.ng.js"></script>