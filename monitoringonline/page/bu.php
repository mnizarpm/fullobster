<?php
	$token = $_GET["token"];
	$method = $_GET["method"];

	// echo $token."<br>";
	// echo $method."<br>";

	if (cek_token($conn, $token)) {
		// echo "ada";
		switch ($method) {
			case 'send':
				if (isset($_GET['ph']) && isset($_GET['tds']) && isset($_GET['suhu'])) {
					$ph = $_GET["ph"];
					$tds = $_GET["tds"];
					$suhu = $_GET["suhu"];
					if(tambah_data($conn, $token, $ph, $tds, $suhu)){
						echo "KIRIM : sukses";	
					}else{
						echo "KIRIM : gagal";	
					}
				} else {
					echo "ERROR : data tidak lengkap";
				}
				break;			
			default:
				// code...
				break;
		}
	}else{
		echo "ERROR : token salah";
	}
?>