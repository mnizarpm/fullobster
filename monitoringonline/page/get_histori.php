<?php
	include '../config/config.php';
	include '../function/function.php';
	$id = $_GET['id'];
	$hari = $_GET['hari'];
	echo json_encode(get_histori($conn, $id, $hari));
?>