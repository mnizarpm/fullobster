<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if (strtoupper($_SESSION['ses_nama_level'])!="ADMIN") {
      echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
      // echo strtoupper($_SESSION['ses_nama_level']);
    }else{
      $id = $_GET["id"];
      $nama_user = get_user2($conn, $id);
      $nama = get_nama($conn, $id);
      $device = get_device_user($conn, $id);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data User</h1>
    <!-- <a href="?Open=tambah-data-admin" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-md"><i class="fas fa-user-plus fa-sm"></i>  Tambah admin</a> -->
</div>

<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-info">Form Edit User</h6>
          </div>
        <form action="?Open=update-data-user" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="username">Id</label>
              <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan Id" value="<?php echo $nama_user;?>" disabled >
              <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan Id" style="display: none;" value="<?php echo $id;?>" >
            </div>
            <div class="form-group">
              <label for="nama_user">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="<?php echo $nama;?>">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Device</label>
            <select class="mul-select form-control" multiple="true" name="device[]" >
              <?php
                  $data = get_device($conn);
                  foreach ($data as $key => $value) {
                    $id_device = $value['id_device'];
                    $nama_device = $value['nama_device'];
                    if(cek_device($nama_device, $device)){
                      echo '<option value="'.$id_device.'" selected>'.$nama_device.'</option>';
                    } else {
                      echo '<option value="'.$id_device.'">'.$nama_device.'</option>';
                    }
                  }
               ?>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-info" value="submit"> Simpan</button>
          </div>
        </form>
      </div>
  </div>
</div>
<?php
	}
  }
?>
