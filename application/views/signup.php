<?php  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Halaman Register Pustakawan</title>

<link href="<?php echo base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/') ?>css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url('assets/') ?>css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-tasks"></span>Sign Up</div>
				<div class="panel-body">
					<?php
					if(isset($salah)){ // Jika proses upload gagal
		                    echo "<div class='alert alert-danger'>".$salah."</div>"; // Muncul pesan error upload
		                    // die; // stop skrip
		                  }
					?>
					<form method="post" action="<?php echo base_url('index.php/login/signup') ?>" role="form">
						<fieldset>
							<div class="form-group">
								<label>Nama Pustakawan</label>
								<input class="form-control" placeholder="Nama Pustakawan" name="i_nama" type="text" autofocus="" required="">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" placeholder="Username" name="i_user" type="text" required="">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" placeholder="Password" name="i_pass" type="password" required="">
							</div>
							<div class="form-group">
								<center><?php echo $img ?></center>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Ketik Ulang Gambar Di Atas" name="i_captcha" type="text" required="">
							</div>
							<input type="submit" name="i_login" value="Daftar" class="btn btn-primary">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="<?php echo base_url('assets/') ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/chart.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/chart-data.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/easypiechart.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/easypiechart-data.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/bootstrap-datepicker.js"></script>
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