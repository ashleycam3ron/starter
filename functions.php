<?php
	//!Scan functions foldder
	$inc = scandir(dirname(__FILE__).'/functions');
	foreach($inc as $k=>$v){
		if($k>1 && is_file(dirname(__FILE__) . '/functions/'.$v)) include(dirname(__FILE__).'/functions/'.$v);
	}