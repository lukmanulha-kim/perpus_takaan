<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo base_url('index.php/guru') ?>">Guru</a></li>
				<li class="active">Edit Data Guru</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Edit Data Guru</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="<?php echo base_url('index.php/guru/update') ?>">

							<div class="form-group hidden">
								<label>ID guru</label>
								<input type="text" class="form-control" name="i_id" value="<?php echo encrypt_url($dataGuru->id_guru) ?>" required>
							</div>

							<div class="form-group">
								<label>Nama Guru</label>
								<input type="text" class="form-control" name="i_nama" value="<?php echo $dataGuru->nama_guru ?>" required autofocus>
							</div>

							<div class="form-group">
								<label>Status</label>
								<div class="radio">
									<label>
										<input type="radio" name="i_status" id="optionsRadios1" value="Aktif" <?php if($dataGuru->status=="Aktif"){echo "checked";} ?>>Aktif
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="i_status" id="optionsRadios2" value="Tidak Aktif" <?php if($dataGuru->status=="Tidak Aktif"){echo "checked";} ?>>Tidak Aktif
									</label>
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