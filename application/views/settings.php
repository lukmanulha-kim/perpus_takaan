<?php  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Setting Aplikasi</title>

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
				<div class="panel-heading"><span class="glyphicon glyphicon-cog"></span>Pengaturan</div>
				<div class="panel-body">
					<?php
					if(isset($error)){ // Jika proses upload gagal
		                    echo "<div class='alert alert-danger'>".$error."</div>"; // Muncul pesan error upload
		                    // die; // stop skrip
		                  }
					?>
					<form method="post" action="<?php echo base_url('index.php/Welcome/settings') ?>" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<label class="text-muted">Nama Perpustakaan</label>
								<input class="form-control" placeholder="Nama Perpustakaan" name="i_nama" type="text" autofocus="" required="">
							</div>
							<div class="form-group">
								<label class="text-muted">Ketua Perpustakaan</label>
								<input class="form-control" placeholder="Ketua Perpustakaan" name="i_ketua" type="text" autofocus="" required="">
							</div>
							<div class="form-group">
								<labe class="text-muted"l>Alamat Perpustakaan</label>
								<textarea name="i_alamat" class="form-control"></textarea>
								<code>Penulisan Alamat Tanpa Menyertakan Nama Kabupaten</code>
							</div>
							<div class="form-group">
								<label class="text-muted">Kabupaten/Kota</label>
								<input class="form-control" placeholder="Kabupaten/Kota" name="i_kab" type="text" required="">
							</div>
							<div class="form-group">
								<label class="text-muted">Logo</label>
								<input class="form-control" name="i_logo" type="file" required="">
								<p class="help-block">Maksimal Ukuran Gambar 250kb.</p>
							</div>
							<hr>
							<div class="form-group">
								<label class="text-muted">Lama Pinjaman Buku</label>
								<div class="input-group">
									<input type="number" name="i_lama" class="form-control" placeholder="Lama Pinjaman Buku" aria-describedby="basic-addon2">
									<span class="input-group-addon" id="basic-addon2">Hari</span>
								</div>
							</div>
							<div class="form-group">
								<label class="text-muted">Denda Telat per-Hari</label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon2">Rp. </span>
									<input type="number" name="i_denda" class="form-control" placeholder="Denda Telat per-Hari" aria-describedby="basic-addon2">
								</div>
							</div>
							<input type="submit" name="i_simpan" value="Simpan Pengaturan" class="btn btn-primary">
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