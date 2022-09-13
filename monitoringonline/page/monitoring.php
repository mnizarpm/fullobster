<?php
  if (!isset($_SESSION['ses_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=?Open=login'>";
  }else{
    if (strtoupper($_SESSION['ses_nama_level'])!="ADMIN") {
      echo "<meta http-equiv='refresh' content='0; url=?Open=tidak-diijinkan'>";
      // echo strtoupper($_SESSION['ses_nama_level']);
    }else{
            $id = $_GET['id'];
            $data = get_device2($conn, $id);
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <?php
        if (isset($_GET['id'])) {
            echo "<h1 class='h3 mb-0 text-gray-800'>Monitoring ".$data['nama_device']."</h1>";        
        } else {
            echo "<h1 class='h3 mb-0 text-gray-800'>Dashboard</h1>";        
        }
    ?>
    <br>
    <div class=" d-sm-inline-block">
        <a href="?Open=set" class=" d-sm-inline-block btn btn-sm btn-info shadow-md"> Set data</a>
        <a href="?Open=histori&id=<?php echo $id?>" class=" d-sm-inline-block btn btn-sm btn-info shadow-md"><i class="fas fa-table fa-sm"></i>  Lihat history data</a>
    </div>
    
</div>

<div class="row">
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Nilai</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button id="status_do" class="btn btn-light btn-block" disabled="" style="color: black;font-weight:bold;">DO</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button id="status_nitrit" class="btn btn-light btn-block" disabled="" style="color: black;font-weight:bold;">NITRIT</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button id="status_amonia" class="btn btn-light btn-block" disabled="" style="color: black;font-weight:bold;">AMONIA</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Status</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button id="status_phku2" class="btn btn-light btn-block" disabled="" style="color: black;font-weight:bold;">Status Ph</button>
                        <center style="padding-top: 10px;">
                            <a href="#" id="status_phku" class="btn btn-info" style="border-radius: 50%; height: 7rem; width: 7rem;">
                            </a>
                        </center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button id="status_suhuku2" class="btn btn-light btn-block" disabled="" style="color: black;font-weight:bold;">Status Suhu</button>
                        <center style="padding-top: 10px;">
                            <a href="#" id="status_suhuku" class="btn btn-info" style="border-radius: 50%; height: 7rem; width: 7rem;">
                            </a>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button id="status_tdsku2" class="btn btn-light btn-block" disabled="" style="color: black;font-weight:bold;">Status TDS</button>
                        <center style="padding-top: 10px;">
                            <a href="#" id="status_tdsku" class="btn btn-info" style="border-radius: 50%; height: 7rem; width: 7rem;">
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-md-8 mb-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Grafik <?php echo $data['nama_device']?></h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="padding-top:5px;">
                        <center class="font-weight-bold text-info">Grafik Ph</center>
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:5px;">
                        <center class="font-weight-bold text-info">Grafik Suhu</center>
                        <div class="chart-area">
                            <canvas id="myAreaChart2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="padding-top:5px;">
                        <center class="font-weight-bold text-info">Grafik Tds</center>
                        <div class="chart-area">
                            <canvas id="myAreaChart3"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:5px;">
                        <center class="font-weight-bold text-info">Grafik Do</center>
                        <div class="chart-area">
                            <canvas id="myAreaChart4"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="padding-top:5px;">
                        <center class="font-weight-bold text-info">Grafik Nitrit</center>
                        <div class="chart-area">
                            <canvas id="myAreaChart5"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:5px;">
                        <center class="font-weight-bold text-info">Grafik Amonia</center>
                        <div class="chart-area">
                            <canvas id="myAreaChart6"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->

<?php
    }
  }
?>
