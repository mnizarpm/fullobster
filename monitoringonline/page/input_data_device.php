<?php
	if($_POST["submit"] != null) {
		$nama_device = $_POST["nama_device"];
		if (tambah_device($conn, $nama_device)) {
			echo "<meta http-equiv='refresh' content='0; url=?Open=lihat-data-device'>";
		}
	}
?>