// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// waktu = ['03:29:30','03:29:31','03:29:33','03:29:34','03:29:35','03:29:36','03:29:37','03:29:38','03:29:39'];
// dataPh = ['5.81847','5.27294','7.84427','10.752','9.29688','0.565985','8.30897','1.31881','1.91859','6.30525'];
// dataTds = ['1.99313','8.90526','8.82731','5.76961','9.29651','0.9037455','6.38067','4.29354','4.93643','0.529203'];
// dataSuhu = ['6.099','7.62','6.93','6.71','1.34','3.72','8.22','5.53','1.84','7.62'];
// var updateChart = function (){
  // Area Chart Example
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: waktu,
      datasets: [{
        label: "Ph",
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
              return number_format(value);
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
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });

  // Area Chart Example
  var ctx = document.getElementById("myAreaChart2");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: waktu,
      datasets: [{
        label: "Earnings",
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
        data: dataTds,
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
              return number_format(value);
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
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });

  // Area Chart Example
  var ctx = document.getElementById("myAreaChart3");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: waktu,
      datasets: [{
        label: "Earnings",
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
        data: dataSuhu,
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
              return number_format(value);
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
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' °C ';
          }
        }
      }
    }
  });
// };




