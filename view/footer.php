  </section>
  </div>
  <!-- footer -->
  <footer class="main-footer">
   <strong>Copyright &copy; 2017-<?=date("Y");?> <a href="https://greefitech.com">Greefi Technologies</a>.</strong> All rights
    reserved.
  </footer>
</div>     
<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/app.min.js"></script>
<script src="../js/entry.js"></script>
<script src="../js/pricing.js"></script>
<script src="../js/jquery-ui.js" ></script>

<script src="../js/datatable/jquery.dataTables.min.js"></script>
 <script src="../js/datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$("#view_table_detail").DataTable({
		"order":[]
	});
    $("#min").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $("#max").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
</script>
        <script src="../js/datatable/dataTables.responsive.min.js"></script>
        <script src="../js/datatable/dataTables.bootstrap.min.js"></script>
        <script src="../js/datatable/dataTables.buttons.min.js"></script>
        <script src="../js/datatable/jszip.min.js"></script>
        <script src="../js/datatable/pdfmake.min.js"></script>
        <script src="../js/datatable/vfs_fonts.js"></script>
        <script src="../js/datatable/buttons.html5.min.js"></script>
        <script src="../js/datatable/buttons.print.min.js"></script>
        <!-- <script src="../js/datataable/buttons.colVis.min.js"></script> -->



        <script src="../js/datatable/date-dd-MMM-yyyy.js"></script>
          <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <!-- <script src="../js/datatable/jquery-ui.js"></script> -->


</body>
</html>
