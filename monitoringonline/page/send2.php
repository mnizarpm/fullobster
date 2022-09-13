<?php
	$value2 = $_GET["val"];
	$value1 = $_GET["id"];
    // send_data2($conn, $value1, $value2);
    $arrayku = array($value1, $value2);
	echo json_encode($arrayku);
	// echo $value2;
?>