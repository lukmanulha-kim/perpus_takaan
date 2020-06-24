<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo base_url('index.php/book') ?>">Buku</a></li>
				<li class="active">Edit Buku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Edit Data Buku <!-- | <a href="<?php echo base_url('index.php/book/import') ?>" title="Import Data" class="btn btn-primary">Import Data Buku</a> --></h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="<?php echo base_url('index.php/book/update') ?>">
							<div class="form-group hidden">
								<label>ID Buku</label>
								<input type="text" class="form-control" name="i_id" value="<?php echo encrypt_url($dataBuku->id_buku) ?>">
							</div>

							<div class="form-group">
								<label>No Referensi</label>
								<input type="number" class="form-control" name="i_noref" value="<?php echo $dataBuku->no_referensi ?>" readonly>
							</div>

							<div class="form-group">
								<label>Judul Buku</label>
								<input type="text" class="form-control" name="i_judul" value="<?php echo $dataBuku->judul_buku ?>" required>
							</div>

							<div class="form-group">
								<label>Nama Pengarang</label>
								<input type="text" class="form-control" name="i_pengarang" value="<?php echo $dataBuku->pengarang ?>" required>
							</div>

							<div class="form-group">
								<label>Volume/Jilid</label>
								<input type="text" class="form-control" name="i_volume" value="<?php echo $dataBuku->volume_jilid ?>" required>
							</div>

							<div class="form-group">
								<label>Jumlah Buku</label>
								<input type="number" class="form-control" name="i_jumlah" value="<?php echo $dataBuku->jumlah ?>" required>
							</div>

							<div class="form-group">
								<label>Harga Buku</label>
								<input type="number" class="form-control" name="i_harga" value="<?php echo $dataBuku->harga ?>" required>
							</div>

							<div class="form-group">
								<label>Kondisi</label>
								<div class="radio">
									<label>
										<input type="radio" name="i_kondisi" id="optionsRadios2" value="Baik" <?php if ($dataBuku->kondisi=="Baik") {echo "checked";} ?>>Baik
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="i_kondisi" id="optionsRadios3" value="Rusak" <?php if ($dataBuku->kondisi=="Rusak") {echo "checked";} ?>>Rusak
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="i_kondisi" id="optionsRadios1" value="Sangat Baik" <?php if ($dataBuku->kondisi=="Hilang") {echo "checked";} ?>>Hilang
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