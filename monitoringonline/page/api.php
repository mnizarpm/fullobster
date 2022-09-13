<?php
    require "../config/config.php";
    include "../function/function.php";
  
	$token = $_GET["id"];
	$method = $_GET["method"];

	// echo $token."<br>";
	// echo $method."<br>";
		// echo "ada";
		switch ($method) {
			case 'send':
				if (isset($_GET['ph']) && isset($_GET['status_ph']) && isset($_GET['suhu']) && isset($_GET['tds']) && isset($_GET['status_suhu'])&& isset($_GET['status_tds'])) {
					$ph = $_GET["ph"];
					$suhu = $_GET["suhu"];
					$tds = $_GET["tds"];
					$status_ph = $_GET["status_ph"];
					$status_suhu = $_GET["status_suhu"];
					$status_tds = $_GET["status_tds"];
					
					$do = getDo($conn);
					$nitrit = getNitrit($conn);
					$amonia = getAmonia($conn);
					
				// 	echo $do."<br>";
				// 	echo $nitrit."<br>";
				// 	echo $amonia."<br>";
				// 	echo $ph."<br>";
				// 	echo $tds."<br>";
				// 	echo $suhu."<br>";
				// 	echo $status_ph."<br>";
				// 	echo $status_suhu."<br>";
				// 	echo $status_tds."<br>";
					if(tambah_data($conn, $token, $ph, $suhu, $tds, $status_ph, $status_suhu, $status_tds, $do, $nitrit, $amonia)){
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
?>