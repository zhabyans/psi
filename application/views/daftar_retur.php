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
					<div class="content table-responsive table-full-width">
						<table class="table table-hover table-striped">
							<thead>
								<th>ID</th>
								<th>NAMA BARANG</th>
								<th>STATUS RETUR</th>
								<th>TANGGAL MASUK</th>
							</thead>
							<tbody>
									<?php foreach ($product as $p){?>
								<tr>
										<td><?php echo $p->ID_BARANG;?></td>
										<td><?php echo $p->NAMA_BARANG;?></td>
										<td><?php echo $p->STATUS_RETUR;?></td>
										<td><?php echo $p->TANGGAL_MASUK;?></td>
								</tr>
									<?php }?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
