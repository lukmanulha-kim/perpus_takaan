<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Siswa</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Kenaikan Kelas | <a href="<?php echo base_url('index.php/siswa/addsiswa') ?>" title="Tabah Data" class="btn btn-primary">Tambah Data</a> | <a href="<?php echo base_url('index.php/siswa/import') ?>" title="Import Data" class="btn btn-primary">Import Data Siswa</a> | <a href="<?php echo base_url('index.php/siswa') ?>" title="Import Data" class="btn btn-primary">Data Siswa</a></h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="" method="post">
							<input type="text" name="i_kelasbaru" placeholder="Nama Kelas" class="form-control">
							<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							    <thead>
								    <tr>
								        <th data-field="no" data-sortable="true" > </th>
								        <th data-field="nama" data-sortable="true">Nama Siswa</th>
								        <th data-field="kelas"  data-sortable="true">Kelas</th>
								        <th data-field="status" data-sortable="true">Status</th>
								    </tr>
							    </thead>
							    <tbody>
							    	<?php $no=1; foreach ($siswa->result() as $dataSiswa) { ?>
							    	<tr>
							    		<td><center><input type="checkbox" name="i_siswa[]" value=""></center></td>
							    		<td><?php echo $dataSiswa->nama_siswa ?></td>
										<td><?php echo $dataSiswa->kelas ?></td>
										<td><?php echo $dataSiswa->status ?></td>
							    	</tr>
							    	<?php } ?>
							    </tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		
	</div><!--/.main-->