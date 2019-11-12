<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="#" target="_blank">Developed By ZAKIR</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo site_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/admin/scripts/klorofil-common.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>





    <script>
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );
    </script>
	
</body>

</html>
