<?php
	if($_POST["submit"] != null) {
		$do = $_POST["do"];
		$nitrit = $_POST["nitrit"];
		$amonia = $_POST["amonia"];

		if (updateSet($conn, $do, $nitrit, $amonia)) {
			echo "<meta http-equiv='refresh' content='0; url=?Open=lihat-data-device'>";
		}
	}
?>