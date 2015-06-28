<?php
require_once "lib/nusoap.php";

function convert($deg){
	$fh = $deg * 1.8 +32;
	return $fh;
	}
 
$server = new soap_server();
$server->register("convert");
$server->service($HTTP_RAW_POST_DATA); 	
?>