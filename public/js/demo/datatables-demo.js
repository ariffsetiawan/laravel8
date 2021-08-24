// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    columnDefs: [
      { orderable: false, targets: 2 }
    ],
    order: [[1, 'asc']]
  });
});
