<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
      $data = getSementara($conn);
      $do = $data['do'];
      $nitrit = $data['nitrit'];
      $amonia = $data['amonia'];
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Set data</h1>
</div>

<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-4 col-lg-3">
      <div class="card shadow mb-4">
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-info">Form Set</h6>
          </div>
        <form action="?Open=update-set" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="do">Do</label>
                  <input type="text" class="form-control" id="do" name="do" placeholder="Masukkan do" value="<?php echo $do;?>">
                </div>
              </div>
             </div>
             <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="nitrit">Nitrit</label>
                  <input type="text" class="form-control" id="nitrit" name="nitrit" placeholder="Masukkan nitrit" value="<?php echo $nitrit;?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="amonia">Amonia</label>
                  <input type="text" class="form-control" id="amonia" name="amonia" placeholder="Masukkan amonia" value="<?php echo $amonia;?>">
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
