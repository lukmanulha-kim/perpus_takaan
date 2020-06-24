<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Buku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Data Buku | <a href="<?php echo base_url('index.php/book/addbook') ?>" title="Tabah Data" class="btn btn-primary">Tambah Data</a> | <a href="<?php echo base_url('index.php/book/import') ?>" title="Import Data" class="btn btn-primary">Import Data Buku</a> | <a href="<?php echo base_url('index.php/book/barcode') ?>" target="_blank" title="Cetak Barcode" class="btn btn-primary">Barcode Buku</a></h3>
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
							        <th data-field="judul" data-sortable="true">Judul Buku</th>
							        <th data-field="pengarang"  data-sortable="true">Pengarang</th>
							        <th data-field="jilid" data-sortable="true">Jilid/Volume</th>
							        <th data-field="jumlah" data-sortable="true">Jumlah</th>
							        <th data-field="harga" data-sortable="true">Harga</th>
							        <th data-field="kondisi" data-sortable="true">Kondisi</th>
							        <th data-field="aksi" data-sortable="true">Aksi</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php $no=1; foreach ($buku->result() as $databuku) { ?>
						    	<tr>
						    		<td><?php echo $no++ ?></td>
						    		<td><?php echo $databuku->judul_buku ?></td>
									<td><?php echo $databuku->pengarang ?></td>
									<td><?php if($databuku->volume_jilid==0){echo"-";}else{echo $databuku->volume_jilid;}?></td>
									<td><?php echo $databuku->jumlah ?></td>
									<td><?php echo $databuku->harga ?></td>
									<td><?php echo $databuku->kondisi ?></td>
									<td>
										<a href="<?php echo base_url('index.php/book/edit/').encrypt_url($databuku->id_buku) ?>" title="Edit Data" class="btn btn-sm btn-warning">Edit</a>
										<a target="_blank" href="<?php echo base_url('index.php/book/set_barcode/').encrypt_url($databuku->no_referensi) ?>" title="Barcode" class="btn btn-sm btn-info">Barcode</a>
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