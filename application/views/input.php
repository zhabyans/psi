<div class="content">
	<div class="container-fluid">
	<?php echo $this->session->flashdata("pesan")?>
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body" id="panel">
						<h4 class="title">Input Barang Masuk</h4>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url()?>/index.php/home/input_barang" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<label>Masukkan Nama Barang</label>
										<select class="form-control" name="barang" required>
											<option value="">-pilih barang-</option>
										<?php foreach ($barang as $b){?>
											<option><?php echo $b->NAMA_BARANG?></option>
										<?php }?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Masukkan Tanggal</label>
										<input type="date" class="form-control" required name="tgl">
									</div>
								</div>
							</div>
							<div class="row hide">
								<div class="col-md-12">
									<div class="form-group">
										<label>id user</label>
										<input type="hidden" value="<?php echo $_SESSION['id']?>" name="id_user">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Stok Barang Masuk</label>
										<input type="text" class="form-control" required name="stok">
									</div>
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Kirim</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<div class="panel-footer">
						<center><em style="color:red">*Form untuk memasukkan data barang yang masuk</em></center>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body" id="panel">
						<h4 class="title">Input Jenis Barang Baru</h4>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url()?>/index.php/home/input_nama_barang" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<label>Masukkan Nama Barang</label>
										<input type="text" class="form-control" required name="nama">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Masukkan Harga</label>
										<input type="text" class="form-control" required name="harga">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Expired</label>
										<input type="text" class="form-control" placeholder='Masukkan keterangan hari' required name="exp">
									</div>
								</div>
							</div>
							<button type="submit" name="tambah" class="btn btn-info btn-fill pull-right">Kirim</button>
							
						</form>
					</div>
					<div class="panel-footer">
						<center><em style="color:red">*Inputan data jika ada jenis barang baru</em></center>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body" id="panel">
						<h4 class="title">Data Barang Masuk</h4>
					</div>
					<div class="panel-body" id="panel">
							<div class="table-responsive">
									<table class="table table-hover table-striped" id="example">
										<thead>								
											<th>Id</th>
											<th>Nama Barang</th>
											<th>User</th>
											<th>Tanggal Masuk</th>
											<th>Stok</th>
											<th>Status</th>
											<th>Aksi</th>
										</thead>
										<tbody>
											<?php foreach($list as $pb){ ?>
											<tr>
												<td><?php echo $pb->ID_PENDATAAN ?></td>
												<td><?php echo $pb->NAMA_BARANG ?></td>
												<td><?php echo $pb->USER ?></td>
												<td><?php echo $pb->TANGGAL_MASUK ?></td>
												<td><?php echo $pb->STOK ?></td>
												<td><?php echo $pb->STATUS_RETUR ?></td>
												<?php if($pb->STATUS_RETUR != 'retur'){?>
												<td>
													<a href="" onClick="edit('<?php echo $pb->NAMA_BARANG?>','<?php echo $pb->STOK?>','<?php echo $pb->ID_PENDATAAN?>','<?php echo $pb->TANGGAL_MASUK?>')" data-toggle="modal" data-target="#myModal">
													<i class="pe-7s-edit" title="edit" style="color:blue; font-size:18px"></i>
													</a>
													<a href="" onClick="hapus('<?php echo $pb->NAMA_BARANG?>','<?php echo $pb->ID_PENDATAAN?>','<?php echo $pb->TANGGAL_MASUK?>')" data-toggle="modal" data-target="#myModal2">
													<i class="pe-7s-trash" title="hapus" style="color:red; font-size:18px"></i>
													</a>
												</td>
												<?php }else{?>
												<td></td>
												<?php }?>
											</tr>
											<?php } ?>
										</tbody>
									</table>
							</div>
						</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body" id="panel">
						<h4 class="title">Daftar Nama Barang</h4>
					</div>
					<div class="panel-body" id="panel">
							<div class="table-responsive">
									<table class="table table-hover table-striped">
										<thead>								
											<th>Id</th>
											<th>Nama Barang</th>
											<th>Harga</th>
											<th>EXPIRED</th>
										</thead>
										<tbody>
											<?php foreach($barang as $pb){ ?>
											<tr>
												<td><?php echo $pb->ID_BARANG ?></td>
												<td><?php echo $pb->NAMA_BARANG ?></td>
												<td><?php echo $pb->HARGA ?></td>
												<td><?php echo $pb->EXPIRED ?> hari</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>