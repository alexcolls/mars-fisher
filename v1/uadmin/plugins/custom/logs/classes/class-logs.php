<?php
if(!defined('UADMIN_AB_ROOT')){die("You not have permisions");}

$logs=array();



class LOG_{


	function __construct($log){
		global $k_plugin;
		foreach($log as $k=>$v){
			$this->{$k}=$v;
		}

		$this->files=array();

		if(file_exists($k_plugin->path.'public/docs/'.$this->bid)){
			$this_log_path=$k_plugin->path.'public/docs/'.$this->bid.'/';
			$docs=glob($this_log_path.'*.{jpg,png,gif,jpeg,JPG,PNG,GIF,JPEG}',GLOB_BRACE);

			$docs=array_map(function($doc){
				global $k_plugin;
				return  $k_plugin->url_.'public/docs/'.basename(dirname($doc)).'/'.basename($doc);
			},$docs);
			$this->files=$docs;
		//	print_r($docs);
		}



	}


	static function init(){
		global $sql,$logs;

        $logs_=$sql->query('select rowid as ui,* from main');
        while($res=$logs_->fetchArray(SQLITE3_ASSOC)){
        	$logs[]=new LOG_($res);
        }
	}


}


?>
