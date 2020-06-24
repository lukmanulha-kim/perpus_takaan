<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo base_url('index.php/siswa') ?>">Siswa</a></li>
				<li class="active">Edit Data Siswa</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Edit Data Siswa</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="<?php echo base_url('index.php/siswa/update') ?>">

							<div class="form-group hidden">
								<label>ID Siswa</label>
								<input type="text" class="form-control" name="i_id" value="<?php echo encrypt_url($dataSiswa->id_siswa) ?>" >
							</div>

							<div class="form-group">
								<label>Nama Siswa</label>
								<input type="text" class="form-control" name="i_nama" value="<?php echo $dataSiswa->nama_siswa ?>" required autofocus>
							</div>

							<div class="form-group">
								<label>Kelas</label>
								<input type="text" class="form-control" name="i_kelas" value="<?php echo $dataSiswa->kelas ?>" required>
							</div>

							<div class="form-group">
								<label>Status</label>
								<div class="radio">
									<label>
										<input type="radio" name="i_status" id="optionsRadios1" value="Aktif" <?php if($dataSiswa->status=="Aktif"){echo "checked";} ?>>Aktif
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="i_status" id="optionsRadios2" value="Tidak Aktif" <?php if($dataSiswa->status=="Tidak Aktif"){echo "checked";} ?>>Tidak Aktif
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