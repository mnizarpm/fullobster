<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if (strtoupper($_SESSION['ses_nama_level'])!="ADMIN") {
      echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
      // echo strtoupper($_SESSION['ses_nama_level']);
    }else{
      // get_admin($conn);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Admin</h1><!-- 
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-info">Form Tambah user</h6>
          </div>
          <form action="?Open=input-data-user" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="username">Id</label>
              <input type="text" class="form-control" id="admin" name="admin" placeholder="Masukkan Id" style="display:none;" value="<?php echo $_SESSION['ses_login']?>">
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Id">
            </div>
            <div class="form-group">
              <label for="nama_user">Nama</label>
              <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan nama">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-info btn-md" value="submit"> Simpan</button>
          </div>
        </form>
      </div>
  </div>
</div>
<!-- /.row -->
<?php
	}
  }
?>
