<?php
require_once "lib/nusoap.php";
 
function convert($deg){
	$fh = $deg * 1.8 +32;
	return $fh;
	}
 
$server = new soap_server();
$server->configureWSDL("server", "urn:server");
 
$server->register("convert",
    array("category" => "xsd:string"),
    array("return" => "xsd:string"),
    "urn:server",
    "urn:server#conv",
    "rpc",
    "encoded",
    "Get a listing of products by category");
 
$server->service($HTTP_RAW_POST_DATA);