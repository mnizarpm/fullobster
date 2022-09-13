<?php
	if($_POST["submit"] != null) {
		$id_device = $_POST["id_device"];
		$nama_device = $_POST["nama_device"];

		if (update_device($conn, $id_device, $nama_device)) {
			echo "<meta http-equiv='refresh' content='0; url=?Open=lihat-data-device'>";
		}
	}
?>