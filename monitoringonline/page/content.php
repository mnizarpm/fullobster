<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    ?>

      <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-info">Selamat Datang</h6>
          </div>
          <div class="card-body">
            <h4>
              Selamat datang di website monitoring kualitas air.
            </h4>
            <p>
              Website ini adalah website yang merekam dan memvisualisasikan data monitoring kondisi air. Parameter yang di monitor adalah tingkat keasaman, temperatur pada air dan zat pdat terlarut dalam air.
            </p>
          </div>

      </div>
  </div>
</div>

    <?php
  }
?>
