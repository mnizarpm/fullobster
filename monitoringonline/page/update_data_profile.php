<?php
	if($_POST["submit"] != null) {
		$username = $_POST["username"];
		$passwordlama = $_POST["passwordlama"];

		$nama_user = "";
		$nama = "";
		$passwordbaru1 = "";
		$passwordbaru2 = "";

		if (isset($_POST["nama_user"])) {
			$nama_user = $_POST["nama_user"];
		}
		if (isset($_POST["nama"])) {
			$nama = $_POST["nama"];
		}
		if (isset($_POST["passwordbaru1"]) && isset($_POST["passwordbaru2"])) {
			$passwordbaru1 = $_POST["passwordbaru1"];
			$passwordbaru2 = $_POST["passwordbaru2"];
		}

		// echo $username."<br>";
		// echo $nama_user."<br>";
		// echo $nama."<br>";
		// echo $passwordlama."<br>";
		// echo $passwordbaru1."<br>";
		// echo $passwordbaru2."<br>";


		if(cek_password($conn, $username, $passwordlama)){
			if ($passwordbaru1!="") {
				if ($passwordbaru1==$passwordbaru2) {
					if (!ganti_password($conn, $username, $passwordbaru1)) {
						?>
						<script type="text/javascript">
							alert("Ganti password gagal");
						</script>
						<?php
						echo "<meta http-equiv='refresh' content='0; url=?Open=ubah'>";
					}
				} else {
					?>
					<script type="text/javascript">
						alert("Password baru tidak sama");
					</script>
					<?php
				}
			}
			if ($nama_user!="") {
				if (!ganti_username($conn, $username, $nama_user)) {
					?>
					<script type="text/javascript">
						alert("Ganti Username gagal");
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=?Open=ubah'>";
				}
			}
			if ($nama!="") {
				if (!ganti_nama($conn, $username, $nama)) {
					?>
					<script type="text/javascript">
						alert("Ganti nama gagal");
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=?Open=ubah'>";
				}
			}
			echo "<meta http-equiv='refresh' content='0; url=?Open'>";

		}else{
			?>
			<script type="text/javascript">
				alert("Username atau password tidak valid.");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=?Open=ubah'>";
		}
		// if (update_user($conn, $username, $nama_user, $device)) {
		// 	echo "<meta http-equiv='refresh' content='0; url=?Open=lihat-data-user'>";
		// }
	}
?>