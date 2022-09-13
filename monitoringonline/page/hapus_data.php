<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if (strtoupper($_SESSION['ses_nama_level'])!="ADMIN") {
      echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
      // echo strtoupper($_SESSION['ses_nama_level']);
    }else{
      if($_POST["submit"] != null) {
              $id = $_POST["id"];
              $dari = $_POST["dari"];
              $hingga = $_POST["hingga"];

              // echo $id."<br>";
              // echo $dari."<br>";
              // echo $hingga."<br>";
              if (hapus_data($conn, $id, $dari, $hingga)) {
               echo "<meta http-equiv='refresh' content='0; url=?Open=histori&id=".$id."'>";  
              }
      }
	}
}
?>