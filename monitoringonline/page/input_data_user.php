<?php
	if($_POST["submit"] != null) {
		$username = $_POST["username"];
		$nama_user = $_POST["nama_user"];
		$device = $_POST["device"];
		$data_username = username($conn);

		// foreach ($data_username as $key => $value) {
		// 	echo $value."<br>";
		// }
		if (!in_array($username, $data_username)) {
			if (tambah_user($conn, $username, $nama_user, $device)) {
				echo "<meta http-equiv='refresh' content='0; url=?Open=lihat-data-user'>";
			}
		}else{
			?>
				<script type="text/javascript">
					alert('username sudah digunakan');
				</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=?Open=tambah-data-user'>";
		}
	}
?>