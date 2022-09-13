<?php
	$id_device = $_GET["id"];
	$value = $_GET["val"];
    send_data($conn, $id_device, $value);
?>