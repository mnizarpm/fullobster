<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if ((strtoupper($_SESSION['ses_nama_level'])!="ADMIN") && (strtoupper($_SESSION['ses_nama_level'])!="USER")) {
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
        // if (hapus_data($conn, $id, $dari, $hingga)) {
        echo "<meta http-equiv='refresh' content='0; url=file/print_data.php?i=".base64_encode($id)."&d=".base64_encode($dari)."&h=".base64_encode($hingga)."'>";  
              // }    
      }
	}
}
?>