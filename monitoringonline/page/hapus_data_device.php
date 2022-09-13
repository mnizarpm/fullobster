<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if (strtoupper($_SESSION['ses_nama_level'])!="ADMIN") {
      echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
      // echo strtoupper($_SESSION['ses_nama_level']);
    }else{
      $username = $_GET["id"];
      if (hapus_device($conn, $username)) {
      	echo "<meta http-equiv='refresh' content='0; url=?Open=lihat-data-device'>";	
      }
	}
}
?>