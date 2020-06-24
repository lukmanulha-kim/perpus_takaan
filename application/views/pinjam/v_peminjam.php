<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Peminjam</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Data Peminjam Siswa</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							    	<th data-field="no" data-sortable="true">No</th>
									<th data-field="nama" data-sortable="true">Nama Siswa</th>
									<th data-field="kelas"  data-sortable="true">Kelas</th>
									<th data-field="buku"  data-sortable="true">Buku</th>
									<th data-field="tgl_pinjam" data-sortable="true">Tanggal Pinjam - Kembali</th>
									<th data-field="s_peminjaman" data-sortable="true">Status Peminjaman</th>
									<th data-field="tgl_dikembalikan" data-sortable="true">Tanggal Dikembalikan</th>
									<th data-field="s_pengembalian" data-sortable="true">Status Pengembalian</th>
									<th data-field="denda" data-sortable="true">Denda</th>
									<th data-field="aksi" data-sortable="true">Aksi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $no=1; foreach ($peminjamSiswa->result() as $peminjamSiswa) { ?>
						    	<tr>
						    		<td><?php echo $no++ ?></td>
						    		<td><?php echo $peminjamSiswa->nama_siswa ?></td>
									<td><?php echo $peminjamSiswa->kelas ?></td>
									<td><?php echo $peminjamSiswa->judul_buku ?></td>
									<td><?php echo pinjam::TglIndo($peminjamSiswa->tgl_pinjam).' - '.pinjam::TglIndo($peminjamSiswa->tgl_kembali); ?></td>
									<td><?php echo $peminjamSiswa->status_peminjaman ?></td>
									<td><?php if ($peminjamSiswa->tgl_dikembalikan=='0000-00-00'){echo "-";}else{echo pinjam::TglIndo($peminjamSiswa->tgl_dikembalikan);} ?></td>
									<td><?php echo $peminjamSiswa->status_pengembalian ?></td>
									<td><?php echo $peminjamSiswa->denda ?></td>
									<td>
										<?php if ($peminjamSiswa->status_peminjaman=="Masih Dipinjam") { ?>
											<a href="<?php echo base_url('index.php/pinjam/kembali/').encrypt_url($peminjamSiswa->id_peminjam) ?>" class="btn btn-sm btn-success">Dikembalikan</a>  
											<a href="<?php echo base_url('index.php/pinjam/hilang/').encrypt_url($peminjamSiswa->id_peminjam) ?>" class="btn btn-sm btn-danger">Hilang</a>
											<!-- <a href="<?php echo base_url() ?>">Rusak</a> -->
										<?php } ?>
									</td>
						    	</tr>
						    	<?php } ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h3>Data Peminjam Guru</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							    	<th data-field="no" data-sortable="true">No</th>
									<th data-field="nama" data-sortable="true">Nama Guru</th>
									<th data-field="buku" data-sortable="true">Buku</th>
									<th data-field="tgl_pinjam" data-sortable="true">Tanggal Pinjam - Kembali</th>
									<th data-field="s_peminjaman" data-sortable="true">Status Peminjaman</th>
									<th data-field="tgl_dikembalikan" data-sortable="true">Tanggal Dikembalikan</th>
									<th data-field="s_pengembalian" data-sortable="true">Status Pengembalian</th>
									<th data-field="denda" data-sortable="true">Denda</th>
									<th data-field="aksi" data-sortable="true">Aksi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $no=1; foreach ($peminjamGuru->result() as $peminjamGuru) { ?>
						    	<tr>
						    		<td><?php echo $no++ ?></td>
						    		<td><?php echo $peminjamGuru->nama_guru ?></td>
						    		<td><?php echo $peminjamGuru->judul_buku ?></td>
									<td><?php echo pinjam::TglIndo($peminjamGuru->tgl_pinjam).' - '.pinjam::TglIndo($peminjamGuru->tgl_kembali); ?></td>
									<td><?php echo $peminjamGuru->status_peminjaman ?></td>
									<td><?php if ($peminjamGuru->tgl_dikembalikan=='0000-00-00'){echo "-";}else{echo pinjam::TglIndo($peminjamGuru->tgl_dikembalikan);} ?></td>
									<td><?php echo $peminjamGuru->status_pengembalian ?></td>
									<td><?php echo $peminjamGuru->denda ?></td>
									<td>
										<?php if ($peminjamGuru->status_peminjaman=="Masih Dipinjam") { ?>
											<a href="<?php echo base_url('index.php/pinjam/kembali/').encrypt_url($peminjamGuru->id_peminjam) ?>" class="btn btn-sm btn-success">Dikembalikan</a> 
											<a href="<?php echo base_url('index.php/pinjam/hilang/').encrypt_url($peminjamGuru->id_peminjam) ?>" class="btn btn-sm btn-danger">Hilang</a> 
											<!-- <a href="<?php echo base_url() ?>">Rusak</a> -->
										<?php } ?>
									</td>
						    	</tr>
						    	<?php } ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		
	</div><!--/.main-->