<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo base_url('index.php/user') ?>">User</a></li>
				<li class="active">Tambah Data Pengguna</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Tambah Data Pengguna</a></h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="<?php echo base_url('index.php/user/add') ?>">

							<div class="form-group">
								<label>Nama Pustakawan</label>
								<input type="text" class="form-control" name="i_nama" placeholder="Nama Pustakawan" required autofocus>
							</div>

							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="i_username" placeholder="Username" required>
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="i_password" placeholder="Password" required>
							</div>

							<div class="form-group">
								<input type="submit" name="i_simpan" value="Simpan" class="btn btn-primary">
							</div>							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->