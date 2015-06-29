<?php
header("Content-Type:application/json");
include("functions.php");
if (!empty($_GET['deg'])) {
	//process request
	$deg = $_GET['deg'];
	$fr = convert($deg);
	if (empty($fr)) {
		//deliver_response(200, "book not found", NULL);
		echo "Error. Check URL";
		echo "<br/>";
		echo "server?deg=[num]";
	}
	else {
		//deliver_response(200, "book found", $price);
		$json_response = json_encode($fr);
		echo $deg." C = ".$json_response." F";
	}
}
else
{
	//deliver_response(400, "invalid request", NULL);	
	echo "Error. Check URL"."<br>";
	echo "server?deg=[num]";
}
function deliver_response($status, $status_message, $data) {
	$response['status'] = $status;
	$response['$status_message'] = $status_message;
	$response['price'] = $data;
	$json_response = json_encode($response);
	echo $json_response;
}
?>