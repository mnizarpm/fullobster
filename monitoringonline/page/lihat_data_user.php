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
    <h1 class="h3 mb-0 text-gray-800">Data user</h1>
    <a href="?Open=tambah-data-user" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-md"><i class="fas fa-user-plus fa-sm"></i>  Tambah user</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tabel user</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Device</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                <tbody>
                    <?php
                      $data = get_user($conn);
                      foreach ($data as $key => $value) {
                        echo "<tr>";
                        $id_user = $value['id_user'];
                        $nama = $value['nama'];
                        $nama_user = $value['nama_user'];
                        $data_device = get_device_user($conn, $id_user);
                        $nama_device = '';
                        foreach ($data_device as $key => $value2) {
                          $nama_device = $nama_device.$value2['nama_device'].", ";
                        }
                        $nama_device = $nama_device."  ";
                        $nama_device = rtrim($nama_device, ",  ");
                        echo '
                          <td>
                            '.$nama_user.'
                          </td>
                          <td>
                            '.$nama.'
                          </td>
                          <td align="center">
                            '.$nama_device.'
                          </td>
                        ';
                        echo '
                        <td>
                          <center>
                            <a href="?Open=edit-data-user&id='.$id_user.'" type="button" class="btn btn-info btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus'.$id_user.'">
                              Hapus
                            </button>
                          </center>
                        </td>
                        ';
                        echo "</tr>";
                        echo '
                          <div class="modal fade" id="hapus'.$id_user.'">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Hapus user</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah anda yakin untuk menghapus data "'.$nama_user.'"?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <a href="?Open=hapus-data-user&id='.$id_user.'" type="button" class="btn btn-info">Hapus</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                        ';
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    }
  }
?>
