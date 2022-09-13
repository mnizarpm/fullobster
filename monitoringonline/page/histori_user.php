<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if (strtoupper($_SESSION['ses_nama_level'])!="USER") {
      echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
      // echo strtoupper($_SESSION['ses_nama_level']);
    }else{
      $data = get_device_user($conn, $_SESSION['ses_login']);
        $deviceku = array();
        foreach ($data as $key => $value) {
            array_push($deviceku, $value['id_device']);
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if(in_array($id, $deviceku)){
            }else{
                echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
            }
            $data = get_device2($conn, $id);
        }
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Monitoring <?php echo $data['nama_device']?></h1>
    <div class="d-none d-sm-inline-block">
        <button class=" btn btn-sm btn-info shadow-md" data-toggle="modal" data-target="#cetak"><i class="fas fa-download fa-sm"></i>  Cetak data</button> 
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-info">Tabel data <?php echo $data['nama_device']?></h6> -->
                <div class="input-group mb-3">
                  <input type="date" class="form-control"  id="hariku" name="hariku" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-sm btn-info shadow-md" type="button" onclick='myFunction()'><i class="fas fa-filter fa-sm"></i> Filter</button>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Ph</th>
                                <th>Suhu</th> 
                                <th>TDS</th> 
                                <th>DO</th> 
                                <th>Nitrit</th> 
                                <th>Amonia</th> 
                            </tr>
                        </thead>
                        <tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DataTales Example -->

<div class="modal fade" id="cetak">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cetak data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?Open=cetak-data" method="post">
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label for="dari">Dari</label>
                  <input type="date" class="form-control" id="dari" name="dari" required="">
                  <input type="text" class="form-control" id="id" name="id" required="" value="<?php echo $id?>" style="display: none;">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <label for="hingga">Hingga</label>
                  <input type="date" class="form-control" id="hingga" name="hingga" required="">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <button type="submit" name="submit" class="btn btn-info btn-md" value="submit"> cetak</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
        // $('#dataTable').DataTable();
        var result = [];
        var wkt = [];
        var tds = [];
        var ph = [];
        var suhu = [];
        var doo = [];
        var nitrit = [];
        var amonia = [];
        var ambil = function (id, hari) {
          var url_nya = 'https://fullobster.monitoringonline.net/page/get_histori.php?id='+id+'&hari='+hari;
          console.log(url_nya);
          $.ajax({
            type: 'POST', //post method
            url: url_nya,
            dataType: "json",
            success: function (result, textStatus, jqXHR)
            {
                wkt = result[0];
                ph = result[1];
                suhu = result[2];
                tds = result[3];
                status_ph = result[4];
                status_suhu = result[5];
                doo = result[6];
                nitrit = result[7];
                amonia = result[8];
                // document.getElementById("demo2").innerHTML = wkt.length;
                
                var num = 0;
                var c = wkt.length;
                $('#dataTable').dataTable().fnClearTable();
                $('#dataTable').dataTable().fnDestroy();
                var data = [];
                for (let i = 0; i < wkt.length; i++) {
                    // t.row.add( [
                    //     wkt[num],
                    //     phIn[num],
                    //     phOut[num]
                    // ] ).draw( false );
                    if (status_ph[num] == '0') {
                      state_ph = 'NETRAL';
                    }
                    if (status_ph[num] == '1') {
                      state_ph = 'ASAM';
                    }
                    if (status_ph[num] == '2') {
                      state_ph = 'BASA';
                    }

                    if (status_suhu[num] == '0') {
                      state_suhu = 'NORMAL';
                    }
                    if (status_suhu[num] == '1') {
                      state_suhu = 'PANAS';
                    }

                    data.push( [wkt[num], ph[num], suhu[num], tds[num], doo[num], nitrit[num], amonia[num]] );
                    num += 1;
                }
                $('#dataTable').DataTable( {
                    data:  data,
                    order: [[ 0, 'desc' ]]
                } );
                
                
                
            },
            error: function(xhr, status, error) {
                console.log('fail');
              var err = eval("(" + xhr.responseText + ")");
              console.log(err.Message);
            }
            
        });
      };
        function myFunction() {
            var hari = document.getElementById("hariku").value;
            var id = document.getElementById("id").value;
            ambil(id,hari);
        }
        </script>

<?php
    }
  }
?>
