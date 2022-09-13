<?php
	include '../config/config.php';
	include '../function/function.php';
	echo json_encode(get_dataPh($conn));
?>