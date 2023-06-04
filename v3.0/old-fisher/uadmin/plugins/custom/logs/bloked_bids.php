<?php 	


if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}  


if(!$res=$sql->query("SELECT name FROM sqlite_master WHERE name='bloked'")->fetchArray()){
   $r=$sql->exec("create table bloked (bids TEXT)");
   if($r){
   	$test_bid='["testbid"]';
   	$r=$sql->exec("insert into bloked(bids) values('$test_bid')");
   }
}


$bloked_array=json_decode($sql->query("select bids from bloked limit 1")->fetchArray()[0]);




 ?>



<div  class=""  style="padding-top:70px ">
		<div  class="container "  style="">

<ul class="nav nav-pills">
  <li role="presentation" class=""><a href="<?php echo $k_plugin->ajax_url;?>"> <span class="fa fa-arrow-left"></span> <?php echo __('Back to Panel')?></a></li>
  
</ul>
				<div  class="alert alert-info "  style="">
						List of banned BID's. Separated by new line. Try to trim it form all ends
				</div>
				<div  class=" "  style="">
						<h3 class=""  style="">BID's</h3>
						<hr class="" style=""/>
						<div  class="row "  style="">
								<div  class="col-sm-5"  style="">
										
										
									<form onsubmit="return false" id="mf" class="mf"	method="POST"  >
										<div class="form-group">
						                   <textarea class="form-control bids"  name="bids" rows="10"  placeholder=""><?php 

						                   			foreach($bloked_array as $bid){
						                   				echo $bid.PHP_EOL;
						                   			}
						                    ?></textarea>
										   
						                </div>
										
										<div  class="form-group "  style="">
												<button class="btn btn-info" onclick="save_bids();" style="">Save</button>
										</div>
									</form>	
								</div>
								
								<!-- <div  class="col-sm-7 "  style="">
										<p>Download and upload to you directory small php file "banip.php"</p>
										<a href="?p=robots&get_file" class="btn btn-primary" style="">Download <span  class="fa fa-download "></span> </a>
										<p>Add it to your page code using include or require function.On the very top of the page!</p>
										<code>...<br>
												require_once("banip.php")<br>
												...
										</code>
										<p>Than in html code , after BODY tag add:</p>
										
										
										<code>
												&lt;a href=&quot;banip.php?ban&quot; class=&quot;&quot; style=&quot;display:none&quot;&gt;&lt;/a&gt;
										</code>
								</div> -->
								
								
						</div>
						
				</div>
		</div>
</div>
<script type="text/javascript">
	



function save_bids(){
	 bids=$('.bids').val().split('\n');
	 bids=jQuery.unique(bids);
	 bids = bids.filter(function(e){return e});
	 bids=$.map(bids,function(q,w){return q.trim()})

	 show_loader__()

	 $.ajax({
	 	url:"<?php echo $k_plugin->ajax_url ?>&savebannedbids",
	 	dataType:"json",
	 	data:{bids:JSON.stringify(bids)},
	 	success:function(data){
	 		hide_loader__();
	 	}
	 })


}



</script>














