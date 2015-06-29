<form name="testForm" id="testForm"  method="POST"  >
	<input type="number" id="deg" name="deg" placeholder="degree">
    <input type="submit" name="btn" value="submit" autofocus  onclick="return true;"/>
</form>

<?php
if(isset($_POST['btn'])){	
require_once "lib/nusoap.php";
$client = new nusoap_client("http://localhost/nusoap/server.php");
 
$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
 
$deg = $_POST['deg'];
echo "<h2>Celcius</h2><pre>";
        echo $deg." C";
        echo "</pre>";
$result = $client->call("convert", array($deg));
 
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Farenheight</h2><pre>";
        echo $result." F";
        echo "</pre>";
    }
}
}
?>