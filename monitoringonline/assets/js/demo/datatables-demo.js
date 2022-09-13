// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable(
     {
        "buttons": [['copy', 'csv', 'excel', 'pdf', 'print']]
        // "order": [[ 0, 'desc' ]],
    } 
    );
});
