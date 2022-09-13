<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Device</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tabel Device</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama device</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                <tbody>
                  <?php
                    $data = get_device_user($conn, $_SESSION['ses_login']);
                    foreach ($data as $key => $value) {
                      echo "<tr>";
                      $id_device = $value['id_device'];
                      $nama_device = $value['nama_device'];
                      echo '
                        <td>
                          '.$nama_device.'
                        </td>
                      ';
                      echo '
                      <td>
                        <center>
                          <a href="?Open=monitoring-user&id='.$id_device.'" type="button" class="btn btn-success btn-sm"> Lihat data</a>
                        </center>
                      </td>
                      ';
                      echo "</tr>";
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
  }
?>
