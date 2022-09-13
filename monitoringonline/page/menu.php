<?php
  switch (strtoupper($_SESSION['ses_nama_level'])) {
    case 'ADMIN':
      ?>
        <div class="sidebar-heading">
            Data User
        </div>
        <li class="nav-item">
            <a class="nav-link" href="?Open=lihat-data-user">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>Data user</span></a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Data Device
        </div>
        <li class="nav-item">
            <a class="nav-link" href="?Open=lihat-data-device">
                <i class="fas fa-fw fa-th-list"></i>
                <span>Data Device</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
      <?php
      break;
    case 'USER':
      ?>
        <div class="sidebar-heading">
            Data Device
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Monitoring</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilih device:</h6>
                      <?php
                          $data = get_device_limit2($conn, $_SESSION['ses_login']);
                          foreach ($data as $key => $value) {
                            $id_device = $value['id_device'];
                            $nama_device = $value['nama_device'];
                            echo '<a class="collapse-item" href="?Open=monitoring-user&id='.$id_device.'">'.$nama_device.'</a>';
                          }

                          if(count($data)>=3){
                            echo '
                                <div class="collapse-divider"></div>
                                <h6 class="collapse-header">Device lain:</h6>
                                <a class="collapse-item" href="?Open=lihat-data-device-user">Lihat device lain</a>
                            ';
                          }
                       ?>
                </div>
            </div>
        </li>

<!--         <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Data Device
        </div>
        <li class="nav-item">
            <a class="nav-link" href="?Open=lihat-data-device">
                <i class="fas fa-fw fa-th-list"></i>
                <span>Lihat Device</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?Open=monitoring-admin">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Monitoring</span></a>
        </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
      <?php
      break;
    default:
      # code...
      break;
  }
?>