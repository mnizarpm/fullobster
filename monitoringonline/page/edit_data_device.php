<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if (strtoupper($_SESSION['ses_nama_level'])!="ADMIN") {
      echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
      // echo strtoupper($_SESSION['ses_nama_level']);
    }else{
      $id_device= $_GET["id"];
      $data = get_device2($conn, $id_device);
      $nama_device = $data['nama_device'];
      // print_r($data);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Device</h1>
    <!-- <a href="?Open=tambah-data-admin" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-md"><i class="fas fa-user-plus fa-sm"></i>  Tambah admin</a> -->
</div>

<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-info">Form Edit Device</h6>
          </div>
        <form action="?Open=update-data-device" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="nama_user">Nama</label>
              <input type="text" class="form-control" id="nama_device" name="nama_device" placeholder="Masukkan nama" value="<?php echo $nama_device;?>">
              <input type="text" class="form-control" id="id_device" name="id_device" placeholder="Masukkan Id" style="display: none;" value="<?php echo $id_device;?>" >
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
