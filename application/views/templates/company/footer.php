<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2024 <b>Online Job Portal</b>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>design/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url();?>design/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>design/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url();?>design/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url();?>design/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url();?>design/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url();?>design/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url();?>design/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url();?>design/plugins/moment/moment.min.js"></script>
<script src="<?=base_url();?>design/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url();?>design/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url();?>design/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url();?>design/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url();?>design/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url();?>design/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url();?>design/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url();?>design/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url();?>design/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url();?>design/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url();?>design/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>design/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>design/dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false    
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $('.addJob').click(function(){
    var id=$(this).data('id');
    document.getElementById('job_comp_id').value = id;
    document.getElementById('job_id').value = '';
    document.getElementById('job_title').value = '';
    document.getElementById('job_description').value = '';
    document.getElementById('job_keyword').value = '';      
  });
  $('.editJob').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('job_id').value = id[0];
    document.getElementById('job_title').value = id[1];
    document.getElementById('job_description').value = id[2];
    document.getElementById('job_keyword').value = id[3];    
    document.getElementById('job_comp_id').value = id[4];
  });
  $('.acceptApplicant').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('jobid').value = id[0];
    document.getElementById('job_email').value = id[1];          
  });
  $('.declineApplicant').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('jobid').value = id[0];
    document.getElementById('job_email').value = id[1];          
  });
</script>
</body>
</html>