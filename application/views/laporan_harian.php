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
						<h4 class="title">Laporan Bulanan Outlet SIP</h4><br>
						<p class="category">cari laporan berdasarkan bulan/harian</p>
					</div>
					<div class="col-md-4">
						<form action="<?php echo base_url() ?>/index.php/home/laporan" method="post">
							<div class="col-md-12">
								<input type="radio" name="laporan" id="harian" value="harian" required>harian
								<input type="radio" name="laporan" id="bulanan" value="bulanan" required>bulanan
							</div>
							<div class="col-md-6" id="bln">
								<select name="bln" class="form-control col-md-7">
									<option value="">--pilih bulan--</option>
									<option value="1">januari</option>
									<option value="2">februari</option>
									<option value="3">maret</option>
									<option value="4">april</option>
									<option value="5">mei</option>
									<option value="6">juni</option>
									<option value="7">juli</option>
									<option value="8">agustus</option>
									<option value="9">september</option>
									<option value="10">oktober</option>
									<option value="11">november</option>
									<option value="12">desember</option>
								</select>
								<br>
							</div>
							<div class="col-md-6" id="hari">
								<input type="date" name="hari" class="form-control">
							</div>
							<div class="col-md-12">
								<input type="submit" name="submit" class="btn btn-info btn-fill" value="cari">
							</div>
						</form>
					</div>
					<div class="col-md-12">
					</div>
					<div class="content">
						<br><br>
						<form>
							<button class="btn btn-info btn-fill pull-right"><i class="pe-7s-print"></i></button>
							<input name="cetak" type="hidden" id="cetak" value="<?php echo $_POST['bln']?>">
						</form>
						<br><br>
						<center><h4>Laporan Penjualan tanggal <?php echo $_POST['hari']?></h4></center>
						<?php if($c_hari>0){?>
						<div class="table-responsive">
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
									<?php foreach ($laporan_harian as $lp){?>
									<tr>
										<td><?php echo $lp->ID_TRANSAKSI?></td>
										<td><?php echo $lp->TANGGAL_TERJUAL?></td>
										<td><?php echo $lp->NAMA_BARANG?></td>
										<td><?php echo $lp->HARGA?></td>
										<td><?php echo $lp->jlh?></td>
										<td><?php echo $lp->ttl?></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
						<?php }else{?>
						<center>KOSONG</center>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
/*function Cetak()
{
  var x = document.getElementsByName("cetak");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "hidden";
  }
  window.print();
  alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "visible";
  }
}*/
</script>