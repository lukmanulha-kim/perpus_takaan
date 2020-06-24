<?php  ?>
	<script src="<?php echo base_url('assets/') ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/chart.min.js"></script>
	<!-- <script src="<?php echo base_url('assets/') ?>js/chart-data.js"></script> -->
	<script src="<?php echo base_url('assets/') ?>js/easypiechart.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/easypiechart-data.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/bootstrap-table.js"></script>
	<!-- Custom select -->
	<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	  $('.js-example-basic-single').select2();
	  $('.js-example-basic-multiple').select2();
	});
	</script>

	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>