<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body" id="panel">
						<h4 class="title">Data Barang Masuk</h4>
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
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>id user</label>
										<input type="text" value="<?php echo $_SESSION['id']?>" name="id_user">
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
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body" id="panel">
						<h4 class="title">Data Barang Masuk</h4>
					</div>
					<div class="panel-body" id="panel">
							<div class="table-responsive">
									<table class="table table-hover table-striped">
										<thead>								
											<th>Id</th>
											<th>Nama Barang</th>
											<th>User</th>
											<th>Tanggal Masuk</th>
											<th>Stok</th>
											<th>Status</th>
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
											</tr>
											<?php } ?>
										</tbody>
									</table>
							</div>
							<ul class="pagination pull-right">
								<li><a href="#">first</a></li>
								<li><a href="#"><<</a></li>
								<li><a href="#">1</a></li>
								<li class="active"><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">>></a></li>
								<li><a href="#">last</a></li>
							</ul>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>