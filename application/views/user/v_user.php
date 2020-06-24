<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Data Pengguna</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Data Pengguna | <a href="<?php echo base_url('index.php/user/adduser') ?>" title="Tabah Data" class="btn btn-primary">Tambah Data</a>
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
							        <th data-field="nama" data-sortable="true">Nama</th>
							        <th data-field="status" data-sortable="true">Status</th>
							        <th data-field="aksi" data-sortable="true">Aksi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $no=1; foreach ($user->result() as $datauser) { ?>
						    	<tr>
						    		<td><?php echo $no++ ?></td>
						    		<td><?php echo $datauser->nama_pustakawan ?></td>
									<td><?php echo $datauser->status_pustakawan ?></td>
									<td>
										<a href="<?php echo base_url('index.php/settings/user/').encrypt_url($datauser->id_pustakawan) ?>" title="Edit Data" class="btn btn-sm btn-warning">Edit</a>
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