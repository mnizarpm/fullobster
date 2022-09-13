<?php
	if($_POST["submit"] != null) {
		$id = $_POST["id"];
		$nama = $_POST["nama"];
		$device = $_POST["device"];
		if (update_user($conn, $id, $nama, $device)) {
			echo "<meta http-equiv='refresh' content='0; url=?Open=lihat-data-user'>";
		}
	}
?>