
	<!--   Core JS Files   -->
	<script src="{{ URL::asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{ URL::asset('/assets/js/core/popper.min.js')}}"></script>
	<script src="{{ URL::asset('/assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{ URL::asset('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{ URL::asset('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ URL::asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

	<!-- Moment JS -->
	<script src="{{ URL::asset('/assets/js/plugin/moment/moment.min.js')}}"></script>

	<!-- Chart JS -->
	<script src="{{ URL::asset('/assets/js/plugin/chart.js')}}/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ URL::asset('/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{ URL::asset('/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{ URL::asset('/assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ URL::asset('/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{ URL::asset('/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ URL::asset('/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{ URL::asset('/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Google Maps Plugin -->
	<script src="{{ URL::asset('/assets/js/plugin/gmaps/gmaps.js')}}"></script>

	<!-- Dropzone -->
	<script src="{{ URL::asset('/assets/js/plugin/dropzone/dropzone.min.js')}}"></script>

	<!-- Fullcalendar -->
	<script src="{{ URL::asset('/assets/js/plugin/fullcalendar/fullcalendar.min.js')}}"></script>

	<!-- DateTimePicker -->
	<script src="{{ URL::asset('/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js')}}"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="{{ URL::asset('/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

	<!-- Bootstrap Wizard -->
	<script src="{{ URL::asset('/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js')}}"></script>

	<!-- jQuery Validation -->
	<script src="{{ URL::asset('/assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>

	<!-- Summernote -->
	<script src="{{ URL::asset('/assets/js/plugin/summernote/summernote-bs4.min.js')}}"></script>

	<!-- Select2 -->
	<script src="{{ URL::asset('/assets/js/plugin/select2/select2.full.min.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{ URL::asset('/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Owl Carousel -->
	<script src="{{ URL::asset('/assets/js/plugin/owl-carousel/owl.carousel.min.js')}}"></script>

	<!-- Magnific Popup -->
	<script src="{{ URL::asset('/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{ URL::asset('/assets/js/atlantis.min.js')}}"></script>

	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>