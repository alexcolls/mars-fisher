<?php
if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}

$link_ops=$sql->query("select *  from opt where link='$link' limit 1")->fetchArray();

?>
<link rel="stylesheet" href="<?php echo $k_plugin->url_ ?>css/patterns.css">
<div class="container-fluid mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $k_plugin->ajax_url ?>">Token panel</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $k_plugin->ajax_url; ?>&ui=<?php echo $ui; ?>">O-Panel</a></li>
            <li class="breadcrumb-item active">Patterns settings for <b>
                    <?php echo $link; ?></b></li>
        </ol>
    </nav>
</div>
<div class="container patterns_container my-4" style="" ng-app="app" ng-controller="patterns" data-ng-cloak>
    <div class="row">
        <div class="col">
            
            <div class="card ">
                <div class="card-header">
                    All operations
                </div>
                <div class="card-body">
                    <ul dnd-list="commands" class="list-group mb-4">
                        <li class="list-group-item" ng-repeat="item in commands" dnd-draggable="item" dnd-moved="commands.splice($index, 1)" dnd-effect-allowed="move" dnd-selected="models.selected = item" ng-class="{'selected': models.selected === item}">
                            {{item.title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            
            <div class="card border border-warning">
                <div class="card-header badge-warning">
                   Automated operations pattern
                </div>
                <div class="card-body">

                    

                    <h6 class="text-muted">Drag and drop operation here</h6>
                    <div class="" style="border: 1px dashed black">
                        <ul dnd-list="pattern" class="list-group mb-4">
                        <li class="list-group-item" ng-repeat="item in pattern" dnd-draggable="item" dnd-moved="pattern.splice($index, 1)" dnd-effect-allowed="move" dnd-selected="models.selected = item" ng-class="{'selected': models.selected === item}">
                           <b>{{$index+1}}</b>. {{item.title}} <small ng-show="pattern.length>$index+1"> ( {{item.title}} operation send result and then set <b>{{pattern[$index+1].title}}</b> )</small>
                        </li>
                    </ul>
                    </div>
                    <p class="text-warning"> When any of these operations will submit result, next operation will be set automatically </p>
                </div>
            </div>
        </div>


        
    </div>


    <div class="buttons mt-3 ">
            <button class="btn btn-outline-secondary" ng-click="reset()">Reset</button>
            <button class="btn btn-outline-info float-right" ng-click="save()">Save</button>
    </div>
</div>
<script type="text/javascript">
php_js.link = "<?php echo $link ?>";
php_js.ui = "<?php echo $ui ?>";
php_js.opts = <?php echo ($link_ops['opt']) ?>;
php_js.pattern = <?php echo ($link_ops['pattern']) ?>;
</script>
<script type="text/javascript" src="bower_components/angular-drag-and-drop-lists/angular-drag-and-drop-lists.min.js"></script>
<script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js1/patterns/patterns.js"></script>
<script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js1/patterns/patterns.ng.js"></script>
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->