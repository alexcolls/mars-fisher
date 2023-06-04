<?php 
/*
 Plugin name:Activities;
	
*/
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}
?>

<script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>

<script type="text/javascript" src="bower_components/angular/angular.min.js"></script>



<div class="container-fluid mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Activities</li>
        </ol>
    </nav>
</div>




<div class="container my-3"     ng-app="app" ng-controller="activities-controller">
		

	<div class="card card-body">
		<div class="text-right">
			<buton class="btn btn-outline-danger btn-sm" onclick="del_all()"> <i class="fa fa-trash"></i> Erase activity logs</buton>
		</div>
	</div>


	<div class="card card-body">
		<h6>Show activities where...</h6>
		<div class="row">
			<div class="col">
				<label for="id__">user is...</label>

	            
				
				<select name="users" class="form-control form-control-sm" id="users" ng-model="filter.user" >

					<option value="">Any...</option>
					<option data-ng-repeat="user in presets.users track by $index" value="{{user}}">{{(php_js.users | filter:{ui:user})[0].name }}</option>



				</select>
			</div>

			<div class="col">
				<label for="action"> and action is...</label>
				<select name="action" class="form-control form-control-sm" id="action" data-ng-model="filter.action">
					<option value="">Any...</option>
					<option data-ng-repeat="action in presets.actions track by $index" value="{{action}}">{{(php_js.actions | filter:{id:action})[0].desc?(php_js.actions | filter:{id:action})[0].desc:action }}</option>

				</select>
			</div>

			<div class="col">
				<label for="state"> and status is...</label>
				<select name="state" class="form-control form-control-sm" id="state" data-ng-model="filter.state">
					<option value="">Any...</option>
					<option data-ng-repeat="state in presets.states track by $index" value="{{state}}">{{state=='1'?'Permitted':"Blocked"}}</option>

				</select>
			</div>
		</div>	


		<div class="text-right mt-3">
			<button class="btn btn-outline-warning btn-sm" data-ng-click="filter_reset()">Resset</button>
		</div>
	</div>
</div>


<div class="container">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"></table>
            
</div>


<script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js/dataTbale.js?v=<?php echo uniqid() ?>"></script>
<script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js/ng.js?v=<?php echo uniqid() ?>"></script>
<script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js/js.js?v=<?php echo uniqid() ?>"></script>

