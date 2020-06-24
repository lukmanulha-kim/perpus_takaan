<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo base_url('index.php/siswa') ?>">Siswa</a></li>
				<li class="active">Tambah Data Siswa</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Tambah Data Siswa</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="<?php echo base_url('index.php/siswa/add') ?>">

							<div class="form-group">
								<label>Nama Siswa</label>
								<input type="text" class="form-control" name="i_nama" placeholder="Nama Siswa" required autofocus>
							</div>

							<div class="form-group">
								<label>Kelas</label>
								<input type="text" class="form-control" name="i_kelas" placeholder="Kelas" required>
							</div>

							<div class="form-group">
								<label>Status</label>
								<div class="radio">
									<label>
										<input type="radio" name="i_status" id="optionsRadios1" value="Aktif">Aktif
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="i_status" id="optionsRadios2" value="Tidak Aktif">Tidak Aktif
									</label>
								</div>
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