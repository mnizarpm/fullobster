<?php
  ob_start();
  session_start();
  require "config/config.php";
  include "function/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="assets/cssru.css" rel="stylesheet">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Jrp9PtHe0WapppUzxbIpMDWMAcV3qE4"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
    <style type="text/css">
        #map {
          width: 100%;
          height: 480px;
        }
    </style>
</head>
<?php
  if (!isset($_SESSION['ses_login'])) {
    include "page/open_file.php";
  }else{
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include 'page/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include 'page/navbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                        include 'page/open_file.php';
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 

    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function(){
            $(".mul-select").select2({
                    placeholder: "Pilih Device", //placeholder
                    tags: true,
                    tokenSeparators: ['/',',',';'," "] 
                });
            })
    </script>
    <script type="text/javascript">
    var waktu = [];
    var ph = [];
    var suhu = [];
    var tds = [];
    var status_ph = [];
    var status_suhu = [];
    var status_tds = [];
    
    var doo = [];
    var nitrit = [];
    var amonia = [];
    
    var doSementara;
    var nitritSementara;
    var amoniaSementara;

    var ctx = document.getElementById("myAreaChart");
    var Chart1 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: waktu,
        datasets: [{
          label: "Ph ",
          lineTension: 0.3,
          backgroundColor: "rgba(54, 185, 204, 0.05)",
          borderColor: "rgba(54, 185, 204, 1)",
          pointRadius: 1,
          pointBackgroundColor: "rgba(54, 185, 204, 1)",
          pointBorderColor: "rgba(54, 185, 204, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(54, 185, 204, 1)",
          pointHoverBorderColor: "rgba(54, 185, 204, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: ph,
        }],
      },
      options: {
        maintainAspectRatio: false,
        animation:{
          duration:0
        },
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel;
            }
          }
        }
      }
    });

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart2");
    var Chart2 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: waktu,
        datasets: [{
          label: "Suhu ",
          lineTension: 0.3,
          backgroundColor: "rgba(54, 185, 204, 0.05)",
          borderColor: "rgba(54, 185, 204, 1)",
          pointRadius: 1,
          pointBackgroundColor: "rgba(54, 185, 204, 1)",
          pointBorderColor: "rgba(54, 185, 204, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(54, 185, 204, 1)",
          pointHoverBorderColor: "rgba(54, 185, 204, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: suhu,
        }],
      },
      options: {
        maintainAspectRatio: false,
        animation:{
          duration:0
        },
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel + ' °C ';
            }
          }
        }
      }
    });
    
    var ctx = document.getElementById("myAreaChart3");
    var Chart3 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: waktu,
        datasets: [{
          label: "Tds ",
          lineTension: 0.3,
          backgroundColor: "rgba(54, 185, 204, 0.05)",
          borderColor: "rgba(54, 185, 204, 1)",
          pointRadius: 1,
          pointBackgroundColor: "rgba(54, 185, 204, 1)",
          pointBorderColor: "rgba(54, 185, 204, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(54, 185, 204, 1)",
          pointHoverBorderColor: "rgba(54, 185, 204, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: tds,
        }],
      },
      options: {
        maintainAspectRatio: false,
        animation:{
          duration:0
        },
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel;
            }
          }
        }
      }
    });
    
    var ctx = document.getElementById("myAreaChart4");
    var Chart4 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: waktu,
        datasets: [{
          label: "Do ",
          lineTension: 0.3,
          backgroundColor: "rgba(54, 185, 204, 0.05)",
          borderColor: "rgba(54, 185, 204, 1)",
          pointRadius: 1,
          pointBackgroundColor: "rgba(54, 185, 204, 1)",
          pointBorderColor: "rgba(54, 185, 204, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(54, 185, 204, 1)",
          pointHoverBorderColor: "rgba(54, 185, 204, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: doo,
        }],
      },
      options: {
        maintainAspectRatio: false,
        animation:{
          duration:0
        },
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel;
            }
          }
        }
      }
    });

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart5");
    var Chart5 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: waktu,
        datasets: [{
          label: "Nitrit ",
          lineTension: 0.3,
          backgroundColor: "rgba(54, 185, 204, 0.05)",
          borderColor: "rgba(54, 185, 204, 1)",
          pointRadius: 1,
          pointBackgroundColor: "rgba(54, 185, 204, 1)",
          pointBorderColor: "rgba(54, 185, 204, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(54, 185, 204, 1)",
          pointHoverBorderColor: "rgba(54, 185, 204, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: nitrit,
        }],
      },
      options: {
        maintainAspectRatio: false,
        animation:{
          duration:0
        },
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel;
            }
          }
        }
      }
    });
    
    var ctx = document.getElementById("myAreaChart6");
    var Chart6 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: waktu,
        datasets: [{
          label: "Amonia ",
          lineTension: 0.3,
          backgroundColor: "rgba(54, 185, 204, 0.05)",
          borderColor: "rgba(54, 185, 204, 1)",
          pointRadius: 1,
          pointBackgroundColor: "rgba(54, 185, 204, 1)",
          pointBorderColor: "rgba(54, 185, 204, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(54, 185, 204, 1)",
          pointHoverBorderColor: "rgba(54, 185, 204, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: amonia,
        }],
      },
      options: {
        maintainAspectRatio: false,
        animation:{
          duration:0
        },
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel;
            }
          }
        }
      }
    });

      var updateDataDev = function () {
          $.ajax({
            type: 'POST', //post method
            url: 'https://fullobster.monitoringonline.net/page/get_dataku2.php?id=<?php echo $id?>',
            dataType: "json",
            success: function (result, textStatus, jqXHR)
            {
                var keys = [];
                waktu = result[0].reverse();
                ph = result[1].reverse();
                suhu = result[2].reverse();
                tds = result[3].reverse();
                status_ph = result[4];
                status_suhu = result[5];
                status_tds = result[6];
                doo = result[7].reverse();
                nitrit = result[8].reverse();
                amonia = result[9].reverse();
                
                doSementara = result[10].reverse();
                nitritSementara = result[11].reverse();
                amoniaSementara = result[12].reverse();
                
                do_state = document.getElementById('status_do');
                do_state.innerText = "DO : "+doSementara;
                
                nitrit_state = document.getElementById('status_nitrit');
                nitrit_state.innerText = "NITRIT : "+nitritSementara;
                
                amonia_state = document.getElementById('status_amonia');
                amonia_state.innerText = "AMONIA : "+amoniaSementara;

                Chart1.data.labels = waktu;
                Chart1.data.datasets[0].data = ph;
                Chart1.update();

                Chart2.data.labels = waktu;
                Chart2.data.datasets[0].data = suhu;
                Chart2.update();
                
                Chart3.data.labels = waktu;
                Chart3.data.datasets[0].data = tds;
                Chart3.update();
                
                Chart4.data.labels = waktu;
                Chart4.data.datasets[0].data = doo;
                Chart4.update();

                Chart5.data.labels = waktu;
                Chart5.data.datasets[0].data = nitrit;
                Chart5.update();
                
                Chart6.data.labels = waktu;
                Chart6.data.datasets[0].data = amonia;
                Chart6.update();

                sp = status_ph[0];
                // console.log(sp);
                ph_state = document.getElementById('status_phku');
                ph_state2 = document.getElementById('status_phku2');
                if (sp == 1) {
                  ph_state.classList.remove('btn-danger');
                  ph_state.classList.remove('btn-info');
                  ph_state.classList.remove('btn-succes');
                  ph_state.classList.add('btn-warning');

                  ph_state2.innerText = 'Status Ph : ASAM';
                }
                if (sp == 2) {
                  ph_state.classList.remove('btn-warning');
                  ph_state.classList.remove('btn-info');
                  ph_state.classList.remove('btn-succes');
                  ph_state.classList.add('btn-danger'); 

                  ph_state2.innerText = 'Status Ph : BASA';
                }
                if (sp == 0) {
                  ph_state.classList.remove('btn-danger');
                  ph_state.classList.remove('btn-info');
                  ph_state.classList.remove('btn-warning');
                  ph_state.classList.add('btn-success'); 

                  ph_state2.innerText = 'Status Ph : NORMAL';
                }

                ss = status_suhu[0];
                // console.log(sp);
                suhu_state = document.getElementById('status_suhuku');
                suhu_state2 = document.getElementById('status_suhuku2');
                if (ss == 1) {
                  suhu_state.classList.remove('btn-warning');
                  suhu_state.classList.remove('btn-info');
                  suhu_state.classList.remove('btn-succes');
                  suhu_state.classList.add('btn-danger');

                  suhu_state2.innerText = 'Status Suhu : TINGGI';
                }
                if (ss == 2) {
                  suhu_state.classList.remove('btn-danger');
                  suhu_state.classList.remove('btn-info');
                  suhu_state.classList.remove('btn-succes');
                  suhu_state.classList.add('btn-warning');

                  suhu_state2.innerText = 'Status Suhu : RENDAH';
                }
                if (ss == 0) {
                  suhu_state.classList.remove('btn-danger');
                  suhu_state.classList.remove('btn-info');
                  suhu_state.classList.remove('btn-warning');
                  suhu_state.classList.add('btn-success'); 

                  suhu_state2.innerText = 'Status Suhu : NORMAL';
                }
                sp = status_tds[0];
                // console.log(sp);
                tds_state = document.getElementById('status_tdsku');
                tds_state2 = document.getElementById('status_tdsku2');
                if (sp == 1) {
                  tds_state.classList.remove('btn-danger');
                  tds_state.classList.remove('btn-info');
                  tds_state.classList.remove('btn-succes');
                  tds_state.classList.add('btn-warning');

                  tds_state2.innerText = 'Status TDS : rendah';
                }
                if (sp == 0) {
                  tds_state.classList.remove('btn-danger');
                  tds_state.classList.remove('btn-info');
                  tds_state.classList.remove('btn-warning');
                  tds_state.classList.add('btn-success'); 

                  tds_state2.innerText = 'Status TDS : Aman';
                }
            }
        });
      };
      const interval = setInterval(function() {
        // ini();
        updateDataDev();
        // ini3();
       }, 1000);
    </script>
    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
    
      
</body>
<?php
  }
?>

</html>