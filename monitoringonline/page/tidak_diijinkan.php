<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tidak diijinkan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tidak diijinkan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <!-- <h2 class="headline text-warning"> 404</h2> -->

        <!-- <div class="error-content"> -->
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Halaman tidak dapat diakses.</h3>

          <p>
            Halaman ini hanya dapat diakses oleh sebagian user.
            Anda dapat <a href="?Open">kembali ke dashboard</a> atau membuka halaman lain.
          </p>
        <!-- </div> -->
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
  <!-- /.content -->
</div>
<?php
  }
?>
