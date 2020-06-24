<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo base_url('index.php/book') ?>">Buku</a></li>
				<li class="active">Tambah Buku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Tambah Data Buku</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="<?php echo base_url('index.php/book/add') ?>">
							<div class="form-group">
								<label>No Referensi</label>
								<input type="number" class="form-control" name="i_noref" placeholder="Nomor Referensi" required autofocus>
							</div>

							<div class="form-group">
								<label>Judul Buku</label>
								<input type="text" class="form-control" name="i_judul" placeholder="Judul Buku" required>
							</div>

							<div class="form-group">
								<label>Nama Pengarang</label>
								<input type="text" class="form-control" name="i_pengarang" placeholder="Nama Pengarang" required>
							</div>

							<div class="form-group">
								<label>Volume/Jilid</label>
								<input type="text" class="form-control" name="i_volume" placeholder="Volume/Jilid" required>
							</div>

							<div class="form-group">
								<label>Jumlah Buku</label>
								<input type="number" class="form-control" name="i_jumlah" placeholder="Jumlah Buku" required>
							</div>

							<div class="form-group">
								<label>Harga Buku</label>
								<input type="number" class="form-control" name="i_harga" placeholder="Harga Buku" required>
							</div>

							<div class="form-group">
								<label>Kondisi</label>
								<div class="radio">
									<label>
										<input type="radio" name="i_kondisi" id="optionsRadios2" value="Baik">Baik
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="i_kondisi" id="optionsRadios3" value="Rusak">Rusak
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