<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Pengaturan Aplikasi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Pengaturan Aplikasi</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-8">
								<form method="post" action="<?php echo base_url('index.php/settings/updateaplikasi') ?>">
									<div class="form-group hidden">
										<label>ID SETTINGS</label>
										<input class="form-control" value="<?php echo encrypt_url($aplikasi->id_setting) ?>" name="i_id" type="text" required="">
									</div>
									<div class="form-group">
										<label>Nama Perpustakaan</label>
										<input class="form-control" value="<?php echo $aplikasi->nama_perpus ?>" name="i_nama" type="text" autofocus="" required="">
									</div>
									<div class="form-group">
										<label>Ketua Perpustakaan</label>
										<input class="form-control" value="<?php echo $aplikasi->ketua_perpus ?>" name="i_ketua" type="text" autofocus="" required="">
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<textarea name="i_alamat" class="form-control"><?php echo $aplikasi->alamat_perpus ?></textarea>
									</div>
									<div class="form-group">
										<label>Kabupaten/Kota</label>
										<input class="form-control" value="<?php echo $aplikasi->kabupaten ?>" name="i_kab" type="text" required="">
									</div>
									<hr>
									<div class="form-group">
										<label>Lama Pinjaman Buku</label>
										<div class="input-group">
											<input type="number" name="i_lama" class="form-control" value="<?php echo $aplikasi->durasi_pinjam ?>" aria-describedby="basic-addon2">
											<span class="input-group-addon" id="basic-addon2">Hari</span>
										</div>
									</div>
									<div class="form-group">
										<label>Denda Telat per-Hari</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon2">Rp. </span>
											<input type="number" name="i_denda" class="form-control" value="<?php echo $aplikasi->denda ?>" aria-describedby="basic-addon2">
										</div>
									</div>
									<div class="form-group">
										<input type="submit" name="i_simpan" value="Simpan" class="btn btn-primary">
									</div>	
								</form>
							</div>

							<div class="col-md-4">
								<form method="post" action="<?php echo base_url('index.php/settings/updatelogo') ?>" enctype="multipart/form-data">
									<center>
										<img src="<?php echo base_url('assets/img/').$aplikasi->logo ?>" alt="Logo" width="250px">
									</center>
									<?php
									if(isset($error)){ 
						                    echo "<div class='alert alert-danger'>".$error."</div>";
						                  }
									?>
									<div class="form-group hidden">
										<label>ID SETTINGS</label>
										<input class="form-control" value="<?php echo encrypt_url($aplikasi->id_setting) ?>" name="i_id" type="text" required="">
									</div>
									<div class="form-group">
										<label>Logo</label>
										<input class="form-control" name="i_logo" type="file" required="">
										<p class="help-block">Maksimal Ukuran Gambar 250kb.</p>
									</div>
									<div class="form-group">
										<input type="submit" name="i_simpan" value="Simpan" class="btn btn-primary">
									</div>	
								</form>
							</div>
						</div>				
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->