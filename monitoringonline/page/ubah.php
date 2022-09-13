<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
      $username = $_SESSION['ses_login'];
      $data = get_user3($conn, $username);
      $nama_user = $data['nama_user'];
      $nama = $data['nama'];
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
</div>

<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-info">Form Edit Profil</h6>
          </div>
        <form action="?Open=update-data-profile" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_user">USername / Id</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Id" style="display: none;" value="<?php echo $username;?>" >
                  <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan nama" value="<?php echo $nama_user;?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_user">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="<?php echo $nama;?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="nama_user">Password lama</label>
              <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Masukkan password lama" required="">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_user">Password baru</label>
                  <input type="password" class="form-control" id="passwordbaru1" name="passwordbaru1" placeholder="Abaikan jika tidak ingin mengubah password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_user">Konfirmasi password baru</label>
                  <input type="password" class="form-control" id="passwordbaru2" name="passwordbaru2" placeholder="Abaikan jika tidak ingin mengubah password">
                </div>
              </div>
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
?>
