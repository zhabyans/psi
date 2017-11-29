<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="header">
						<h4 class="title">Input Barang Masuk</h4>
					</div>
					<div class="content">
						<form action="<?php echo base_url()?>/index.php/home/input_barang" method="post">
							<div class="row">
								<div class="col-md-6">
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
								<div class="col-md-6">
									<div class="form-group">
										<label>Masukkan Tanggal</label>
										<input type="date" class="form-control" required name="tgl">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>id user</label>
										<input type="text" value="<?php echo $_SESSION['id']?>" name="id_user">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
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
		</div>
	</div>
</div>