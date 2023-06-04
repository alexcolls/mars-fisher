<?php 

/*
            Plugin name:Profile;
*/              
                
                
if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}
                
                
?>
<script type="text/javascript" src="bower_components/angular/angular.min.js"></script>
<link rel="stylesheet" href="<?php echo $k_plugin->url_ ?>css/profile.css">


<div class="mt-3" ng-app="profile-app">
    <div class=""  ng-controller="update-pass">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?">Home</a></li>
    
    <li class="breadcrumb-item active" aria-current="page">Profile settings</li>
  </ol>
</nav>
        </div>
        <div class="container">
            
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Password</h5>
                        </div>
                        <div class="card-body">
                            <form name="profile" onsubmit="return false" ng-submit="profile.$valid && update_pass()" novalidate>
                                <div class="form-group">
                                    <label for="old_pass" class="">Current password</label>
                                    <input type="password" class="form-control" name="old_pass" ng-model="data.old_pass" id="old_pass" pattern=".{2,}" required placeholder="***********">
                                </div>
                                <div class="form-group">
                                    <label for="new_pass" class="">New Password</label>
                                    <input type="password" class="form-control" name="new_pass" ng-model="data.new_pass" pattern=".{2,}" id="new_pass" required placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="new_pass2" class="">Repeat New Password</label>
                                    <input type="password" class="form-control" name="new_pass2" ng-model="data.new_pass2" pattern=".{2,}" id="new_pass2" required placeholder="">
                                </div>
                                <div class="form-group " style="">
                                    <button class="btn btn-outline-info " style="" ng-disabled="profile.$invalid">
                                        <?php echo __('Save')?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col" style="">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="" style="">
                                Change Theme
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label" for="">Theme</label>
                                <select class="form-control" id="new_theme" name="new_theme">
                                    <?php $themen_arr=array("cerulean", "cosmo", "cyborg", "darkly", "flatly", "journal", "litera", "lumen", "lux", "materia", "minty", "pulse", "sandstone", "simplex", "sketchy", "slate", "solar", "spacelab", "superhero", "united", "yeti"); ?>
                                    <?php foreach($themen_arr as $themme__){?>
                                    <option value="<?php echo $themme__;?>" <?php if($themme__==$k_user->style){echo "selected";};?> >
                                        <?php echo $themme__;?>
                                    </option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form-group " style="">
                                <button class="btn btn-outline-info " onclick="save_new_theme()" style="">
                                    <?php echo __('Save')?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
* {
    transition: all 0.3s ease;
}
</style>
<script type="text/javascript" src="<?php echo $k_plugin->url_ ?>js/profile.js"></script>
<script type="text/javascript">
</script>