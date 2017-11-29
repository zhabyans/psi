<style>
	table{
		border:1;
		border-collapse:collapse
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Striped Table with Hover</h4>
						<p class="category">Here is a subtitle for this table</p>
					</div>
				<div class="col-md-4">	
					<form action="<?php echo base_url() ?>/index.php/home/laporan">
					<input type="date">
					<input type="submit" name="submit">
					</form>
				</div>
					<div class="content table-responsive table-full-width">
						<table class="table table-hover table-striped">
							<thead>
								<th>NO</th>
								<th>TANGGAL</th>
								<th>NAMA BARANG</th>
								<th>HARGA JUAL</th>
								<th>JUMLAH TERJUAL</th>
								<th>TOTAL HARGA TERJUAL</th>
			
								
							</thead>
							<tbody>
								<tr>
									
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
