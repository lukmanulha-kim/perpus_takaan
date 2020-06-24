<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Denda</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h3>Data Denda Siswa</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							        <th data-field="no" data-sortable="true" >No</th>
							        <th data-field="nama" data-sortable="true">Nama Siswa</th>
							        <th data-field="kelas" data-sortable="true">Kelas</th>
							        <th data-field="denda" data-sortable="true">Denda</th>
							        <th data-field="status" data-sortable="true">Status</th>
							        <th data-field="aksi" data-sortable="true">Aksi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $no=1; foreach ($dendaSiswa->result() as $DendaSiswa) { ?>
						    	<tr>
						    		<td><?php echo $no++ ?></td>
						    		<td><?php echo $DendaSiswa->nama_siswa ?></td>
						    		<td><?php echo $DendaSiswa->kelas ?></td>
						    		<td><?php echo $DendaSiswa->denda ?></td>
									<td><?php echo $DendaSiswa->status_denda ?></td>
									<td>
										<?php if ($DendaSiswa->status_denda=="Lunas") {
											
										}else{ ?>
										<a href="<?php echo base_url('index.php/denda/lunas/').encrypt_url($DendaSiswa->id_denda) ?>" title="Edit Data" class="btn btn-sm btn-warning">Lunas</a>
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
				<h3>Data Denda Guru</h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							        <th data-field="no" data-sortable="true" >No</th>
							        <th data-field="nama" data-sortable="true">Nama Guru</th>
							        <th data-field="denda" data-sortable="true">Denda</th>
							        <th data-field="status" data-sortable="true">Status</th>
							        <th data-field="aksi" data-sortable="true">Aksi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $no=1; foreach ($dendaGuru->result() as $DendaGuru) { ?>
						    	<tr>
						    		<td><?php echo $no++ ?></td>
						    		<td><?php echo $DendaGuru->nama_guru ?></td>
						    		<td><?php echo $DendaGuru->denda ?></td>
									<td><?php echo $DendaGuru->status_denda ?></td>
									<td>
										<?php if ($DendaGuru->status_denda=="Lunas") {
											
										}else{ ?>
										<a href="<?php echo base_url('index.php/denda/lunas/').encrypt_url($DendaGuru->id_denda) ?>" class="btn btn-sm btn-warning">Lunas</a>
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