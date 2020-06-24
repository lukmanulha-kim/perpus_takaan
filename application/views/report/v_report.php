<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Rekap Data Dan Laporan</li>
			</ol>
		</div><!--/.row-->

		<div>
			<div class="col-lg-12">
				<h2>Rekap Data dan Laporan</h2>
			</div>

			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Laporan</a></li>
							<li><a href="#tab2" data-toggle="tab">Rekap Data</a></li>
						</ul>
		
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<h4>Laporan Peminjaman</h4>
								<div class="alert bg-info" role="alert">
									<svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> Untuk Mencetak Semua Data Peminjaman Silahkan Klik <a href="#tab2" data-toggle="tab">Disini.</a>
								</div>
								<hr>
								<form action="<?php echo base_url('index.php/report/laporan') ?>" method="post" target="_blank">
									<div class="form-group">
										<label>Pilih Peminjam</label>
										<select name="i_peminjam" class="form-control" required>
											<option value="">Pilih Peminjam</option>
											<option value="siswa">Siswa</option>
											<option value="guru">Guru</option>
										</select>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Bulan</label>
												<select name="i_bulan" class="form-control" required>
													<option value="<?php echo date('m'); ?>"><?php echo report::BulanIndo(date('m')); ?></option>
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>

											<div class="form-group">
												<label>Tahun</label>
												<select name="i_tahun" class="form-control" required>
													<option value="">Pilih Tahun</option>
													<option selected="selected" value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
													<?php
													for($i=date('Y')-1; $i>=date('Y')-10; $i-=1){
													echo"<option value='$i'> $i </option>";
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Status Pinjaman</label>
												<select name="i_pinjaman" class="form-control" required>
													<option value="Semua">Semua</option>
													<option value="Masih Dipinjam">Masih Dipinjam</option>
													<option value="Dikembalikan">Dikembalikan</option>
													<option value="Hilang">Hilang</option>
												</select>
											</div>

											<div class="form-group">
												<label>Status Pengembalian</label>
												<select name="i_pengembalian" class="form-control" required>
													<option value="Semua">Semua</option>
													<option value="Sesuai Tempo">Sesuai Tempo</option>
													<option value="Jatuh Tempo">Jatuh Tempo</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 offset-md-3">
											<div class="form-group">
												<input type="submit" name="i_cetak" value="Cetak" class="btn btn-sm btn-primary">
											</div>
										</div>
									</div>
								</form>
							</div>

							<div class="tab-pane fade" id="tab2">
								<h4>Rekap Data Peminjam</h4>
								<hr>
								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-12">
										<div class="panel panel-blue panel-widget ">
											<div class="row no-padding">
												<div class="col-sm-1 col-lg-3 widget-left">
													<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
												</div>
												<div class="col-sm-11 col-lg-9 widget-right">
													<div class="large"><?php echo $TotalPeminjam->totalPeminjam ?></div>
													<div class="text-muted">Total Peminjam</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-blue panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $SesuaiTempo->sesuaiTempo ?></div>
													<div class="text-muted">Sesuai Tempo</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-blue panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $JatuhTempo->jatuhTempo ?></div>
													<div class="text-muted">Jatuh Tempo</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xs-12 col-md-6 col-lg-4">
										<div class="panel panel-blue panel-widget ">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
												</div>
												<div class="col-sm-12 col-lg-8 widget-right">
													<div class="large"><?php echo $MasihDipinjam->masihDipinjam ?></div>
													<div class="text-muted">Masih Dipinjam</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-lg-4">
										<div class="panel panel-blue panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $Dikembalikan->dikembalikan ?></div>
													<div class="text-muted">Dikembalikan</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-lg-4">
										<div class="panel panel-blue panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $Hilang->hilang ?></div>
													<div class="text-muted">Hilang</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<hr>
								<h4>Denda Siswa</h4>
								<hr>

								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-blue panel-widget ">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-12 col-lg-8 widget-right">
													<div class="large"><?php echo $LunasSiswa->lunasSiswa ?></div>
													<div class="text-muted">Denda Lunas <a href="<?php echo base_url('index.php/report/dendasiswalunas') ?>" title="Rekap Data Buku" class="btn btn-sm btn-primary" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-blue panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $TidakLunasSiswa->tidaklunasSiswa ?></div>
													<div class="text-muted">Denda Tidak Lunas <a href="<?php echo base_url('index.php/report/dendasiswataklunas') ?>" title="Rekap Data Buku" class="btn btn-sm btn-primary" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<hr>
								<h4>Denda Guru</h4>
								<hr>

								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-blue panel-widget ">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-12 col-lg-8 widget-right">
													<div class="large"><?php echo $LunasGuru->lunasGuru ?></div>
													<div class="text-muted">Denda Lunas <a href="<?php echo base_url('index.php/report/dendagurulunas') ?>" title="Rekap Data Buku" class="btn btn-sm btn-primary" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-blue panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $TidakLunasGuru->tidaklunasGuru ?></div>
													<div class="text-muted">Denda Tidak Lunas <a href="<?php echo base_url('index.php/report/dendagurutaklunas') ?>" title="Rekap Data Buku" class="btn btn-sm btn-primary" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<hr>
								<h4>Data Buku</h4>
								<hr>

								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-teal panel-widget ">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-12 col-lg-8 widget-right">
													<div class="large"><?php echo $TotalBuku->totalBuku ?></div>
													<div class="text-muted">Total Buku <a href="<?php echo base_url('index.php/report/buku') ?>" title="Rekap Data Buku" class="btn btn-sm btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-teal panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $BukuBaik->bukuBaik ?></div>
													<div class="text-muted">Total Buku Baik <a href="<?php echo base_url('index.php/report/bukubaik') ?>" title="Rekap Data Buku" class="btn btn-sm btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-teal panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $BukuRusak->bukuRusak ?></div>
													<div class="text-muted">Total Buku Rusak <a href="<?php echo base_url('index.php/report/bukurusak') ?>" title="Rekap Data Buku" class="btn btn-sm btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-6">
										<div class="panel panel-teal panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $BukuHilang->bukuHilang ?></div>
													<div class="text-muted">Total Buku Hilang <a href="<?php echo base_url('index.php/report/bukuhilang') ?>" title="Rekap Data Buku" class="btn btn-sm btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<hr>
								<h4>Data Siswa</h4>
								<hr>

								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-4">
										<div class="panel panel-orange panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $TotalSiswa->totalSiswa ?></div>
													<div class="text-muted">Total Siswa <a href="<?php echo base_url('index.php/report/semuasiswa') ?>" title="Rekap Data Siswa" class="btn btn-sm btn-warning" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-4">
										<div class="panel panel-orange panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $SiswaAktif->siswaAktif ?></div>
													<div class="text-muted">Total Siswa Aktif <a href="<?php echo base_url('index.php/report/siswaaktif') ?>" title="Rekap Data Siswa" class="btn btn-sm btn-warning" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-4">
										<div class="panel panel-orange panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $SiswaTakAktif->siswaTakAktif ?></div>
													<div class="text-muted">Total Siswa Tidak Aktif <a href="<?php echo base_url('index.php/report/siswatakaktif') ?>" title="Rekap Data Siswa" class="btn btn-sm btn-warning" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<hr>
								<h4>Data Guru</h4>
								<hr>

								<div class="row">
									<div class="col-xs-12 col-md-12 col-lg-4">
										<div class="panel panel-red panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $TotalGuru->totalGuru ?></div>
													<div class="text-muted">Total Semua Guru <a href="<?php echo base_url('index.php/report/semuaguru') ?>" title="Rekap Data Guru" class="btn btn-sm btn-danger" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-4">
										<div class="panel panel-red panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $GuruAktif->guruAktif ?></div>
													<div class="text-muted">Total Guru Aktif <a href="<?php echo base_url('index.php/report/guruaktif') ?>" title="Rekap Data Guru" class="btn btn-sm btn-danger" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-4">
										<div class="panel panel-red panel-widget">
											<div class="row no-padding">
												<div class="col-sm-2 col-lg-4 widget-left">
													<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
												</div>
												<div class="col-sm-10 col-lg-8 widget-right">
													<div class="large"><?php echo $GuruTakAktif->guruTakAktif ?></div>
													<div class="text-muted">Total Guru Tidak Aktif <a href="<?php echo base_url('index.php/report/gurutakaktif') ?>" title="Rekap Data Guru" class="btn btn-sm btn-danger" target="_blank"><span class="glyphicon glyphicon-print"></span></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div>								

								
	</div>	<!--/.main-->