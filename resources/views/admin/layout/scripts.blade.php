<!-- jQuery -->
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/admin/dist/js/sb-admin-2.js"></script>
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<!-- DataTables JavaScript -->
<script src="/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
    $('#myTable').DataTable();
    $('.order_position').sortable({
        placeholder : 'ui-state-highlight',
        update : function(event,ui){
            
        }
    });
});
</script>
