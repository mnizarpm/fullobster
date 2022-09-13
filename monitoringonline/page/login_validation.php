<?php
	if($_POST["submit"] != null) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		if (cek_login($conn, $username, $password)) {
			echo "<meta http-equiv='refresh' content='0; url=?Open'>";
		}else{
			?>
			<script type="text/javascript">
				alert("Username atau password tidak valid.");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
		}
		
	}
?>