<?php
	include '../config/config.php';
	include '../function/function.php';
	$id = $_GET['id'];
	// echo $id;
	echo json_encode(get_data_device2($conn, $id));
?>